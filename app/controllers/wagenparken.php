<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class wagenparken extends Controller {
    public function __construct() {
        //using the model of baliemedewerkers
        $this->wagenparkModel = $this->model('wagenpark');
    }

    public function index() {
        // Getting all cars from voertuig
        $wagenData = $this->wagenparkModel->getVoertuig();
        
        $record = "";
        // records goes through all records that come through the database and prints them out if the requirement is correct.
    $records = "";
    // We are sending all records to the website
    try {
    foreach($wagenData as $value) {
        $records .= "<tr>";
        $records .= "<td>" . $value->merk . "</td><td> " . $value->type . "</td><td>" . $value->kenteken . "</td><td> " . $value->naam . "</td><td> " . $value->kilometer. "</td>";
        $records .= "</td><td><a onClick='return confirmSubmit()' href=" . URLROOT . "/wagenparken/updatevoertuig/$value->id><i class='bi bi-pencil-square'></i></a>";
        $records .= "</tr>";
    }
} catch (Exception $e) {
     // We catched an exception and are sending the user back to be sure that they can't break anything
    die('<script type="text/javascript">
    alert("Rows worden niet ingeladen probeer het opnieuw of neem contact op met je ICT`er");
     </script>');
     header("Refresh: 0; http://www.eindexamen2022mboutrecht.nl");
}

// Sending data to the website
    $data = ['voertuigRows' => $records];
        
        $this->view('wagenparken/index', $data);
    }
    
    
    public function updatevoertuig($id= null) {
    // We are running this code if an error appears it will get catched by catch
    try {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // var_dump($_POST);exit();
            // Sanitizing imput from $_POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // Check if one of these fields are empty
            if (empty($_POST['kilometer'])) {
                echo '<script type="text/javascript">
                alert("De kilometer veld is leeg");
                 </script>';
                 header("Refresh: 0; http://www.eindexamen2022mboutrecht.nl/wagenparken/index");
                 
                }if (empty($_POST['instructeurId'])) {
                    echo '<script type="text/javascript">
                    alert("De instructeur veldt is leeg");
                    </script>';
                    header("Refresh: 0; http://www.eindexamen2022mboutrecht.nl/wagenparken/index");

                    }if(empty($_POST['id'])) {
                        echo '<script type="text/javascript">
                        alert("Fout kan geen id vinden, probeer het opnieuw.");
                        </script>';
                        header("Refresh: 0; http://www.eindexamen2022mboutrecht.nl/wagenparken/index");
                    
                // header("Refresh: 0; http://www.eindexamen2022mboutrecht.nl/wagenparken/updatevoertuig/$id");
            } else {
                //executing the method in models
                $this->wagenparkModel->update($_POST);
                //returning to the index page but first get an javascript alert message
                echo '<script type="text/javascript">
                alert("Succesvol geupdated");
                 </script>';
                // exit();
                header("Refresh: 0; http://www.eindexamen2022mboutrecht.nl/wagenparken/index");
            }
                }else{
                    $updateRow = $this->wagenparkModel->getSingleUser($id);
                    // $instructeursNaam = $this->wagenparkModel->getInstructeursInfo($id);
                    $data=[
                        'title' => 'Update user',
                        'updateRow' => $updateRow
                        ];
                    $this->view("wagenparken/updatevoertuig" , $data);
                }
    } catch (Exception $e) {
        // We catched an exception and are sending the user back to be sure that they can't break anything
        die('<script type="text/javascript">
        alert("Kan de id niet vinden probeer het opnieuw.");
         </script>');
         header("Refresh: 0; http://www.eindexamen2022mboutrecht.nl/wagenparken/index");

    }
}
}