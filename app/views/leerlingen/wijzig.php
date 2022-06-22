<?php 
  require APPROOT . '/views/includes/header.php';
?>
<h3> WIJZIG LEERLING </h3>

<div class="table-responsive-md">
  <table class="table">
    <thead>
      <th scope="col">Datum</th>
      <th scope="col">Wijzig</th>
    </thead>
    <tbody>
      <?=$data['wijzigingen']?>
    </tbody>
  </table>
</div>

<a class="btn btn-sm btn-primary" href="<?=URLROOT;?>/leerlingen/index">Terug</a>
<?php 
  require APPROOT . '/views/includes/footer.php';
?>