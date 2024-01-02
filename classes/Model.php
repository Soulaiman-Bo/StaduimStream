<?php

require_once "Connection.php";

abstract class Model
{
	protected $connection;
	protected $stmt;

	public function __construct()
	{
		$dbInstance = DatabaseConnection::getInstance();
		$this->connection = $dbInstance->getConnection();
	}

	function insertRecord($table, $data)
	{
		try {
			// Use prepared statements with placeholders for secure insertion
			$columns = implode(',', array_keys($data));
			$values = implode(',', array_fill(0, count($data), '?'));

			$sql = "INSERT INTO $table ($columns) VALUES ($values)";

			$stmt = $this->connection->prepare($sql);

			// Bind parameters directly, no need to specify types
			$stmt->execute(array_values($data));

			// Get the last inserted ID (if applicable)
			$lastInsertId = $this->connection->lastInsertId();
			

			return $lastInsertId;
		} catch (PDOException $e) {

			error_log("Database error: " . $e->getMessage() . "\n", 3, "errors.log");
			echo "Database error: " . $e->getMessage();
			return false;
		}
	}


	function selectRecords($table, $columns = "*", $where = null)
	{
		// Use prepared statements to prevent SQL injection
		$sql = "SELECT $columns FROM $table";

		if ($where !== null) {
			$sql .= " WHERE $where";
		}

		$stmt = $this->connection->prepare($sql);

		// Execute the prepared statement
		$stmt->execute();

		// Get the result set
		// $result = $stmt->fetchAll();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Close the statement

		return $result;
	}

	function selectSingleRecords($table, $columns = "*", $where = null)
	{
		// Use prepared statements to prevent SQL injection
		$sql = "SELECT $columns FROM $table";

		if ($where !== null) {
			$sql .= " WHERE $where ;";
		}

		$stmt = $this->connection->prepare($sql);

		// Execute the prepared statement
		$stmt->execute();

		// Get the result set
		// $result = $stmt->fetchAll();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		// Close the statement

		return $result;
	}

	function updateRecord($table, $data, $column, $id)
	{
		$args = array();
		foreach ($data as $key => $value) {
			$args[] = "$key = ?";
		}

		$sql = "UPDATE $table SET " . implode(',', $args) . " WHERE $column = $id";

		$stmt = $this->connection->prepare($sql);

		$result = $stmt->execute(array_values($data));

		return $result;
	}

	function deleteRecord($table, $column, $id)
	{
		// Use prepared statements to prevent SQL injection
		$sql = "DELETE FROM $table WHERE $column = $id";

		$stmt = $this->connection->prepare($sql);

		$result = $stmt->execute();


		return $result;
	}

	
	public function query($query)
	{
		$this->stmt = $this->connection->prepare($query);
	}

	
	public function  closeConnection(){
		$this->connection = null;
	}

	public function bind($param, $value, $type = null)
	{
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute()
	{
		$this->stmt->execute();
	}

	public function resultSet()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function single()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function countSet()
	{
		$this->execute();
		return $this->stmt->fetchColumn();
	}

	public function lastInsertId()
	{
		return $this->connection->lastInsertId();
	}
}
