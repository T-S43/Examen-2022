<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Ziekmelden extends Controller
{

    private $meldingenModel;

    public function __construct()
    {
        $this->meldingenModel = $this->model('meldingen');
    }

    public function index()
    {
        // alle records ophalen met de method getziekmeldingen
        $ziekmelden = $this->meldingenModel->getZiekmeldingen();

        // alle inhoud verkregen uit $ziekmelden verwerken in een variabele om
        // deze door te kunnen sturen naar de view
        $rows = '';
        foreach ($ziekmelden as $value){
            $rows .= "<tr>
                        <td>" . $value->voornaam . " " . $value->achternaam . "</td>
                        <td>" . $value->reason . "</td>
                        <td>" . $value->sincedate . "</td>
                        <td>" . $value->untildate . "</td>
                        <td><a href='" . URLROOT . "/ziekmelden/delete/$value->ziekmeldid'><i class='bi bi-x-square'></i></a></td>
                        </tr>";
        }


        // data opstellen om te versturen naar de view
        $data = [
        'title' => '<h3>Alle ziekmeldingen</h3>',
        'enddata' => $rows
        ];
        // data verzenden naar ziekmelden view
        $this->view('ziekmelden/index', $data);
    }

    // functie voor het verwijderen van ziekmeldingen
    public function delete($id) {
        if ($this->meldingenModel->deleteMeldingen($id)) {
            // errormessage verzetten naar juiste vormgeving
            $data = [
                'deleteStatus' =>  "<div class='alert alert-danger' role='alert'>
                                        Melding is verwijdert
                                    </div>"
            ];
        } else {
            // errormessage verzetten naar juiste vormgeving indien er een serverfout is
            $data =[
                'deleteStatus' =>  "<div class='alert alert-danger' role='alert'>
                                        Interne serverfout, de melding is niet verwijdert
                                    </div>"
            ];
        }
        // Resultaat versturen naar de delete view binnen ziekmelden
        $this->view("ziekmelden/delete", $data);
        header("Refresh:3; url=" . URLROOT . "/ziekmelden/index");
    }

    public function create() {
        // standaard waardes ophalen voor de create.php binnen ziekmelden

        $data = [
        'title' => '<h3>Nieuwe melding</h3>',
        'name' => '',
        'reason' => '',
        'sincedate' => '',
        'untildate' => '',
        'nameError' => '',
        'reasonError' => '',
        'sincedateError' => '',
        'untildateError' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // filteren van binnenkomende variabelen
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // te versturen data opstellen indien er iets fout is gegaan
            $data = [
            'title' => '<h3>Voeg een nieuw land in</h3>',
            'name' => trim($_POST['name']),
            'reason' => trim($_POST['reason']),
            'sincedate' => trim($_POST['sincedate']),
            'untildate' => trim($_POST['untildate']),
            'nameError' => '',
            'reasonError' => '',
            'sincedateError' => '',
            'untildateError' => ''
            ];

            // het aanroepen van de functie voor het valideren van de gegevens binnen het formulier
            $data = $this->validateCreateForm($data);

            // error handeling, kijken of er geen errors zijn, en dan de functie voor het maken van
            // een melding uitvoeren
            if (empty($data['nameError']) && empty($data['reasonError']) && empty($data['sincedateError']) && empty($data['untildateError'])) {
                if ($this->meldingenModel->createMeldingen($_POST)) {
                    // zodra de functie goed is uitgevoerd wordt je terug gestuurd
                    header("Location:" . URLROOT . "/ziekmelden/index");
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                            Er heeft een interne servererror plaatsgevonden<br>probeer het later nog eens...
                        </div>";
                    header("Refresh:3; url=" . URLROOT . "/ziekmelden/index");
                }
            }

        }

        // het resultaat versturen naar het create.php bestand binnen de ziekmelden view
        $this->view("ziekmelden/create", $data);
    }

    private function validateCreateForm($data) {

        if (empty($data['reason'])) {
        $data['reasonError'] = 'U heeft nog geen reden ingevuld';
        }

        if (empty($data['sincedate'])) {
        $data['sincedateError'] = 'U heeft nog geen datum ingevuld';
        }

        if (empty($data['untildate'])) {
        $data['untildateError'] = 'U heeft nog geen datum ingevuld';
        }
        return $data;
    }

}
