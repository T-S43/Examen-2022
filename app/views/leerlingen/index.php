<?php 
  require APPROOT . '/views/includes/header.php';
?>
<h3> LEERLINGEN OVERVIEW </h3>

<div class="table-responsive-md">
  <table class="table">
    <thead>
      <th scope="col">Datum</th>
      <th scope="col">Woonplaats</th>
      <th scope="col">Straat</th>
      <th scope="col">Naam Instructeur</th>
    </thead>
    <tbody>
      <?= 
          $data['ophaallocaties'] 
        ?>
        <?=
          $data['leerlingen']
          ?>
    </tbody>
  </table>
</div>

<a class="btn btn-sm btn-primary" href="<?=URLROOT;?>/homepages/index">Terug</a>
<a class="btn btn-sm btn-primary" href="<?=URLROOT;?>/leerlingen/wijzig">Wijzig</a>

<?php 
  require APPROOT . '/views/includes/footer.php';
?>
