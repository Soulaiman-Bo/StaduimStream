<?php

class Profile extends Controller
{
    protected function show()
    {
        $id = $_SESSION['user_id'];
        $viewmodel = new UserModel();
        $rows = $viewmodel->selectJoins("user","*", "user_ID = $id");

        $view = $this->getView();
        require_once $view;
    }
    // public function edit()
    // {

    //     $view = $this->getView();

    //     require_once "$view";
    // }
}
