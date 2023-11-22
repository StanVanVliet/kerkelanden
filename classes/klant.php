<?php
require_once "classes/config.php";

class Klant extends DBconfig {

    public $id;
    public $naam;

    public $username;
    public $password;

    public function voegAfspraakToe($id) {

    }

    public function login() {
        try{
            $this->username = $this->safe($data['username']); 
            $this->password = $this->safe($data['password']);

            $sql = "";

            $this->connect();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $this->username); 
           

            if(!$stmt->execute()) {
                throw new Exception("Er ging iets mis met inloggen");
            }

            $count = $stmt->rowCount();
            
            if($count == 1){
               $user = $stmt->fetch();

               if(!password_verify($this->password, $user->password)) {
                return false;
               }
               return $user;
            } else {
                return false;
            }

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}