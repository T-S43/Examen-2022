<?php

  use TDD\libraries\Database;

  class Instructeur {
    // Properties, fields
    private $db;

    // Dit is de constructor
    public function __construct() {
      $this->db = new Database();
    }
    // functie om de rijles tabel op te halen aan de hand van of student gelijk staat aan name van de leerling tabel
    public function getInstructeurs() {
      $this->db->query("SELECT * 
                        FROM `rijles` as r
                        INNER JOIN `leerling` as l
                        ON(r.student = l.name);
                        ");
      //er word een resultset teruggegeven in een variabel
      $result = $this->db->resultSet();
      //de variabel word vervolgens gereturned
      return $result;
    }
    //Functie om de auto tabel op te halen door middel van een sql query
    public function getMankementen() {
      $this->db->query("SELECT * FROM `auto` ORDER BY `type` ASC; ");
      //er word een resultset teruggegeven in een variabel
      $result = $this->db->resultSet();
      //de variabel word vervolgens gereturned
      return $result;
    }

    //functie om te inserten naar de rijles tabel in de database
    public function createRijles($post) {
      try {
        $this->db->query("INSERT INTO rijles (id, datum, tijd, ophaaladres, student) 
                            VALUES(:id, :datum, :tijd, :ophaaladres, :student)");
        //bind de waarden aan de query en filter deze door middel van pdo parameters
        $this->db->bind(':id', NULL, PDO::PARAM_INT);
        $this->db->bind(':datum', $post["datum"], PDO::PARAM_STR);
        $this->db->bind(':tijd', $post["tijd"], PDO::PARAM_STR);
        $this->db->bind(':ophaaladres', $post["ophaaladres"], PDO::PARAM_STR);
        $this->db->bind(':student', $post["student"], PDO::PARAM_STR);
        //returned de query
        return $this->db->execute();
        
      } catch (PDOException $e) {
        //catch de fouten en geef deze terug aan de gebruiker
          logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
          return 0;
      }
    }
    //functie om te inserten naar de mankament tabel in de database
    public function createMankement($post) {
      try {
        $this->db->query("INSERT INTO mankement (id, auto, datum, mankement) 
                            VALUES(:id, :auto, :datum, :mankement)");
        //bind de waarden aan de query en filter deze door middel van pdo parameters
        $this->db->bind(':id', NULL, PDO::PARAM_INT);
        $this->db->bind(':auto', $post["auto"], PDO::PARAM_STR);
        $this->db->bind(':datum', $post["datum"], PDO::PARAM_STR);
        $this->db->bind(':mankement', $post["mankement"], PDO::PARAM_STR);
        //returned de query
        return $this->db->execute();
        //catch de fouten en geef deze terug aan de gebruiker
      } catch (PDOException $e) {
          logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
          return 0;
      }
    }
  }

?>