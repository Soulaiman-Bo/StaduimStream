<?php

  session_start();
// class UserModel extends Model
// {
// 	public function Index()
// 	{
// 		return;
// 	}

	
// }
// require_once '../libraries/connection.php';

class UserModel  extends Model{
        private $id;
        private $email;
        private $password;
       

    

        public function vrfyemail($email) {
            $this->email = $email;
            $sql = "SELECT * FROM user WHERE email = :email";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result . 'email exst!';
        }

        public function vrfypassword($password) {
            $this->password = $password;
            $sql = '';
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam('', $this->password);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function logout() {
            session_destroy();
            header('Location:/auth/logout');
        }
    }