<?php
  require APPROOT . '/views/includes/header.php';
?>

<div class="container">
  <?= $data["title"]; ?>
  <div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h4>Je huidige pakket</h4>
        <p class="text-primary"><?=$data['pakketnaam']?></p>
      </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card">
      <div class="card-body">
        <h4>CBR Examen</h4>
        <p class="text-primary"><?=$data['cbrexamen']?></p>
      </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card">
      <div class="card-body">
        <h4>Pakket Prijs</h4>
        <p class="text-primary">€ <?=$data['prijs']?></p>
      </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="card">
      <div class="card-body">
        <h4>Lessen over</h4>
        <p class="text-primary"><?=$data['aantallessen']?></p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h4>Betaling</h4>
        <p class="text-primary"><?=$data['betaaltermijnen']?></p>
      </div>
    </div>
  </div>
</div>
  <div class="col-md-12 mt-3">
      <div class="card">
        <div class="card-body">
          <h4>Alle lessen</h4>
          <table class="table">
            <thead>
              <th>Lesnummer</th>
              <th>Datum</th>
              <th>Naam</th>
            </thead>
            <tbody>
              <!-- het toevoegen van de hoofd data -->
              <?=$data['enddata']?>
            </tbody>
          </table>
            <a href="<?=URLROOT;?>">Terug</a>
        </div>
      </div>
  </div>
</div>


<?php
  require APPROOT . '/views/includes/footer.php';
?>
