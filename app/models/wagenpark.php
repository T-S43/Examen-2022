<?php

use TDD\libraries\Database;

class wagenpark {
    private $db;

    public function __construct() {
        //make a new database class that is made in database.php
        $this->db = new Database;
    }

    public function getVoertuig() {
        // We are grabbing vechiles and instructeurs from the connected database
        $this->db->query("SELECT * FROM voertuig INNER JOIN instructeur ON voertuig.instructeurId = instructeur.idInstructeur ORDER BY id");
        $result = $this->db->resultSet();
        return $result;
    }

    // Update all rows we have
    public function update ($data){
        // Update vechile query
        $this->db->query("UPDATE voertuig
                                        SET instructeurId = :instructeurId,
                                            kilometer = :kilometer
                                        WHERE id= :id ");
        $this->db->bind(':id', $data["id"], PDO::PARAM_INT);

        // return $this->db->execute();
        //bind value instructeur and kilometer
        $this->db->bind(':instructeurId', $data['instructeurId']);
        $this->db->bind(':kilometer', $data['kilometer']);

        //execute function
        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
}

        public function getSingleUser($id){
            $this->db->query("SELECT * FROM voertuig WHERE id = :id");
            $this->db->bind(':id', $id, PDO::PARAM_INT);
            //only returns 1 row with the right id
            return $this->db->single();
        }
}