<?php

  use TDD\libraries\Database;

  class Les {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getLessen() {
      $this->db->query("SELECT * FROM `rijles` WHERE datum > current_date AND leerling=20 ORDER BY datum ASC;");/// met deze code vraag je om het lijst van rijles van een dag die nog niet is geweest en van een bepaaldde student

      $result = $this->db->resultSet();
      return $result;
    }


    public function createLes($id) {
      try {
                                  
        $this->db->query("DELETE FROM rijes WHERE id = :id");
        $this->db->bind("id", $id, PDO::PARAM_INT);
        return $this->db->execute();
    } catch(PDOException $e) {
        logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
        return 0;
    }
    }
    
    // public function deleteLes($id) {
        // try {
                                  
        //     $this->db->query("DELETE FROM rijes WHERE id = :id");
        //     $this->db->bind("id", $id, PDO::PARAM_INT);
        //     return $this->db->execute();
        // } catch(PDOException $e) {
        //     logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
        //     return 0;
        // }
    // }
  }

?>