<?php 
  
  echo $data["title"]; 
?>
<!--met dese code can je je read page kijken, namen ect van istructer-->
<a href="<?=URLROOT;?>afmelden/create">Nieuw record</a>
<div class="row">
    <div class="col-12">
        <table class=" table">
            <thead>
                <th scope="col">id</th>
                <th scope="col">instructer</th>
                <th scope="col">Student</th>
                <th scope="col">ophaaladres</th>
                <th scope="col">date</th>
                <th scope="col">time</th>
                <th scope="col">doelvanles</th>
                <th> </th>

            </thead>

            <tbody>
                <?=$data['instructor']?>
            </tbody>
        </table>
        <a href="<?=URLROOT;?>/homepages/index">terug</a>
    </div>
</div>