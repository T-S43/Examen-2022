<?php

  use TDD\libraries\Database;

  class les {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    // Alle lesdata ingegeven in de database naar voren halen
    public function getLessenData() {
      $this->db->query("SELECT lessen.datum as datum, leerling.naam as naam, leerling.pakket as pakket FROM lessen INNER JOIN leerling ON lessen.leerling = leerling.id  WHERE leerling.naam='konijn' ORDER BY `pakket` asc");
      $result = $this->db->resultSet();
      // resultaat terugsturen
      return $result;
    }

    // Alle pakketdata ingegeven in de database naar voren halen
    public function getPakketData() {
      $this->db->query("SELECT pakketten.naam as naam, pakketten.prijs as prijs, pakketten.aantallessen as aantallessen, pakketten.cbrexamen as cbrexamen, pakketten.betaaltermijnen as betaaltermijnen FROM pakketten WHERE naam='Pakket 1' LIMIT 1");
      $result = $this->db->resultSet();
      // resultaat terugsturen
      return $result;
    }
  }

?>
