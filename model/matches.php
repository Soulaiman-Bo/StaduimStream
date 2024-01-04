<?php

class MatchesModel extends Model
{
	public function Index()
	{
		return;
	}

	
	function selectJoin($table, $columns = '*', $where = null)
	{
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

	public function selectSingleMatchJoinedWithTeams($id)
	{
		$sql = "SELECT  M.id, M.date, T1.name as team_1, T2.name as team_2,  T1.logo as team_1_logo,  T2.logo as team_2_logo
			FROM `matche`M
			join `teams` T1
			ON M.team_1 = T1.id
			JOIN `teams` T2
			ON M.team_2 = T2.id
			WHERE M.id = :id";

		// echo $sql;
		// exit;

		$stmt = $this->connection->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_STR);
		$stmt->execute();

		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}

}

