<?php

  use TDD\libraries\Database;

  class Students {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }
// word uit het database verstuurd
    public function getStudent() {
      $this->db->query("SELECT * FROM `student` ORDER BY `id` ASC;");
      $result = $this->db->resultSet();
      return $result;
    }

    public function getSingStudent($id) {
      $this->db->query("SELECT * FROM student WHERE id = :id");
      $this->db->bind(':id', $id, PDO::PARAM_INT);
      return $this->db->single();
    }
  
  }

?>