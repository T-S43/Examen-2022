<?php

  use TDD\libraries\Database;

  class Leerling {
    // Properties, fields
    private $db;

    // Dit is de constructor
    public function __construct() {
      $this->db = new Database();
    }                                
    //maak een query om alle lessen en hun bijbehorende tabellen te verbinden door inner joins en dat dan selecten
    public function getLessen() {
      $this->db->query("SELECT
                          ls.id,
                          ls.datum,
                          ls.leerling,
                          lr.woonplaats,
                          lr.straat,
                          ins.naam
                        FROM `lessen` AS ls
                        INNER JOIN `leerling1` AS lr ON ls.leerling = lr.id
                        INNER JOIN `instructeur` AS ins ON ls.instructeur = ins.email
                        INNER JOIN `alternatieveophaallocatie` AS ao ON ls.id != ao.les
                        WHERE ls.datum >= CURRENT_DATE()
                        "
                        );
      
      
      //er word een resultset teruggegeven in een variabel
      $result = $this->db->resultSet();
      //de variabel word vervolgens gereturned
      return $result;
    }
    //maak een query om alle lessen en hun bijbehorende tabellen te verbinden door inner joins en dat dan selecten
    public function getOphaalLocaties() {
      $this->db->query("SELECT
                          ls.id,
                          ls.datum,
                          ls.leerling,
                          ao.woonplaats,
                          ao.straat,
                          ins.naam
                        FROM `lessen` AS ls
                        INNER JOIN `leerling1` AS lr ON ls.leerling = lr.id
                        INNER JOIN `instructeur` AS ins ON ls.instructeur = ins.email
                        INNER JOIN `alternatieveophaallocatie` AS ao ON ls.id = ao.les
                        WHERE ls.datum >= CURRENT_DATE()
                        "
                        );
      //er word een resultset teruggegeven in een variabel
      $result = $this->db->resultSet();
      //de variabel word vervolgens gereturned
      return $result;
    }

    //pakt de gegevens van de lessen gebaseerd op id
    public function getSingleLes($id) {
      $this->db->query("SELECT * FROM lessen WHERE id = :id");
      $this->db->bind(':id', $id, PDO::PARAM_INT);
      // voert de query uit
      return $this->db->single();
    }

    public function createLeerling($post) {
      try {
       //echo "Hoi";var_dump($post);exit();
        $this->db->query("INSERT INTO 
                                alternatieveophaallocatie 
                                (id, les, straat, woonplaats)
                          VALUES
                                (:id, :les, :straat, :woonplaats)
                         ");
        // bind alle rows aan de opgegeven waardes
        $this->db->bind(':id', NULL, PDO::PARAM_INT);
        $this->db->bind(':les', $post["les"], PDO::PARAM_STR);
        $this->db->bind(':straat', $post["straat"], PDO::PARAM_STR);
        $this->db->bind(':woonplaats', $post["woonplaats"], PDO::PARAM_STR);
        //var_dump($this->db);exit();
        //execute de query
        return $this->db->execute();

      //catch de error en stopt hem in de logfile
      } catch (PDOException $e) {
          logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
          return 0;
      }
    }
  }