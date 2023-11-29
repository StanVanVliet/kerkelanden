<?php
require_once "classes/config.php";

class User extends DBconfig {

    public $id;
    public $naam;

    public $username;
    public $password;

    public function voegAfspraakToe($id) {

    }

    public function login($data) {
        try {
            $this->username = $data['username'];
            $this->password = $data['password'];
    
            $sql = "SELECT * FROM user WHERE username = :username";
    
            $this->connect();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $this->username);
    
            if (!$stmt->execute()) {
                throw new Exception("Er ging iets mis met inloggen");
            }
    
            $user = $stmt->fetch();

            if ($user && password_verify($this->password, $user->password)) {
                return $user;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}