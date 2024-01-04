<?php

class Home extends Controller
{
    protected function index()
    {
        $viewmodel = new StaduimModel();
        $rows = $viewmodel->selectJoins("stadiums");
        $view = $this->getView();

        require_once "$view";
    }
}
