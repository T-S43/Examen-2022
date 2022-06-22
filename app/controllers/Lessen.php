<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Lessen extends Controller
{

    private $lesModel;

    public function __construct()
    {
        // model aangeven
        $this->lesModel = $this->model('les');
    }

    public function index()
    {
        // haal een lijst van alle lessen en leerlingnamen naar boven vanuit de database
        $lessen = $this->lesModel->getLessenData();

        // het verzorgen van de inhoud van de lijst met alle lessen en datums
        $rows = '';
        $count = 0;
        foreach ($lessen as $value){
          $count++;
            $rows .= "<tr>
                        <td>" . $count . "</td>
                        <td>" . $value->datum . "</td>
                        <td>" . $value->naam . "</td>
                        </tr>";
        }

        // haal een lijst van de pakketten van de leerling naar boven vanuit de database
        $pakketten = $this->lesModel->getPakketData();

        foreach ($pakketten as $pakketvalue){
          // pd_ staat voor de prefix van 1 record data die binnenkomt vanuit de database om onderscheid te behouden
          $pd_aantallessen = $pakketvalue->aantallessen;
          $pd_prijs = $pakketvalue->prijs;
          $pd_cbrexamen = $pakketvalue->cbrexamen;
          $pd_betaaltermijnen = $pakketvalue->betaaltermijnen;
          $pd_naam = $pakketvalue->naam;
        }

        $lessencount = $pd_aantallessen - $count;

        if($lessencount <= 1){
          $aantallessen = $lessencount . ' Les van een uur.';
        }elseif($lessencount > 1){
          $aantallessen = $lessencount . ' Lessen van een uur.';
        }else{
          $aantallessen = $lessencount;
        }

        // checken of cbrexamen in het pakket zit
        if($pd_cbrexamen == 1){
          $cbrexamen = "Bij inbegrepen";
        }else{
          $cbrexamen = "Niet bij inbegrepen";
        }


        // standaard data verzenden voor de index pagina
        $data = [
        'title' => '<h3>Lessen en informatie</h3>',
        'enddata' => $rows,
        'cbrexamen' => $cbrexamen,
        'aantallessen' => $aantallessen,
        'betaaltermijnen' => $pd_betaaltermijnen,
        'prijs' => $pd_prijs,
        'pakketnaam' => $pd_naam,
        ];
        $this->view('lessen/index', $data);
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

        $this->view("lessen/create", $data);
    }

    // functie voor het valideren van velden met fout berichten voor elke situatie
    private function validateCreateForm($data) {

        if (empty($data['kmstand'])) {
        $data['kmstandError'] = 'Km-stand is leeg';
        }
        return $data;
    }

}
