<?php

class User extends Controller
{
    public function login()
    {
        $view = $this->getView();
        require_once "$view";
        
        // require_once "views/user/login.php"
    }

    public function signup()
    {
        $view = $this->getView();
        require_once "$view";
    }
}
