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

    function selectJoins($table, $columns = "*", $where = null)
    {
        $sql = "SELECT $columns FROM $table WHERE $where ";

        // if ($where !== null) {
        //     $sql .= " WHERE $where";
        // }

        $stmt = $this->connection->prepare($sql);

        // Execute the prepared statement
        $stmt->execute();

        // Get the result set
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->closeConnection();

        return $result;
    }

}