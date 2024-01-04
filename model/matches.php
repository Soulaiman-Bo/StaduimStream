<?php

class MatchesModel extends Model
{
	public function Index()
	{
		return;
	}

	function selectJoin($table,$columns = '*',$where = null){
		$sql = "Select $columns FROM $table";
		// $sql .= "INNER JOIN teams ON matche.team_1 = team_1.id ";
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
	
