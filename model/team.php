<?php

class TeamModel extends Model
{
	public function Index()
	{
		return;
	}

	function selectJoin($table, $columns = "*", $where = null)
	{
		$sql = "SELECT $columns FROM $table";

		$sql .= " INNER JOIN manager ON teams.manager = manager.id";

		if ($where !== null) {
			$sql .= " WHERE $where";
		}

		$stmt = $this->pdo->prepare($sql);

		// Execute the prepared statement
		$stmt->execute();

		// Get the result set
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Close the statement
		$this->pdo = null;

		return $result;
	}
}

