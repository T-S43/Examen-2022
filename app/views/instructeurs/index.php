<?php 
  require APPROOT . '/views/includes/header.php';
  echo $data["title"]; 
?>
<a class="btn btn-sm btn-primary" href="<?=URLROOT;?>/instructeurs/create">Nieuw record</a>

<div class="table-responsive-md">
  <table class="table">
    <thead>
      <th scope="col">Naam</th>
      <th scope="col">Adres</th>
      <th scope="col">Woonplaats</th>
      <th scope="col">Datum</th>
      <th scope="col">Tijd</th>
      <th scope="col">Ophaaladres</th>
    </thead>
    <tbody>
      <?=$data['instructeurs']?>
    </tbody>
  </table>
</div>
<?php 
  echo $data["title1"]; 
?>
<a class="btn btn-sm btn-primary" href="<?=URLROOT;?>/instructeurs/createMankement">Nieuw mankement</a>
<div class="table-responsive-md">
  <table class="table">
    <thead>
      <th scope="col">Kenteken</th>
      <th scope="col">Type</th>
      <!-- <th scope="col">Mankement</th> -->
    </thead>
    <tbody>
      <?=$data['mankementen']?>
    </tbody>
  </table>
</div>
<a class="btn btn-sm btn-primary" href="<?=URLROOT;?>/homepages/index">terug</a>
<a class="btn btn-sm btn-primary" href="<?=URLROOT;?>/leerlingen/wijzig">Wijzig</a>

<?php 
  require APPROOT . '/views/includes/footer.php';
?>
