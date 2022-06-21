<?php
  require APPROOT . '/views/includes/header.php';
?>

<div class="container">
  <?= $data["title"]; ?>
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <?= $data["melding"]; ?>
        <!-- knop voor nieuwe standen invoeren voor instructeurs -->
        <a class="btn btn-primary" href="<?=URLROOT;?>/standen/create">Nieuwe stand invoeren</a>
      </div>
    </div>
  </div>
  <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <table class="table">
            <thead>
              <th>Kenteken</th>
              <th>Type</th>
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
