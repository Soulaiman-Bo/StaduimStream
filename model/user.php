<?php

class UserModel extends Model
{

    private $id;
    private $email;
    private $password;


    public function vrfyemail($email)
    {
        $this->email = $email;
        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}