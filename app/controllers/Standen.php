<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Standen extends Controller
{

    private $standModel;

    public function __construct()
    {
        // model aangeven
        $this->standModel = $this->model('stand');
    }

    public function index()
    {
        // haal een lijst van alle voertuigen naar boven vanuit de database
        $standen = $this->standModel->getStandenmeldingen();

        // het verzorgen van de inhoud van de lijst met autos
        $rows = '';
        foreach ($standen as $value){
            $rows .= "<tr>
                        <td>" . $value->kenteken . "</td>
                        <td>" . $value->type . "</td>
                        </tr>";
        }

        // zodra de variabele is gezet wordt er een melding getoond
        if(isset($_GET["ingevoerd"])){
          $melding = '<div class="alert alert-success" role="alert">
                        Succesvol ingevoerd!
                      </div><meta http-equiv="refresh" content="2; URL=' . URLROOT . '/standen/index">';
        }else{
          $melding = "";
        }

        // standaard data verzenden voor de index pagina
        $data = [
        'title' => '<h3>Alle voertuigen</h3>',
        'enddata' => $rows,
        'melding' => $melding,
        ];
        $this->view('standen/index', $data);
    }

    public function create() {
        // de standaard waarden voor de create pagina

         // haal alle autos naar boven voor het verzorgen van de beschikbare opties
         $opties = $this->standModel->getAutoOpties();

         // het verzorgen van de opties in de create view
         $opties_rows = '';
         foreach ($opties as $value2){
           $opties_rows .= '<option value="' . $value2->kenteken . '">' . $value2->kenteken . '</option>';
         }

        $data = [
        'title' => '<h3>Nieuwe kilometerstand invoeren</h3>',
        'kmstand' => '',
        'kmstandError' => '',
        // opties variabele verzetten
        'options' => $opties_rows
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // haal alle autos naar boven voor het verzorgen van de beschikbare opties
            $opties = $this->standModel->getAutoOpties();

            // het verzorgen van de opties in de create view
            $opties_rows = '';
            foreach ($opties as $value2){
              $opties_rows .= '<option value="' . $value2->kenteken . '">' . $value2->kenteken . '</option>';
            }

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
            'title' => '<h3>Nieuwe kilometerstand invoeren</h3>',
            'kmstand' => trim($_POST['kmstand']),
            'kmstandError' => '',
            'options' => $opties_rows
            ];

            $data = $this->validateCreateForm($data);

            // na het verzenden controleren of alle variabelen zijn gezet
            if (empty($data['kmstandError'])) {
                if ($this->standModel->createStand($_POST)) {
                    // terug sturen naar start
                    header("Location:" . URLROOT . "/standen/index?ingevoerd");
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                            Er heeft een interne servererror plaatsgevonden<br>probeer het later nog eens...
                        </div>";
                    // In drie seconden terug sturen naar start
                    header("Refresh:3; url=" . URLROOT . "/standen/index");
                }
            }

        }

        $this->view("standen/create", $data);
    }

    // functie voor het valideren van velden met fout berichten voor elke situatie
    private function validateCreateForm($data) {

        if (empty($data['kmstand'])) {
        $data['kmstandError'] = 'Km-stand is leeg';
        }
        return $data;
    }

}
