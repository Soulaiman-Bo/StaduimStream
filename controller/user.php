<?php
class User extends Controller
{

	protected function signup()
	{
		$view = $this->getView();
		require_once $view;
	}
	protected function login()
	{
		$view = $this->getView();
		require_once $view;
	}




	protected function signupAction()
	{
		$viewmodel = new UserModel();

		// Get form data
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$Firstname = $_POST['Firstname'];
		$Lastname = $_POST['Lastname'];
		$cin = $_POST['cin'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];


		// Hash the password securely
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		// Insert user record into the database
		$userFields = [
			'Firstname' => $Firstname,
			'Lastname' => $Lastname,
			'cin' => $cin,
			'email' => $email,
			'phone' => $phone,
			'password' => $hashedPassword,
		];

		$viewmodel->insertRecord("user", $userFields);

		$viewmodel->closeConnection();

		echo 'User inserted successfully';

	}

	protected function loginAction()
	{
		// Check if email and password are provided in the form
		if (isset($_POST['email']) && isset($_POST['password'])) {
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			$password = $_POST['password'];

			// Instantiate the UserModel
			$viewmodel = new UserModel();

			// Verify if the email exists in the database
			$user = $viewmodel->vrfyemail($email);


			if ($user) {
				// If the email exists, verify the password
				if (password_verify($password, $user['password'])) {
					$_SESSION['user_id'] = $user['user_ID'];
					$_SESSION['firstname'] = $user['firstname'];
					$_SESSION['lastname'] = $user['lastname'];
					$_SESSION['email'] = $user['email'];
					$_SESSION['cin'] = $user['cin'];
					$_SESSION['phone'] = $user['phone'];
					$_SESSION['rolename'] = $user['role'];

					if ($_SESSION['rolename'] == 1) {
						header("Location: /dashboard");

					} else
						header("Location: /home");
					exit;
				} else {
					$_SESSION['passwordincorect'] = "Incorrect password";
					header("Location: ../user/login");

				}
			} else {
				$_SESSION['emailenco'] = "Email not found";
				header("Location: ../user/login");
			}

			// Close the database connection
			$viewmodel->closeConnection();
		} else {
			// Email or password not provided
			echo "Please provide an email and password";
		}
	}

	public function logout()
	{
		session_destroy();
		header('Location:/user/login');
	}

	protected function update()
	{
		$id = $_GET['id'];

		if ($id !== "") {
			$viewmodel = new UserModel();
			$user = $viewmodel->selectSingleRecords("user");

			if ($user) {
				$view = $this->getView();
				require_once "$view";

			} else {
				echo "<h1>ERROR 404: Bad Requestttttt</h1>";
			}
		} else {
			echo '<h1>ERROR 404: Page Not Found</h1>';
		}
	}

	protected function updateaction()
	{
		extract($_POST);
		$viewmodel = new UserModel();


		$id = $_GET['id'];


		$userfield = array(
			'firstname' => $firstname,
			'lastname' => $lastname,
			'cin' => $cin,
			'email' => $email,
			'phone' => $phone,
			'password' => $password
		);

		$insertedId = $viewmodel->updateRecord("user", $userfield, "user_ID", $id);
		$viewmodel->closeConnection();

		if ($insertedId) {
			$message = "user Updated successfully!";
			http_response_code(200);
			echo json_encode([
				"message" => $message,
				"id" => $insertedId
			]);
		}
	}

	protected function delete()
	{
		$id = $_GET['id'];

		if ($id !== "") {
			$usermodel = new UserModel();
			$row = $usermodel->selectSingleRecords("user", "*", "user_ID = $id");
			$view = $this->getView($usermodel->Index(), false);
			require_once "$view";
		} else {
			echo '<h1>ERROR 404: Bad Request</h1>';
		}
	}

	protected function deleteaction()
	{
		extract($_POST);

		$viewmodel = new UserModel();

		$id = $_GET['id'];

		$result = $viewmodel->deleteRecord("user", "user_ID", $id);

		if ($result) {
			$message = "user deleted successfully!";
			http_response_code(200);
			session_destroy();
			header('location: /');
			echo json_encode([
				"message" => $message,
				"Id" => $result
			]);
		}
	}
}









