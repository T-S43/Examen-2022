<?php
  require APPROOT . '/views/includes/header.php';
  // var_dump($data);
?>

<div class="container mt-3">
  <div class="col-md-12">
    <div class="card">
      <?= $data['title']; ?>
      <div class="card-body">
        <form action="<?= URLROOT; ?>/ziekmelden/create" method="post">

                  <label class= "form-label" for="name">Uw naam</label>
                  <input class="form-control" disabled type="text" value="Bas Jonkers">
                  <input type="hidden" name="name" id="name" value="1">
                  <div class="errorForm"><?= $data['nameError']; ?></div>

                  <label class= "form-label" for="capitalCity">Reden van melding</label>
                  <input class="form-control" type="text" name="reason" id="reason" value="<?= $data['reason']; ?>">
                  <div class="errorForm"><?= $data['reasonError']; ?></div>

                 <label class= "form-label" for="continent">Vanaf datum</label>
                 <input class="form-control" type="date" name="sincedate" id="sincedate" value="<?= $data['sincedate']; ?>">
                 <div class="errorForm"><?= $data['sincedateError']; ?></div>

                 <label class= "form-label" for="population">Tot datum</label>
                 <input class="form-control" type="date" name="untildate" id="untildate" value="<?= $data['untildate']; ?>">
                 <div class="errorForm"><?= $data['untildateError']; ?></div>

                  <input class="btn btn-primary mt-3 w-100" type="submit" value="Insturen">


        </form>
        <a href="<?=URLROOT;?>/ziekmelden/index">Terug</a>
      </div>
    </div>
  </div>
</div>

<?php
  require APPROOT . '/views/includes/footer.php';
?>
