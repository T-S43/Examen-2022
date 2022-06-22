<!-- Laat je de header zien  -->
<?php
  require APPROOT . '/views/includes/header.php';
  echo $data['title']; 
  // var_dump($data);
?>
<!-- deze code laat je het form op je website zien -->
<form action="<?= URLROOT; ?>lessen/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <label class="form-label" for="name">Voeg reden waaroom je gaat annuleren</label>
                    <input class="form-control" type="text" name="reden" id="reden" value="<?= $data['reden']; ?>">
                    <div class="errorForm"><?= $data['redenError']; ?></div>
                    <!-- de redenerror laat je een error zien alles je een feld niet in vuld of alles je iets vuld die je niet moet in vullen  -->
                </td>
            </tr>

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