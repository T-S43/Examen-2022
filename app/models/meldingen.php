<?php

  use TDD\libraries\Database;

  class Meldingen {
    // Properties, fields
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getZiekmeldingen() {
      $this->db->query("SELECT ziekmelden.id as ziekmeldid, ziekmelden.reason as reason, ziekmelden.since_date as sincedate, ziekmelden.until_date as untildate, gebruikers.firstname as voornaam, gebruikers.lastname as achternaam FROM `ziekmelden` INNER JOIN gebruikers ON ziekmelden.connection_id = gebruikers.id ORDER BY `ziekmeldid` ASC");
      $result = $this->db->resultSet();
      return $result;
    }

    public function deleteMeldingen($id) {
        try {
            $this->db->query("DELETE FROM ziekmelden WHERE id = :id");
            $this->db->bind("id", $id, PDO::PARAM_INT);
            return $this->db->execute();
        } catch(PDOException $e) {
            logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
            return 0;
        }
    }

    public function createMeldingen($post) {
      try {
        $this->db->query("INSERT INTO Ziekmelden (id, connection_id, status, reason, since_date, until_date)
                            VALUES(:id, 1, 1, :reason, :sincedate, :untildate)");

        $this->db->bind(':id', NULL, PDO::PARAM_INT);
        $this->db->bind(':reason', $post["reason"], PDO::PARAM_STR);
        $this->db->bind(':sincedate', $post["sincedate"], PDO::PARAM_STR);
        $this->db->bind(':untildate', $post["untildate"], PDO::PARAM_INT);

        return $this->db->execute();

      } catch (PDOException $e) {
          logger(__FILE__, __METHOD__, __LINE__, $e->getMessage());
          return 0;
      }
    }
  }

?>
