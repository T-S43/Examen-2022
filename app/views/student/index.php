<?php 
  
  echo $data["title"]; 
?>
<!--met dese code can je je read page kijken, namen ect van student-->
<a href="<?=URLROOT;?>student/create">Nieuw record</a>
<div class="row">
    <div class="col-12">
        <table class=" table">
            <thead>
                <th scope="col">Id</th>
                <th scope="col">Naam</th>
            </thead>

            <tbody>
                <?=$data['student']?>
            </tbody>
        </table>
        <a href="<?=URLROOT;?>/homepages/index">terug</a>
    </div>
</div>