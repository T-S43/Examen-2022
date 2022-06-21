<?php
  require APPROOT . '/views/includes/header.php';
?>

<div class="container">
  <?= $data["title"]; ?>
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <a class="btn btn-primary" href="<?=URLROOT;?>/ziekmelden/create">Nieuwe melding maken</a>
      </div>
    </div>
  </div>
  <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <table class="table">
            <thead>
              <th>instructeur</th>
              <th>reden</th>
              <th>vanaf datum</th>
              <th>tot datum</th>
              <th>verwijderen</th>
            </thead>
            <tbody>
              <!-- tonen van alle te tonen data -->
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
