<?php
// 
// Dit is voor user Story 3 Leerling kan zijn lessen onderwerp en opmerkingen kunnen plaatsen
// 



use TDD\libraries\Database;

class student1 {
    private $db;

    public function __construct() {
        //make a new database class that is made in database.php
        $this->db = new Database;
    }

    public function getLessen() {
        //The user
        $userId = 1;

        // We are grabbing all info that is before the date and is from the logged in user
        // $this->db->query("SELECT * FROM leerling1, instructeur  INNER JOIN lessen1 ON  leerling1.id = lessen1.leerling  WHERE $userId = `leerling` AND `datum` < CURRENT_DATE");
        $this->db->query("SELECT ls.datum, ls.leerling, ll.id, i.naam, ls.instructeur, i.email, ls.id
            FROM leerling1 as ll, lessen1 as ls, instructeur1 as i  
            WHERE `instructeur` = `email`
            AND ll.id = $userId 
            AND ls.leerling = $userId
            AND ls.datum < CURRENT_DATE");

        $result = $this->db->resultSet();
        return $result;
    }

    public function getOpmerkingen($id) {
        // We are grabbing all info from opmerkingen and use the id we grabbed and sended here
        $this->db->query("SELECT opmerking FROM opmerkingen1 WHERE $id = `les`");
        $result = $this->db->resultSet();
        return $result;
    }

    public function getOnderwerpen($id) {
        $this->db->query("SELECT onderwerp FROM onderwerpen1 WHERE $id = `les`");
        $result = $this->db->resultSet();
        return $result;
    }

// Getting everything from the id we sent
        public function getSingleUser($id){
            $this->db->query("SELECT id FROM lessen1 WHERE id = :id");
            $this->db->bind(':id', $id, PDO::PARAM_INT);
            //only returns 1 row with the right id
            return $this->db->single();
        }
}