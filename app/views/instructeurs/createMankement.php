<?php
  require APPROOT . '/views/includes/header.php';
  echo $data['title']; 
  // var_dump($data);
?>

<form action="<?= URLROOT; ?>/instructeurs/createMankement" method="post">
  <table>
    <tbody>
      <tr>        
        <td>
          <label class= "form-label" for="auto">Auto</label>
          <!-- <input class="form-control" type="date" name="auto" id="auto" value="<?= $data['auto']; ?>"> -->     
          <select class="form-control" id="auto" name="auto" value="<?= $data['auto']; ?>">
            <option>AU-67-10</option>
            <option>TH-78KL</option>
            <option>90-KL-TR</option>
            <option>YY-OP-78</option>
            <option>DR-42-0H</option>
          </select>
          <div class="errorForm"><?= $data['autoError']; ?></div>
        </td>
      </tr>
      <tr>
        <td>
          <label class= "form-label" for="datum">datum</label>
          <input class="form-control" type="text" name="datum" id="datum" value="
          <?php echo date('Y-m-d');?>">
          <div class="errorForm"><?= $data['datumError']; ?></div>
        </td>
      </tr>
      <tr>
        <td>
         <label class= "form-label" for="mankement">Mankement</label>
         <input class="form-control" type="text" name="mankement" id="mankement" value="<?= $data['mankement']; ?>">
         <div class="errorForm"><?= $data['mankementError']; ?></div>
        </td>
      </tr>
      <tr>
        <td>
          <input type="submit" value="Verzenden">
        </td>
      </tr>
    </tbody>
  </table>

</form>

<?php
  require APPROOT . '/views/includes/footer.php';
?>