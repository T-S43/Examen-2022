<?php 
  require APPROOT . '/views/includes/header.php';
  echo $data["title"]; 
?>
<a href="<?=URLROOT;?>/countries/create">Nieuw record</a>
<table>
  <thead>
    <th>Land</th>
    <th>hoofdstad</th>
    <th>continent</th>
    <th>aantalinwoners</th>
    <th>update</th>
    <th>delete</th>
  </thead>
  <tbody>
    <?=$data['countries']?>
  </tbody>
</table>
<a href="<?=URLROOT;?>/homepages/index">terug</a>

<?php 
  require APPROOT . '/views/includes/footer.php';
?>
