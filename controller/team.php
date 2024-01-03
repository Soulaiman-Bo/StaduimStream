<?php


class Team extends Controller
{
	protected function show()
	{
		$viewmodel = new TeamModel();
		$rows = $viewmodel->selectJoin("teams");
		$view = $this->getView();
		require_once $view;
	}
	
	protected function update()
	{
		$id = $_GET['id'];

		if ($id !== "") {
			$viewmodel = new TeamModel();
			$rows = $viewmodel->selectSingleRecords("teams", "*", "id = $id");

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

		$viewmodel = new TeamModel();
		$view = $this->getView();
		require_once "$view";
	}

	protected function delete()
	{
		$id = $_GET['id'];

		if ($id !== "") {
			$teammodel = new TeamModel();
			$row = $teammodel->selectSingleRecords("teams", "*", "id = $id");
			$view = $this->getView($teammodel->Index(), false);
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
			$newFileName = $name .  "_" . uniqid('', true) . "." . $fileExt;


			$new_logo = $newFileName;

			$uploadDir = "public/uploads/";

			if ($fileError === 0) {
				move_uploaded_file($fileTmpName, $uploadDir . $newFileName);
			} else {
				echo "Error uploading file.";
			}
		}

		$viewmodel = new TeamModel();
		$lastInsertedImageId = $viewmodel->insertRecord("images", ['link' => $new_logo]);

		$teamfields = array(	

			'name' => $name,
			'manager'  => $manager,
			'logo' => $lastInsertedImageId,

		);

		$insertedId = $viewmodel->insertRecord("teams", $teamfields);

		$viewmodel->closeConnection();

		if ($insertedId) {
			$message = "Team inserted successfully!";
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
		$viewmodel = new TeamModel();

		$id = $_POST['team_id'];

		$teamfields = array(	
			'name' => $name,
			'manager'  => $manager
		);

		$insertedId = $viewmodel->updateRecord("teams", $teamfields, "id", $id);
		$viewmodel->closeConnection();

		if ($insertedId) {
			$message = "Team Updated successfully!";
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

		$viewmodel = new TeamModel();

		$id = $_POST['team_id'];

		$result = $viewmodel->deleteRecord("teams", "team_id", $id);

		if ($result) {
			$message = "Team deleted successfully!";
			http_response_code(200);
			echo json_encode([
				"message" => $message,
				"Id" => $result
			]);
		}
	}
}
