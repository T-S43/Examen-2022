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
    <title>Update Wagen</title>
</head>
  <body>
      <h1>Update de Wagen</h1>
<!-- <form action="adminprocess.php" method="POST">
     <input type="submit" name="completeYes" value="Complete Transaction" />
</form> -->


      <div class="container">
        <div class="row">
            <div class="col-sm">
                <form action="/wagenparken/updatevoertuig" method="POST"  id="acceptForm">
                <label for="kilometer" required>kilometer meter:</label>
                <!-- $data is send from wagenparken and is shown -->
                <input type="text" id="kilometer" name="kilometer" value=<?= $data['updateRow']->kilometer;?> required><br><br>
                <td><input type="hidden" name="id" value=<?= $data['updateRow']->id;?>></td>
                <p>Instructeurs</p>
                <!-- Multiple choice for the user -->
                    <select name="instructeurId" id="instructeurId" class="form-select" aria-label="Default select example">
                        <option value="1">Hendriks van Robinson</option>
                        <option value="2">Bendrix Chameleo</option>
                        <option value="3">Johnson Reddison</option>
                        <option value="4">Patrick Livmoore</option>                                                        
                        <option value="5">Rick Fair</option>                                                        
                    </select>

                    <div class="d-grid gap-2">
                        <button type="sumbit" name="submit" class="btn btn-primary" onClick='return confirmSubmit()'>Verstuur</button>
                        <!-- On button press give a message and then send them back -->
                    </div>
                </form>
            </div>
        </div>
    </div>
<footer>
    <h1><a href="/wagenparken/index">terug gaan naar de wagen lijst</a></h1>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

    <!-- For the modal -->
    <script type="text/javascript">
        // var el = document.getElementById('acceptForm');

        // el.addEventListener('submit', function(){
        // return confirm('Are you sure you want to submit this form?');
        // }, false);

        // On press send a message
        function confirmSubmit() {
            var check = confirm("Are you sure you wish to continue?");
            if (check)
                return true ;
            else
                return false ;
        }
    </script>  