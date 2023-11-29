<?php

class DBconfig {

    protected $conn;

    public function connect() {
        try {
            $conn = new PDO('mysql:localhost=db;dbname=kerkelanden', 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->conn = $conn;

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    protected function safe($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}