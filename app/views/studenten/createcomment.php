<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    body {
        background-color: rgb(249, 249, 249);
    }
</style>
    <title>Opmerking toevoegen</title>
</head>
  <body>
      <h1>Opmerking toevoegen</h1>
      <div class="container">
        <div class="row">
            <div class="col-sm">
                <form action="/studenten/createcomment" method="POST"  id="acceptForm">
                <label for="opmerking" required>opmerking:</label>
                <!-- User puts in their message and can then press the button to send -->
                <input type="text" id="opmerking" name="opmerking" required><br><br>
                <td><input type="hidden" name="id" value=<?= $data['userRow']->id;?>></td>
                    <div class="d-grid gap-2">
                        <button type="sumbit" name="submit" class="btn btn-primary" onClick='return confirmSubmit()'>OK</button>
                        <!-- On button press give a message and then send them back -->
                    </div>
                </form>
            </div>
        </div>
    </div>
<footer>
    <h1><a href="/studenten/index">terug gaan naar de lessen lijst</a></h1>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

    <script type="text/javascript">
        function confirmSubmit() {
            var check = confirm("Are you sure you wish to continue?");
            if (check)
                return true ;
            else
                return false ;
        }
    </script>  