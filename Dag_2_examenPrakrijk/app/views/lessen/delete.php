<!-- Laat je de header zien  -->
<?php
  require APPROOT . '/views/includes/header.php';
?>

<!-- Laat je de messege zien van /app/controller/lessen bij function delete  -->
<h3><?= $data['deleteStatus']; ?></h3>

<!-- Laat je de footer zien  -->
<?php
  require APPROOT . '/views/includes/footer.php';
?>