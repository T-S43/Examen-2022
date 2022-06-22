<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <style>a {text-decoration: none;}</style>
    <title>Student</title>
    <style>
    body {
        background-color: rgb(249, 249, 249);
    }
</style>
</head>
<body>
    <h1>Welkom vandaag is het <?=$data["datumVandaag"];?></h1>

<table class="table table-striped table-hover">
  <thead>
    <tr>
        <th scope="col">Les nummer</th>
        <th scope="col">Datum</th>
        <th scope="col">Uw instructeur</th>
        <th scope="col">Opmerking</th>
        <th scope="col">Onderwerp</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <tr>
      <!-- Grabbing data from the wagenparken controller -->
        <?=$data["lessenRows"];?>
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
      var check = confirm("Wilt uw naar de pagina gaan?");
      if (check) {
        return true;
      }else {
        return false;
      }
  }
  </script>