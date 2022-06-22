<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Lessen extends Controller 
{
    // Properties, fields
    private $lesModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->lesModel = $this->model('Les');
    }

    public function index()
    {
        /**
         * Haal via de method getLessen() uit de model Les de records op
         * uit de database
         */
        $lessen = $this->lesModel->getLessen();

        /**
         * Maak de inhoud voor de tbody in de view
         */
        $rows = '';
        foreach ($lessen as $value){
            $rows .= "<tr style='border:1px solid black;'>
                        <td>" . $value->id . "</td>
                        <td>" . $value->datum. "</td>
                        <td>" . $value->leerling . "</td>
                        <td>" . $value->instructeur. "</td>
                        <td><a href='" . URLROOT . "lessen/create/$value->id'><i class='bi bi-x-square'></i></a></td>
                        </tr>";
        }


        $data = [
        'title' => '<h3>Lessen Overzicht</h3>',
        'lessen' => $rows
        ];
        $this->view('lessen/index', $data);
    }


    


    public function create() {
        /**
         * Default waarden voor de view create.php
         */
        $data = [
            'title' => '<h3>Voeg Reden waaroom je gaat annulleren</h3>',
            'reden' => '',
            'redenError' => ''
            
            ];
    
        header("Refresh:100; url=" . URLROOT . "lessen/index");
        
        //Deze code krijg je pas als wanneer je het feld leeg laat en je een error melding krijgt

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
            'title' => '<h3>Voeg reden waaroom je gaat afmelden</h3>',
            'reden' => trim($_POST['reden']),
            'redenError' => ''
            ];

            $data = $this->validateCreateForm($data);// zo dat je de validatie code gebruiken en error messeges kan krijgen alles je de feld slecht in vull
        
            //Als wat je heb in gevuld niet lukt of wel lukt krijg je die messeges door deze code
            if (empty($data['redenError'])) {
                if ($this->lesModel->createLes($_POST)) {
                    echo "<div class='alert alert-danger' role='alert'>
                            het is gelukt
                        </div>";
                    header("Location:" . URLROOT . "lessen/index");
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                            Er heeft een interne servererror plaatsgevonden<br>probeer het later nog eens...
                        </div>";
                    header("Refresh:3; url=" . URLROOT . "lessen/index");
                }
            }
        } 

        $this->view("lessen/create", $data);    
    }

    private function validateCreateForm($data) {
        if (empty($data['reden'])) {
        $data['redenError'] = 'U heeft nog geen reden in geuldvuld';//error messege als je een reden niet in vuld
        } elseif (filter_var($data['reden'], FILTER_VALIDATE_EMAIL)) {
        $data['redenError'] = 'U heeft blijkbaar een emailadres ingevuld';//error messege als je iets in vuld die niet moet in vullen
        } elseif(!preg_match('/^[a-zA-Z]*$/', $data['reden'])) {
        $data['redenError'] = 'U heeft andere tekens gebruikt dan die in het alfabet';////error messege als je iets in vuld die niet moet in vullen
        }
        
        return $data;
    }
}