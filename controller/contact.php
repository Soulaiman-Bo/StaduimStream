<?php

class Contact extends Controller
{
    public function index()
    {
        $view = $this->getView();
        require_once "$view";
        
        // require_once "views/user/login.php"
    }
}