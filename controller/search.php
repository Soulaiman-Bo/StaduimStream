<?php

class Search extends Controller
{
    public function index()
    {
        $view = $this->getView();
        require_once "$view";
    }
}
