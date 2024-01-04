<?php


    class User extends Controller  {

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




	protected function signupAction() {
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
			'Lastname'  => $Lastname,
			'cin'       => $cin,
			'email'     => $email,
			'phone'     => $phone,
			'password'  => $hashedPassword,
		];
	
		$viewmodel->insertRecord("user", $userFields);
	
		$viewmodel->closeConnection();
	
		 echo 'User inserted successfully';
		
	}

	protected function loginAction() {
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
					$_SESSION['user_id'] = $user['id'];
					$_SESSION['firstname'] = $user['firstname'];
					$_SESSION['lastname'] = $user['lastname'];
					$_SESSION['email'] = $user['email'];
					$_SESSION['phone'] = $user['phone'];
						header("Location: /home");
					exit;
				} else {
				   $_SESSION['passwordincorect'] = "Incorrect password";
				   header("Location: ../user/login");

				}
			} else {
			  $_SESSION['emailenco']  = "Email not found";
			  header("Location: ../user/login");
			}
	
			// Close the database connection
			$viewmodel->closeConnection();
		} else {
			// Email or password not provided
			echo "Please provide an email and password";
		}
	}
	
	public function logout() {
		session_destroy();
		header('Location:/user/login');
	}

		
}
    

	



  

    
