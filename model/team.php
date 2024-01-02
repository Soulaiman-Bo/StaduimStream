<?php

class TeamModel extends Model
{
	public function Index()
	{
		return;
	}

	function selectJoin($table, $columns = "*", $where = null)
	{
		// $sql = "SELECT $table.$columns, manager.firstname, manager.lastname FROM teams INNER JOIN manager ON teams.manager = manager.id; ORDER teams.id BY  DESC";
		$sql = "SELECT $table.$columns, manager.firstname, manager.lastname 
        FROM teams 
        INNER JOIN manager ON teams.manager = manager.id 
        ORDER BY teams.id DESC";

		if ($where !== null) {
			$sql .= " WHERE $where";
		}

		$stmt = $this->connection->prepare($sql);

		// Execute the prepared statement
		$stmt->execute();

		// Get the result set
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$this->closeConnection();

		return $result;
	}
}

