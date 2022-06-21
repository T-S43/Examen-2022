<?php 
  
  echo $data["title"]; 
?>
<!--met dese code can je je read page kijken, namen ect van istructer-->
<div class="row">
    <div class="col-12">
        <table class=" table">
            <thead>
                <th scope="col">Naam</th>
                <th scope="col">tel</th>
                <th scope="col">id</th>
                <th scope="col">geslacht</th>
                <th> </th>

            </thead>

            <tbody>
                <?=$data['instructor']?>
            </tbody>
        </table>
        <a href="<?=URLROOT;?>/homepages/index">terug</a>
    </div>
</div>