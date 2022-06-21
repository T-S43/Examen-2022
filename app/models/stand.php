<?php

  use TDD\libraries\Database;

  class stand {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    // Alle standen ingegeven in de database naar voren halen
    public function getStandenmeldingen() {
      $this->db->query("SELECT auto.kenteken as kenteken, auto.type as type FROM `auto`");
      $result = $this->db->resultSet();
      // resultaat terugsturen
      return $result;
    }

    // Alle opties uit de tabel auto halen en versturen in de functie
    public function getAutoOpties() {
      $this->db->query("SELECT auto.kenteken as kenteken FROM `auto`");
      $result = $this->db->resultSet();
      // resultaat terugsturen
      return $result;
    }

    public function createStand($post) {
      try {
        // query opstellen voor de binds
        $this->db->query("INSERT INTO kmstanden (id, auto, datum, kmstand)
                            VALUES(:id, :auto, :datum, :kmstand)");

        // op veilige wijze de variabelen die uit het formulier naar binnen komen
        // met post verwerken en verbinden met de query om deze vervolgens uit te voeren.
        $this->db->bind(':id', NULL, PDO::PARAM_INT);
        $this->db->bind(':auto', $post["auto"], PDO::PARAM_STR);
        $this->db->bind(':datum', $post["datum"], PDO::PARAM_STR);
        $this->db->bind(':kmstand', $post["kmstand"], PDO::PARAM_INT);

        // resultaat terugsturen van de query, met succes of zonder succes
        return $this->db->execute();

      } catch (PDOException $e) {
          logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
          return 0;
      }
    }
  }

?>
