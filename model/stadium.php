<?php

class StaduimModel extends Model
{
	public function Index()
	{
		return;
	}

	function selectJoins($table, $columns = "*", $where = null)
	{
		$sql = "SELECT $table.$columns, cities.city 
        FROM stadiums 
        INNER JOIN cities ON stadiums.city = cities.id 
        ORDER BY stadiums.id DESC";

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
