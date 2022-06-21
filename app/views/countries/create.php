<?php
  require APPROOT . '/views/includes/header.php';
  echo $data['title']; 
  // var_dump($data);
?>

<form action="<?= URLROOT; ?>/countries/create" method="post">
  <table>
    <tbody>
      <tr>        
        <td>
          <label class= "form-label" for="name">Naam van het land</label>
          <input class="form-control" type="text" name="name" id="name" value="<?= $data['name']; ?>">
          <div class="errorForm"><?= $data['nameError']; ?></div>
        </td>
      </tr>
      <tr>
        <td>
          <label class= "form-label" for="capitalCity">Naam van de hoofdstad</label>
          <input class="form-control" type="text" name="capitalCity" id="capitalCity" value="<?= $data['capitalCity']; ?>">
          <div class="errorForm"><?= $data['capitalCityError']; ?></div>
        </td>
      </tr>
      <tr>
        <td>
         <label class= "form-label" for="continent">Naam van het continent</label>
         <input class="form-control" type="text" name="continent" id="continent" value="<?= $data['continent']; ?>">
         <div class="errorForm"><?= $data['continentError']; ?></div>
        </td>
      </tr>
      <tr>
        <td>
         <label class= "form-label" for="population">Aantal inwoners</label>
         <input class="form-control" type="number" name="population" id="population" value="<?= $data['population']; ?>">
         <div class="errorForm"><?= $data['populationError']; ?></div>
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