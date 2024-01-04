<?php

class Home extends Controller
{
    protected function index()
    {
        $viewmodel = new StaduimModel();
        $rows = $viewmodel->selectImage("stadiums");
        $view = $this->getView();

        require_once "$view";
    }
}
