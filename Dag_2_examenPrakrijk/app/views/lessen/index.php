<!-- Laat je de header zien  -->
<?php 
  require APPROOT . '/views/includes/header.php';
  echo $data["title"]; //Laat je de title in /view/controller van function index zijn 
?>

<!-- Wat je kan zien wanner je in de read pagina ben
meaning het style, naam ect -->
<table style="width:100%; border:1px solid black;">
    <thead>
        <th>ID</th>
        <th>Datum</th>
        <th>leerling</th>
        <th>Instructeur</th>
        <th>Afmelden</th>
    </thead>
    <tbody>
        <?=$data['lessen']?>
    </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index">terug</a>

<!-- Laat je de je footer zien  -->
<?php 
  require APPROOT . '/views/includes/footer.php';
?>