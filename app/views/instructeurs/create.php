<?php
  require APPROOT . '/views/includes/header.php';
  echo $data['title']; 
  // var_dump($data);
?>

<form action="<?= URLROOT; ?>/instructeurs/create" method="post">
  <table>
    <tbody>
      <tr>        
        <td>
          <label class= "form-label" for="student">Student</label>
          <select class="form-control" id="student" name="student" value="<?= $data['student']; ?>">
            <option>Sherick</option>
            <option>Gerda</option>
            <option>Bert</option>
            <option>Batrisschia</option>
            <option>Bob</option>
          </select>
          <div class="errorForm"><?= $data['studentError']; ?></div>
        </td>
      </tr>
      <tr>        
        <td>
          <label class= "form-label" for="datum">Datum</label>
          <input class="form-control" type="date" name="datum" id="datum" value="<?= $data['datum']; ?>">
          <div class="errorForm"><?= $data['datumError']; ?></div>
        </td>
      </tr>
      <tr>
        <td>
          <label class= "form-label" for="tijd">Tijd</label>
          <input class="form-control" type="time" name="tijd" id="tijd" value="<?= $data['tijd']; ?>">
          <div class="errorForm"><?= $data['tijdError']; ?></div>
        </td>
      </tr>
      <tr>
        <td>
         <label class= "form-label" for="ophaaladres">Ophaaladres</label>
         <input class="form-control" type="text" name="ophaaladres" id="ophaaladres" value="<?= $data['ophaaladres']; ?>">
         <div class="errorForm"><?= $data['ophaaladresError']; ?></div>
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