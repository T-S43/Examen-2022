<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Instructeurs extends Controller 
{
    // Properties, fields
    private $instructeurModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->instructeurModel = $this->model('Instructeur');
    }

    public function index()
    {
        /**
         * Haal via de method getinstructeurs() uit de model Rijles de records op
         * uit de database
         */
        // retrievet de records uit de database via de instructeurModel
        $instructeurs = $this->instructeurModel->getInstructeurs();

        //maakt een empty array aan
        $rows = '';
        //vervolgens worden alle instructeurs waarden in het array gezet als $i
        foreach ($instructeurs as $i){
            $rows .= "<tr>
                        <td>" . $i->name . "</td>
                        <td>" . $i->adres . "</td>
                        <td>" . $i->woonplaats . "</td>
                        <td>" . $i->datum . "</td>
                        <td>" . $i->tijd . "</td>
                        <td>" . $i->ophaaladres . "</td>
                        </tr>";
        }
        // retrievet de records uit de database via de instructeurModel
        $mankementen = $this->instructeurModel->getMankementen();
        //maakt een empty array aan
        $mankementRows = '';
        //vervolgens worden alle mankementen waarden in het array gezet als $m
        foreach ($mankementen as $m){
            $mankementRows .= "<tr>
                        <td>" . $m->kenteken . "</td>
                        <td>" . $m->type . "</td>

                       
                        </tr>";
        }

        // stopt de rows in een $data array en stuurt de $data variabel terug naar de view
        $data = [
        'title' => '<h3>Instructeur overview</h3>',
        'instructeurs' => $rows,
        'title1' => '<h3>Auto mankementen</h3>',
        'mankementen' => $mankementRows
        ];
        $this->view('instructeurs/index', $data);
    }

    public function create() {
        /**
         * Default waarden voor de view create.php
         */
    
        $data = [
        'title' => '<h3>Plan een nieuwe rijles in!</h3>',
        'datum' => '',
        'tijd' => '',
        'ophaaladres' => '',
        'student' => '',
        'datumError' => '',
        'tijdError' => '',
        'ophaaladresError' => '',
        'studentError' => ''
        
     
        ];
        // Deze code wordt uitgevoerd als er op de submit button wordt gedrukt
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // filtert de ingevoerde data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            //stopt de geposte data in een $data array
            $data = [
            'title' => '<h3>Plan een nieuwe rijles in!</h3>',
            'datum' => trim($_POST['datum']),
            'tijd' => trim($_POST['tijd']),
            'ophaaladres' => trim($_POST['ophaaladres']),
            'student' => trim($_POST['student']),
            'datumError' => '',
            'tijdError' => '',
            'ophaaladresError' => '',
            'studentError' => ''
        
            ];

            $data = $this->validateCreateForm($data);
            // submit de record alleen maar als er geen validatie fouten in zitten
            if (empty($data['datumError']) && empty($data['tijdError']) && empty($data['ophaaladresError']) && empty($data['studentError'])) {
                if ($this->instructeurModel->createRijles($_POST)) {
                    //echo'd een alert message en refresht de page vervolgens door naar de index
                    echo "<div class='alert alert-success' role='alert'>
                            Succesvol een afspraak ingeplant..
                        </div>";
                    header("Refresh:3; url=" . URLROOT . "/instructeurs/index");
                } else {
                    //echo'd een alert message en refresht de page vervolgens door naar de index
                    echo "<div class='alert alert-danger' role='alert'>
                            Afspraak niet ingeplant, vul alle velden goed in.
                        </div>";
                    header("Refresh:3; url=" . URLROOT . "/instructeurs/index");
                }
            }
        } 

        $this->view("instructeurs/create", $data);// De view wordt aangeroepen en geeft een $data variabel mee

    }

    public function createMankement() {
        /**
         * Default waarden voor de view create.php
         */

        $data = [
        'title' => '<h3>Voeg een nieuw mankement toe!</h3>',
        'auto' => '',
        'datum' => '',
        'mankement' => '',
        'autoError' => '',
        'datumError' => '',
        'mankementError' => '',
        
        
     
        ];
        // Deze code wordt uitgevoerd als er op de submit button wordt gedrukt
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
             // filtert de ingevoerde data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //stopt de geposte data in een $data array
            $data = [
            'title' => '<h3>Voeg een nieuw mankement toe!</h3>',
            'auto' => trim($_POST['auto']),
            'datum' => trim($_POST['datum']),
            'mankement' => trim($_POST['mankement']),
            'autoError' => '',
            'datumError' => '',
            'mankementError' => ''
        
            ];

            $data = $this->validateCreateForm($data);
            // Deze code wordt uitgevoerd als er op de submit button wordt gedrukt
            if (empty($data['autoError']) && empty($data['datumError']) && empty($data['mankementError'])) {
                if ($this->instructeurModel->createMankement($_POST)) {
                    //echo'd een alert message en refresht de page vervolgens door naar de index
                    echo "<div class='alert alert-success' role='alert'>
                            Mankement toegevoegd.
                        </div>";
                    header("Refresh:3; url=" . URLROOT . "/instructeurs/index");
                } else {
                    //echo'd een alert message en refresht de page vervolgens door naar de index
                    echo "<div class='alert alert-danger' role='alert'>
                            Er heeft een interne servererror plaatsgevonden<br>probeer het later nog eens...
                        </div>";
                    header("Refresh:3; url=" . URLROOT . "/instructeurs/index");
                }
            }
        } 
        // De view wordt aangeroepen en geeft een $data variabel mee
        $this->view("instructeurs/createMankement", $data);
    }
    //validatie form om te checken of de ingevoerde data correct is en/of leeg
    private function validateCreateForm($data) {
        //checkt of de datum leeg is en als dat niet het geval is wordt de datum gecheckt
        if (empty($data['datum'])) {
            $data['datumError'] = "Vul een datum in";
        } elseif (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $data['datum'])) {
            $data['datumError'] = "Vul een geldige datum in";
        } 
        //checkt of de tijd leeg is en als dat niet het geval is wordt de tijd gecheckt
        if (empty($data['tijd'])) {
            $data['tijdError'] = "Vul een tijd in";
        } elseif (!preg_match("/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/", $data['tijd'])) {
            $data['tijdError'] = "Vul een geldige tijd in";
        }
        //checkt of de ophaaladres leeg is
        if (empty($data['ophaaladres'])) {
            $data['ophaaladresError'] = "Vul een ophaaladres in";
        }
        ///checkt of de student leeg is
        if (empty($data['student'])) {
            $data['studentError'] = "Vul een instructeur in";
        }
        //checkt of de auto leeg is
        if (empty($data['auto'])) {
            $data['autoError'] = "Vul een auto in";
        }
        //checkt of de mankement leeg is en of het groter dan 200 karakters is of niet
        if (empty($data['mankement'])) {
            $data['mankementError'] = "Mankement is leeg";
        } elseif (strlen($data['mankement']) > 200) {
            $data['mankementError'] = "Mankement te lang";
        }
        //returnt de resultaten
        return $data;
        }

        public function SayInstructeursName () {
            return "Gert-jannus";
        }
    }

    


