<?php

  use TDD\libraries\Database;

  class Instructors {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getInstructor() {
      $this->db->query("SELECT * FROM `instructors` ORDER BY `id` ASC;");
      $result = $this->db->resultSet();
      return $result;
    }

  }

?>