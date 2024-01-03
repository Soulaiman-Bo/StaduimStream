<?php



class stadium extends Controller
{
    // protected function index()
    // {
    //     // $viewmodel = new TeamModel();
    //     // $rows = $viewmodel->selectRecords("teams");
    //     $view = $this->getView();
        
    //     require_once "$view";
    // }

    protected function show()
    {
        $viewmodel = new StaduimModel();
        $rows = $viewmodel->selectJoins("stadiums");
        $view = $this->getView();
        require_once $view;
    }

    protected function update()
    {
        $id = $_GET['id'];

        if ($id !== "") {
            $viewmodel = new StaduimModel();
            $rows = $viewmodel->selectSingleRecords("stadiums", "*", "id = $id");

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

    protected function add()
    {

        $viewmodel = new StaduimModel();
        $view = $this->getView();
        require_once "$view";
    }

    protected function delete()
    {
        $id = $_GET['id'];

        if ($id !== "") {
            $stadmodel = new StaduimModel();
            $row = $stadmodel->selectSingleRecords("stadiums", "*", "id = $id");
            $view = $this->getView($stadmodel->Index(), false);
            require_once "$view";
        } else {
            echo '<h1>ERROR 404: Bad Request</h1>';
        }
    }

    protected function addaction()
    {
        extract($_POST);

        $new_logo;

        if (isset($_FILES["logo"])) {
            $file = $_FILES["logo"];
            // File properties
            $fileName = $file["name"];
            $fileTmpName = $file["tmp_name"];
            // $fileSize = $file["size"];
            $fileError = $file["error"];

            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);

            // Generate a unique filename to avoid overwriting
            $newFileName = $name . "_" . uniqid('', true) . "." . $fileExt;


            $new_logo = $newFileName;

            $uploadDir = "public/uploads/";

            if ($fileError === 0) {
                move_uploaded_file($fileTmpName, $uploadDir . $newFileName);
            } else {
                echo "Error uploading file.";
            }
        }

        $viewmodel = new StaduimModel();
        $lastInsertedImageId = $viewmodel->insertRecord("images", ['link' => $new_logo]);

        $teamfields = array(

            'name' => $name,
            'manager' => $manager,
            'logo' => $lastInsertedImageId,

        );

        $insertedId = $viewmodel->insertRecord("stadiums", $teamfields);

        $viewmodel->closeConnection();

        if ($insertedId) {
            $message = "Stadium inserted successfully!";
            http_response_code(200);
            echo json_encode([
                "message" => $message,
                "Id" => $insertedId
            ]);
        }
    }

    protected function updateaction()
    {
        extract($_POST);
        $viewmodel = new StaduimModel();

        $id = $_POST['id'];

        $teamfields = array(
            'name' => $name,
            'manager' => $manager
        );

        $insertedId = $viewmodel->updateRecord("stadiums", $teamfields, "id", $id);
        $viewmodel->closeConnection();

        if ($insertedId) {
            $message = "Stadium Updated successfully!";
            http_response_code(200);
            echo json_encode([
                "message" => $message,
                "id" => $insertedId
            ]);
        }
    }

    protected function deleteaction()
    {
        extract($_POST);

        $viewmodel = new StaduimModel();

        $id = $_POST['id'];

        $result = $viewmodel->deleteRecord("stadiums", "id", $id);

        if ($result) {
            $message = "stadium deleted successfully!";
            http_response_code(200);
            echo json_encode([
                "message" => $message,
                "Id" => $result
            ]);
        }
    }
}
