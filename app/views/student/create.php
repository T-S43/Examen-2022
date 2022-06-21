<?php
  echo $data['title']; 
  // var_dump($data);
?>
<!--Met deze code krijg je een feld te zijn so dat je een melding ka achter laten-->
<form action="<?= URLROOT; ?>student/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <label class="form-label" for="student">set het naam van het student die u wil een melding
                        sturen?</label>
                    <input class="form-control" type="text" name="student" id="name" value="<?= $data['student']; ?>">
                    <div class="errorForm"><?= $data['studentError']; ?></div>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="form-label" for="meld">Wat is u melding?</label>
                    <input class="form-control" type="text" name="meld" id="meld" value="<?= $data['meld']; ?>">
                    <div class="errorForm"><?= $data['meldError']; ?></div>
                </td>
            </tr>
            <!-- de erro meldingen zijn wanneer je iets leeg laat of alles je iets die je niet moet vullen vuld-->
            <td>
                <input type="submit" value="Verzenden">
            </td>
            </tr>
        </tbody>
    </table>

</form>