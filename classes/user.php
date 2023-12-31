<?php
require_once "DBconfig.php";

class User extends DBconfig {

    public $naam;
    public $username;
    public $password;
    public $adres;
    public $geboortedatum;
    public $tel_nr;
    public $rol;

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
    
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($data && password_verify($this->password, $data['Password'])) {
                return $data;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    

    public function register($data) {
        try {
            $this->username = $this->safe($data['username']);
            $this->password = $this->safe(password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 12]));
            $this->naam = $this->safe($data['naam']);
            $this->adres = $this->safe($data['adres']);
            $this->geboortedatum = $this->safe($data['geboortedatum']);
            $this->tel_nr = $this->safe($data['tel_nr']);
            $this->rol = $this->safe($data['rol']);

            $sql = "INSERT INTO user (username, password, naam, adres, geboortedatum, tel_nr, rol) VALUES (:username, :password, :naam, :adres, :geboortedatum, :tel_nr, :rol)";

            $this->connect();
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':username', $this->username);
            $stmt->bindValue(':password', $this->password);
            $stmt->bindValue(':naam', $this->naam);
            $stmt->bindValue(':adres', $this->adres);
            $stmt->bindValue(':geboortedatum', $this->geboortedatum);
            $stmt->bindValue(':tel_nr', $this->tel_nr);
            $stmt->bindValue(':rol', $this->rol);

            if(!$stmt->execute()) {
                throw new Exception("Er is iest mis gegaan met het toevoegen van de user. Probeer later opnieuw!");
            }
            return "{$this->username} is toegevoegd!";

        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}