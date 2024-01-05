<?php

class Profile extends Controller
{
    protected function show()
    {
        if (isset($_SESSION['email'])) {
            $id = $_SESSION['user_id'];
            $viewmodel = new UserModel();
            $rows = $viewmodel->selectJoins("user", "*", "user_ID = $id");

            $view = $this->getView();
            require_once $view;
        }else{
            header("Location: /");
        }
    }

}
