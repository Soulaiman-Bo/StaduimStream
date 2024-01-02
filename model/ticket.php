<?php

class TicketModel extends Model
{
	public function Index()
	{
		return;
	}


	public function createTicket($table, $data)
	{
		try {
			$columns = implode(',', array_keys($data));
			$values = implode(',', array_fill(0, count($data), '?'));

			$sql = "INSERT INTO $table ($columns) VALUES ($values)";

			$stmt = $this->connection->prepare($sql);

			$stmt->execute(array_values($data));

			// Get the last inserted ID (if applicable)
			$lastInsertId = $this->connection->lastInsertId();
			return $lastInsertId;
		} catch (PDOException $e) {
			error_log("Database error: " . $e->getMessage() . "\n", 3, "errors.log");
			echo "Database error: " . $e->getMessage();
			exit;
			return false;
		}
	}


	public function customeSelectQuery($table, $columns = "*", $where = null, $goupBy = null)
	{
		// (`ticket`, "`category`, count(category) AS count",  "`matche` = 1", "category")

		// SELECT  `category`, count(category) AS count FROM `ticket` WHERE `matche` = 1 GROUP by `category`;


		$sql = "SELECT $columns FROM $table";

		if ($where !== null) {
			$sql .= " WHERE $where";
		}

		if ($goupBy !== null) {
			$sql .= " GROUP BY $goupBy";
		}



		$stmt = $this->connection->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function selectstaduimBasedOnMatchId($matchId)
	{

		$sql = "SELECT M.id as Match_id, S.id AS stadium_id, S.capacity, S.vip_seats, S.premuim_seats, S.basic_seats FROM `matche` M join `stadiums` S ON M.stadium = S.id where M.id = $matchId";

		$stmt = $this->connection->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

}
