<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class studenten extends Controller {
    public function __construct() {
        //using the model of baliemedewerkers
        $this->studentModel = $this->model('student');
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
    try {
    foreach($lesData as $value) {
        $records .= "<tr>";
        $records .= "<td>" . $value->naam . "</td><td> " . $value->onderdeel . "</td><td> " . $value->datum . "</td>";
        $records .= "</td><td>";
        $records .= "<a onClick='return confirmSubmit()' href=" . URLROOT . "/studenten/createcomment/$value->id><i class='bi bi-envelope-plus'></i></a>";
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
    $data = ['lessenRows' => $records, "datumVandaag" => $date];
        
        $this->view('studenten/index', $data);
    }
    
    
    public function createcomment($id = null) {
        $userRow = $this->studentModel->getSingleUser($id);
    $data = [
        'opmerking' => '',
        'opmerkingError' => '',
        $id => 'les',
        'userRow' => $userRow
    ];

    //checken de form
    try{
        // If post is requested by the user pressing the button
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Filtired input post
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'opmerking' => $_POST['opmerking'],
                'les' => $_POST['id'],
                'opmerkingError' => ''
            ];
            // if opmerking is empty return false and throw user away after the alert
            if (empty($data['opmerking'])) {
                echo '<script type="text/javascript">
                alert("Opmerking leeg");
                 </script>';
                 $data['opmerkingError'] = 'Voer het veld in';
                 header("Refresh: 0; http://www.eindexamen2022mboutrecht.nl/studenten/index");
            }
            // var_dump($data);exit();
            // looking if the error is empty to write the info to the database
            if (empty($data['opmerkingError'])) {
                if ($this->studentModel->createComment($data)) {
                    // //Redirect to the baliemedewerker main page
                    // Echo doesn't show the user fast enough the error message and also on the wrong page
                        // echo'<div class="alert alert-primary mt-5 w-50 mx-auto text-center" role="alert">Uw commentaar is doorverstuurdt</div>';

                    // Code succesfull send
                        echo '<script type="text/javascript">
                        alert("Uw commentaar is doorverstuurdt");
                         </script>';
                    header("Refresh: 0; http://www.eindexamen2022mboutrecht.nl/studenten/index");
           
                } else {
                    // echo'<div class="alert alert-primary mt-5 w-50 mx-auto text-center" role="alert">Er is iets fout gegaan, neem contact op met uw ICT`er</div>';
                    // die('Something went wrong.');
                    // header("Refresh: 0; http://www.eindexamen2022mboutrecht.nl/studenten/createcomment/$id");
                    // die('<div class="alert alert-primary mt-5 w-50 mx-auto text-center" role="alert">Er is iets fout gegaan, neem contact op met uw ICT`er</div>');

                    header("Refresh: 0; http://www.eindexamen2022mboutrecht.nl/studenten/index");
                }
            }
        }


    }catch (Exception $e){
        echo "Post went wrong neem contact op met uw ICT`er";
    }
    // put the controller in the view
    $this->view('studenten/createcomment', $data);
}


}