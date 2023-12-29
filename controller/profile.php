<?php

class Profile extends Controller
{
    public function show()
    {
        
        $view = $this->getView();

        require_once "$view";
    }
    public function edit()
    {
        
        $view = $this->getView();

        require_once "$view";
    }
}
