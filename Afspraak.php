    <?php 

    header('Location: index.php');

    require_once "DBConfig.php";

    class Afspraak extends DBConfig {
        private $id;
        private $attribute;
        private $datum;
        private $locatie;
        private $type;

        public function __construct($id, $attribute, $datum, $locatie, $type) {
            $this->id = $id;
            $this->attribute = $attribute;
            $this->datum = $datum;
            $this->locatie = $locatie;
            $this->type = $type;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getAttribute() {
            return $this->attribute;
        }

        public function setAttribute($attribute) {
            $this->attribute = $attribute;
        }

        public function getDatum() {
            return $this->datum;
        }

        public function setDatum($datum) {
            $this->datum = $datum;
        }

        public function getLocatie() {
            return $this->locatie;
        }

        public function setLocatie($locatie) {
            $this->locatie = $locatie;
        }

        public function getType() {
            return $this->type;
        }

        public function setType($type) {
            $this->type = $type;
        }

        public function addAfspraak($data) {
            try {
                $this->factuurID = $data['factuurID'];
                $this->locatieID = $data['naam'];
                $this->starttijd = $data['starttijd'];
                $this->eindtijd = $data['eindtijd'];
                $this->type = $data['type'];

                $sql = "INSERT INTO Afspraak (FactuurID, LocatieID, Starttijd, Eindtijd, Type) VALUES (:factuurID, :locatieID, :starttijd, :eindtijd, :type)";

                $stmt = $this->db->prepare($sql);
        
                $stmt->bindParam(':factuurID', $factuurID, PDO::PARAM_INT);
                $stmt->bindParam(':locatieID', $locatieID, PDO::PARAM_INT);
                $stmt->bindParam(':starttijd', $starttijd, PDO::PARAM_INT);
                $stmt->bindParam(':eindtijd', $eindtijd, PDO::PARAM_INT);
                $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        
                if($stmt->execute()) {
                    return $this->db->lastInsertId();
                } else {
                    return false;
                }
            }catch(Exception $e) {
                return $e->getMessage();
            }
        }

        public function deleteAfspraak($id) {
        }
    }


    ?>