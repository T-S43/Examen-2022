<?php
   require APPROOT . '/views/includes/header.php';
   echo $data['title']; 
?>

<form action="<?= URLROOT; ?>/leerlingen/create" method="post">
   <table>
      <tbody>
         <tr>
            <td>
               <label class= "form-label" for="straat">Straat</label>
               <input class="form-control" type="text" name="straat" id="straat">
               <div class="errorForm"><?= $data['straatError']; ?></div>
            </td>
         </tr>
         <tr>
            <td>
               <label class= "form-label" for="woonplaats">Woonplaats</label>
               <input class="form-control" type="text" name="woonplaats" id="woonplaats">
               <div class="errorForm"><?= $data['woonplaatsError']; ?></div>
            </td>
         </tr>
         <tr>
            <td>
               <input type="hidden"name="les" id="les" value="<?php if (!empty($data['row'])) { echo $data['row']->id;} ?>">
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