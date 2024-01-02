<?php

class Matches extends Controller
{
    protected function index()
    {
        $view = $this->getView();
        require_once "$view";
    }

    protected function match()
    {
        $view = $this->getView();
        require_once "$view";
    }

    protected function add()
    {
        $view = $this->getView();
        require_once "$view";
    }
    protected function addaction(){
        extract($_POST);
        $view = new MatchesModel();
        $matchfields = array( 
            'date'=> $date,
            'Stadium'=> $Stadium,
            'team_1'=> $team_name1,
            'team_2'=>$team_name2,
           
        );
        $insertedId = $view->insertRecord("matche", $matchfields);
        $view->closeConnection();

		if ($insertedId) {
			$message = "Match inserted successfully!";
			http_response_code(200);
			echo json_encode([
				"message" => $message,
				"Id" => $insertedId
			]);
		}


    }
	

}
