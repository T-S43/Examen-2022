<?php

  use TDD\libraries\Database;

  class Rijlesen {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }
// word uit het database verstuurd
    public function getRijles() {
      $this->db->query("SELECT * FROM `rijles` ORDER BY `id` ASC;");
      $result = $this->db->resultSet();
      return $result;
    }

    public function getSingRijles($id) {
      $this->db->query("SELECT * FROM rijles WHERE id = :id");
      $this->db->bind(':id', $id, PDO::PARAM_INT);
      return $this->db->single();
    }
  
  }

?>