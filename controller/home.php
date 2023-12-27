<?php

class Home extends Controller
{
    protected function index()
    {
        // $viewmodel = new TeamModel();
        // $rows = $viewmodel->selectRecords("teams");
        $view = $this->getView();
        
        require_once "$view";
    }
}
