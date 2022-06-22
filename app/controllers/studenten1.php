<?php
// 
// Dit is voor user Story 3 Leerling kan zijn lessen onderwerp en opmerkingen kunnen plaatsen
// 


namespace TDD\controllers;
use TDD\libraries\Controller;

class studenten1 extends Controller {
    public function __construct() {
        //using the model of baliemedewerkers
        $this->studentModel = $this->model('student1');
    }

    public function index() {
        // Getting all cars from voertuig
        $lesData = $this->studentModel->getLessen();
        $date = date('F j, Y');
        // echo $date;

        $record = "";
        // records goes through all records that come through the database and prints them out if the requirement is correct.
    $records = "";
    // We are sending all records to the website
                    $i = 1;
    try {
    foreach($lesData as $value) {
        $records .= "<tr>";
        $records .= "<td>" . $i . "</td><td> " . $value->datum . "</td><td> " . $value->naam . "</td>";
        // $records .= "<td>" . $value->naam . "</td><td> " . $value->onderdeel . "</td><td> " . $value->datum . "</td>";

        $records .= "</td><td>";
        $records .= "<a onClick='return confirmSubmit()' href=" . URLROOT . "/studenten1/opmerkingen/$value->id><i class='bi bi-file-earmark-text'></i></a>";
        $records .= "</td><td>";
        $records .= "<a onClick='return confirmSubmit()' href=" . URLROOT . "/studenten1/onderwerpen/$value->id><i class='bi bi-file-earmark-richtext'></i></a>";
        $records .= "</tr>";
        $i++;
    }
} catch (Exception $e) {
     // We catched an exception and are sending the user back to be sure that they can't break anything
    die('<script type="text/javascript">
    alert("Rows worden niet ingeladen probeer het opnieuw of neem contact op met je ICT`er");
     </script>');
     header("Refresh: 0; http://www.eindexamen2022mboutrecht.nl");
}

// Sending data to the website
    $data = ['lessenRows' => $records, "datumVandaag" => $date];
        
        $this->view('studenten1/index', $data);
    }



    public function opmerkingen($id = null) {
        $userRow = $this->studentModel->getSingleUser($id);
        
        // $idData = ['les' => $_POST[$userRow]];
        
        $opmerkingData = $this->studentModel->getOpmerkingen($id);
        // var_dump($opmerkingData);exit();
        $record = "";
        // records goes through all records that come through the database and prints them out if the requirement is correct.
        $records = "";
         // We are sending all records to the website
            try {
            foreach($opmerkingData as $value) {
                $records .= "<tr>";
                $records .= "<td>" . $value->opmerking . "</td>";
                // $records .= "<td>" . $value->naam . "</td><td> " . $value->onderdeel . "</td><td> " . $value->datum . "</td>";
            }
        } catch (Exception $e) {
            // We catched an exception and are sending the user back to be sure that they can't break anything
            die('<script type="text/javascript">
            alert("Rows worden niet ingeladen probeer het opnieuw of neem contact op met je ICT`er");
            </script>');
            header("Refresh: 0; http://www.eindexamen2022mboutrecht.nl");
        }

// Sending data to the website
    $data = ['opmerkingRows' => $records];
        
        $this->view('studenten1/opmerkingen', $data);
    }
    


    public function onderwerpen($id = null) {
        $userRow = $this->studentModel->getSingleUser($id);
        
        // $idData = ['les' => $_POST[$userRow]];
        
        $onderwerpenData = $this->studentModel->getOnderwerpen($id);
        $record = "";
        // records goes through all records that come through the database and prints them out if the requirement is correct.
        $records = "";
         // We are sending all records to the website
            try {
            foreach($onderwerpenData as $value) {
                $records .= "<tr>";
                $records .= "<td>" . $value->onderwerp . "</td>";
                // $records .= "<td>" . $value->naam . "</td><td> " . $value->onderdeel . "</td><td> " . $value->datum . "</td>";
            }
        } catch (Exception $e) {
            // We catched an exception and are sending the user back to be sure that they can't break anything
            die('<script type="text/javascript">
            alert("Rows worden niet ingeladen probeer het opnieuw of neem contact op met je ICT`er");
            </script>');
            header("Refresh: 0; http://www.eindexamen2022mboutrecht.nl");
        }

// Sending data to the website
    $data = ['onderwerpenRows' => $records];
        
        $this->view('studenten1/onderwerpen', $data);
    }
}