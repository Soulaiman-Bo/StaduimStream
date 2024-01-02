<?php

// class UserModel extends Model
// {
// 	public function Index()
// 	{
// 		return;
// 	}

	
// }
// require_once '../libraries/connection.php';

class User  extends Model{



    //Find user by email or username
    public function findUserByEmailOrUsername($email, $username){
        $this->connection->query('SELECT * FROM user WHERE firstname = :Fristname OR email = :email');
        $this->connection->bind(':Fristname', $username);
        $this->connection->bind(':email', $email);

        $row = $this->connection->single();

        //Check row
        if($this->connection->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    //Register User
    public function register($data){
        $this->connection->query('INSERT INTO users (firstname ,lastname,cin,email,phone,password) 
        VALUES (:Fristname, :Lastname, :cin, ,:email ,:phone,:password)');
        //Bind values
        $this->connection->bind('::Fristname', $data['firstname']);
        $this->connection->bind(':Lastname', $data['lastname']);
        $this->connection->bind(':cin', $data['cin']);
        $this->connection->bind(':email', $data['email']);
        $this->connection->bind(':phone', $data['phone']);
        $this->connection->bind(':password', $data['password']);

        //Execute
        if($this->connection->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Login user
    public function login($nameOrEmail, $password){
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if($row == false) return false;

        $hashedPassword = $row->usersPwd;
        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
        }
    }

}