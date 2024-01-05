<?php

class Dashboard extends Controller
{



    protected function index()
    {
        if ($_SESSION['role'] == 2) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "/ ";';
            echo '</script>';
            exit();
        }
        if (!isset($_SESSION['role'])) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "/ ";';
            echo '</script>';
            exit();
        } else {
            $view = $this->getView();

            require_once "$view";
        }
    }
}
