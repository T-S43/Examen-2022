<?php

use TDD\libraries\Database;

class student {
    private $db;

    public function __construct() {
        //make a new database class that is made in database.php
        $this->db = new Database;
    }

    public function getLessen() {
        //The user
        $userId = 1;
        // $date = date('Y-m-d');
        // echo $date;

        // We are grabbing all info that is before the date and is from the logged in user
        $this->db->query("SELECT * FROM leerling INNER JOIN lessen ON  leerling.id = lessen.leerling  WHERE $userId = `leerling` AND `datum` <= CURRENT_DATE");
        // $this->db->query("SELECT * FROM leerling INNER JOIN lessen ON  leerling.id = lessen.leerling  WHERE $userId = `leerling`");
        $result = $this->db->resultSet();
        return $result;
    }

    // Update all rows we have
    public function createComment ($data){
        // Insert our data from the controller into opmerking
        $this->db->query("INSERT INTO opmerkingen (id, les, opmerking) VALUES(NULL, :les, :opmerking)");
    
        //binding values to send
        $this->db->bind(':les', $data['les']);
        $this->db->bind(':opmerking', $data['opmerking']);
    
        //execute function
        if ($this->db->execute()){
            return true;
        }else{
            return false;
    }
}

// Getting everything from the id we sent
        public function getSingleUser($id){
            $this->db->query("SELECT * FROM lessen WHERE id = :id");
            $this->db->bind(':id', $id, PDO::PARAM_INT);
            //only returns 1 row with the right id
            return $this->db->single();
        }
}