<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <style>a {text-decoration: none;}</style>
    <title>Rijschoolhouder wagenpark lijst</title>
    <style>
    body {
        background-color: rgb(249, 249, 249);
    }
</style>
</head>
<body>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Merk</th>
      <th scope="col">Type</th>
      <th scope="col">Kenteken</th>
      <th scope="col">Instructeurs</th>
      <th scope="col">Kilometer meter</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <!-- Grabbing data from the wagenparken controller -->
        <?=$data["voertuigRows"];?>
    </tr>
  </tbody>
</table>

<br> <a href="<?=URLROOT?>">Terug naar de startpagina gaan</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

  <script type="text/javascript">
    // On press send a message
    function confirmSubmit() {
      var check = confirm("Are you sure you wish to continue?");
      if (check) {
        return true;
      }else {
        return false;
      }
  }
  </script>