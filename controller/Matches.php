<?php

use Carbon\Carbon;


class Matches extends Controller
{
    protected function index()
    {

        $view = $this->getView();
        require_once "$view";
    }

    private function format_date($date_str)
    {
        $date_object = Carbon::createFromFormat('Y-m-d H:i:s', $date_str);

        $date = $date_object->format('D d M Y');
        $hour = $date_object->format('H:i');

        return ['hour' => $hour, 'date' => $date];
    }
    protected function match()
    {
        $id = $_GET['id'];

        if ($id !== "") {

            $viewmodel = new MatchesModel();
            $rows = $viewmodel->selectSingleMatchJoinedWithTeams($id);

            $formatted_date = $this->format_date($rows['date']);

            $rows['date'] = strtoupper($formatted_date['date']);
            $rows['hour'] = strtoupper($formatted_date['hour']);

            if ($rows) {
                $view = $this->getView();
                require_once "$view";
            } else {
                require_once "views/404.php";
            }
        } else {
            require_once "views/404.php";
            exit;
        }

        $view = $this->getView();
        require_once "$view";
    }
    protected function add()
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

            $matchemodel = new MatchesModel();
            $teams = $matchemodel->selectRecords("teams", "*");
            $stadiums = $matchemodel->selectRecords("stadiums", "*");
            $view = $this->getView();
            require_once "$view";
        }
    }
    protected function delete()
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
            $id = $_GET['id'];

            if ($id !== "") {
                $matchmodel = new MatchesModel();
                $row = $matchmodel->selectSingleRecords("matche", "*", "id = $id");
                $view = $this->getView($matchmodel->Index(), false);
                require_once "$view";
            } else {
                echo '<h1>ERROR 404: Bad Request</h1>';
            }
        }
    }
    protected function show()
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
            $viewmodel = new MatchesModel();
            $rows = $viewmodel->selectJoin("matche");
            $view = $this->getView();
            require_once "$view";
        }
    }
    protected function addaction()
    {
        extract($_POST);
        $view = new MatchesModel();
        $matchfields = array(
            'date' => $date,
            'Stadium' => $Stadium,
            'team_1' => $team_name1,
            'team_2' => $team_name2,

        );
        $insertedId = $view->insertRecord("matche", $matchfields);
        $view->closeConnection();

        if ($insertedId) {
            $message = "Match inserted successfully!";
            http_response_code(200);
            echo json_encode([
                "message" => $message,
                "Id" => $insertedId
            ]);
        }
    }
    protected function deleteaction()
    {
        extract($_POST);

        $viewmodel = new MatchesModel();

        $id = $_POST['id'];

        $result = $viewmodel->deleteRecord("matche", "id", $id);

        if ($result) {
            $message = "Match deleted successfully!";
            http_response_code(200);
            echo json_encode([
                "message" => $message,
                "Id" => $result
            ]);
        }
    }
    protected function update()
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

            $id = $_GET['id'];
            $matchemodel = new MatchesModel();
            $teams = $matchemodel->selectRecords("teams", "*");
            $stadiums = $matchemodel->selectRecords("stadiums", "*");
            if ($id !== "") {
                $viewmodel = new MatchesModel();
                $rows = $viewmodel->selectSingleRecords("matche", "*", "id = $id");

                if ($rows) {
                    $view = $this->getView();
                    require_once "$view";
                } else {
                    echo "<h1>ERROR 404: Bad Request</h1>";
                }
            } else {
                echo '<h1>ERROR 404: Page Not Found</h1>';
            }
        }
    }
    protected function updateaction()
    {
        extract($_POST);
        $viewmodel = new MatchesModel();

        $id = $_POST['id'];

        $matchfields = array(
            'date' => $date,
            'Stadium' => $Stadium,
            'team_1' => $team_name1,
            'team_2' => $team_name2,
        );

        $insertedId = $viewmodel->updateRecord("matche", $matchfields, "id", $id);
        $viewmodel->closeConnection();

        if ($insertedId) {
            $message = "Match Updated successfully!";
            http_response_code(200);
            echo json_encode([
                "message" => $message,
                "Id" => $insertedId
            ]);
        }
    }

}
