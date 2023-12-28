<?php

class User extends Controller
{
    protected function index()
    {
        $view = $this->getView();
        require_once "$view";
    }
}
