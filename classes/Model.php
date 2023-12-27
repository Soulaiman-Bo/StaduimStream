<?php

abstract class Model
{
	protected $pdo;
	protected $stmt;

	public function __construct()
	{
		$this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
	}


	function insertRecord($table, $data)
	{
		try {
			// Use prepared statements with placeholders for secure insertion
			$columns = implode(',', array_keys($data));
			$values = implode(',', array_fill(0, count($data), '?'));

			$sql = "INSERT INTO $table ($columns) VALUES ($values)";

			$stmt = $this->pdo->prepare($sql);

			// Bind parameters directly, no need to specify types
			$stmt->execute(array_values($data));

			// Get the last inserted ID (if applicable)
			$lastInsertId = $this->pdo->lastInsertId();
			$this->pdo = null;

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

		$stmt = $this->pdo->prepare($sql);

		// Execute the prepared statement
		$stmt->execute();

		// Get the result set
		// $result = $stmt->fetchAll();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);




		// Close the statement
		$this->pdo = null;

		return $result;
	}

	function selectSingleRecords($table, $columns = "*", $where = null)
	{
		// Use prepared statements to prevent SQL injection
		$sql = "SELECT $columns FROM $table";

		if ($where !== null) {
			$sql .= " WHERE $where ;";
		}

		$stmt = $this->pdo->prepare($sql);

		// Execute the prepared statement
		$stmt->execute();

		// Get the result set
		// $result = $stmt->fetchAll();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		// Close the statement
		$this->pdo = null;

		return $result;
	}

	function updateRecord($table, $data, $id)
	{
		$args = array();
		foreach ($data as $key => $value) {
			$args[] = "$key = ?";
		}

		$sql = "UPDATE $table SET " . implode(',', $args) . " WHERE team_id = $id";

		$stmt = $this->pdo->prepare($sql);

		$result = $stmt->execute(array_values($data));

		$lastInsertId = $this->pdo->lastInsertId();

		$this->pdo = null;

		return $result;
	}

	function deleteRecord($table, $column, $id)
	{
		// Use prepared statements to prevent SQL injection
		$sql = "DELETE FROM $table WHERE $column = $id";

		$stmt = $this->pdo->prepare($sql);

		$result = $stmt->execute();

		$this->pdo = null;

		return $result;
	}

	
	public function query($query)
	{
		$this->stmt = $this->pdo->prepare($query);
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
		return $this->pdo->lastInsertId();
	}
}
