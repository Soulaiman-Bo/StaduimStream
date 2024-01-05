<?php

class SearchModel extends Model
{
        public function Index()
        {
                return;
        }

        public function getByTeamName($searchTerm)
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
                WHERE T1.name LIKE :searchTerm OR T2.name LIKE :searchTerm";

                // echo $sql;
                // exit;

                $stmt = $this->connection->prepare($sql);
                $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $result;
        }
}
