<?php
  require APPROOT . '/views/includes/header.php';
  // var_dump($data);
?>

<div class="container mt-3">
  <div class="col-md-12">
    <div class="card">
      <?= $data['title']; ?>
      <div class="card-body">
        <form action="<?= URLROOT; ?>/standen/create" method="post">

                  <label class= "form-label" for="name">Kenteken auto</label>
                  <select name="auto" id="auto" class="form-select" aria-label="Default select example">
                    <?= $data['options'] ?>
                  </select>
                  <input type="hidden" name="datum" id="datum" value="<?= date("Y-m-d"); ?>">

                  <label class= "form-label" for="capitalCity">Nieuwe kilometerstand</label>
                  <input class="form-control" type="text" name="kmstand" id="kmstand" value="<?= $data['kmstand']; ?>">
                  <div class="errorForm"><?= $data['kmstandError']; ?></div>

                  <input class="btn btn-primary mt-3 w-100" type="submit" value="Insturen">


        </form>
        <a href="<?=URLROOT;?>/standen/index">Terug</a>
      </div>
    </div>
  </div>
</div>

<?php
  require APPROOT . '/views/includes/footer.php';
?>
