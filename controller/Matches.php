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


}
