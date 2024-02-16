<?php

class Home extends Controller
{
    protected function index()
    {
        $viewmodel = new StaduimModel();
        $rows = $viewmodel->selectImage("stadiums");

         //$matchemodel = new MatchesModel();
        // $matchs = $matchemodel->selectRecords("matche", "*");
        
        // $team = $matchemodel->selectRecords("teams", "*");
       //   $matches = $matchemodel->selectMatchesWithTeams();

        $searchmodel = new SearchModel();
        $matchs = $searchmodel->getByTeamName("%%");


        // var_dump($matchs);
        
        // exit;
   
        $view = $this->getView();

        require_once "$view";
    }
}
