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
		$viewmodel = new UserModel();
		if (isset($_POST['login'])) {
			// get form data
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			$password = $_POST['password'];
			
			$viewmodel ->vrfyemail($email);
			
	
		}
	}

		
}
    

	



  

    
