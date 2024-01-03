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

    protected function add()
    {
        $matchemodel = new MatchesModel();
        $teams = $matchemodel->selectRecords("teams", "*");
        $stadiums = $matchemodel->selectRecords("stadiums", "*");
        $view = $this->getView();
        require_once "$view";
    }
    protected function delete()
    {

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


    protected function show()
    {
        $viewmodel = new MatchesModel();
        $rows = $viewmodel->selectJoin("matche");
        $view = $this->getView();
        require_once "$view";
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



    // $viewmodel = new TeamModel();
    // $rows = $viewmodel->selectJoin("teams");
    // $view = $this->getView();
    // require_once $view;

    // protected function getTeamNames() {
    //     $databaseConnection = DatabaseConnection::getInstance();
    //     $pdo = $databaseConnection->getConnection();

    //     $query = "SELECT name FROM teams";
    //     $stmt = $pdo->prepare($query);
    //     $stmt->execute();

    //     $result = $stmt->get_result();
    //     $teamNames = [];
    //     while ($row = $result->fetch_assoc()) {
    //         $teamNames[] = $row['name'];
    //     }

    //     return $teamNames;
    // }


}
