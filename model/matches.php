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

	public function selectSingleMatchJoinedWithTeams($id = null)
	{
		$sql = "SELECT  M.id, M.date, T1.name as team_1, T2.name as team_2,  IM.link as team_1_logo,   IM2.link as team_2_logo
		FROM `matche`M
		join `teams` T1
		ON M.team_1 = T1.id
		JOIN `teams` T2
		ON M.team_2 = T2.id
		JOIN `images` IM
		ON IM.id = T1.logo 
		JOIN `images` IM2
		ON IM2.id = T2.logo 
		";

		if ($id !== null) {
			$sql .= " WHERE M.id = :id";
		}

		// echo $sql;
		// exit;

		$stmt = $this->connection->prepare($sql);

		if ($id !== null) {
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
		}


		$stmt->execute();

		if ($id !== null) {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
		} else {
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}



		return $result;
	}
	public function selectSingleMatchJoinedWithTeams1($id = null)
	{
		$sql = "SELECT
		M.id,
		M.date,
		T1.name as team_1,
		T2.name as team_2,
		IM.link as team_1_logo,
		IM2.link as team_2_logo,
		S.name as stadium_name
	FROM
		`matche` M
	JOIN
		`teams` T1 ON M.team_1 = T1.id
	JOIN
		`teams` T2 ON M.team_2 = T2.id
	JOIN
		`images` IM ON IM.id = T1.logo
	JOIN
		`images` IM2 ON IM2.id = T2.logo
	JOIN
		`stadiums` S ON M.stadium = S.id;
		";

		if ($id !== null) {
			$sql .= " WHERE M.id = :id";
		}

		// echo $sql;
		// exit;

		$stmt = $this->connection->prepare($sql);

		if ($id !== null) {
			$stmt->bindParam(':id', $id, PDO::PARAM_STR);
		}


		$stmt->execute();

		if ($id !== null) {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
		} else {
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}



		return $result;
	}
}
