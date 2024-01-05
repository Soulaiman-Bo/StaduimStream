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


        $matchemodel = new SearchModel();
        $matcherows = $matchemodel->getByTeamName("%%");

        $matchemodel->closeConnection();

       
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

            http_response_code(200);
            echo json_encode($result);

        }else {
            echo json_encode([
                "message" => "No results found"
            ]);
        }




    }
}
