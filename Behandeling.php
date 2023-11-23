<?php 

class Behandeling {
    private $id;
    private $naam;

    public function __construct($id, $naam) {
        $this->id = $id;
        $this->naam = $naam;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

    
}


?>