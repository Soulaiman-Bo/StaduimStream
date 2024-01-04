<?php

class SearchModel extends Model
{
        public function Index()
        {
                return;
        }

        public function getByTeamName($searchTerm)
        {
                $sql = "SELECT  M.id, M.date, T1.name as team_1, T2.name as team_2,  T1.logo as team_1_logo,  T2.logo as team_2_logo
                FROM `matche`M
                join `teams` T1
                ON M.team_1 = T1.id
                JOIN `teams` T2
                ON M.team_2 = T2.id
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
