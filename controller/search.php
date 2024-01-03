<?php

class Search extends Controller
{
    public function index()
    {
        $viewmodel = new TeamModel();
		$rows = $viewmodel->selectJoin("teams");
        $viewmodel->closeConnection();

        $staduimmodel = new StaduimModel();
		$staduimrows = $staduimmodel->selectRecords("stadiums");
        $staduimmodel->closeConnection();

       
        $view = $this->getView();
        require_once "$view";
    }

    public function search()
    {

         $id = $_GET['id'];

        $searchTerm = '%' . $id . '%';

        $searchmodel = new SearchModel();

        $result = $searchmodel->getByTeamName($searchTerm);


        if ($result) {
            foreach ($result as $row) {
                echo "Date: " . $row["date"] . "<br>";
                echo "team_1: " . $row["team_1"] . "<br>";
                echo "team_2: " . $row["team_2"] . "<br> <br>";
            }
        } else {
            echo "No results found";
        }




    }
}
