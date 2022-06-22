<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Leerlingen extends Controller 
{
    // Properties, fields
    private $leerlingModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->leerlingModel = $this->model('Leerling');
    }

    public function index()
    {
        /**
         * Haal via de method getleerlingen() uit de model Rijles de records op
         * uit de database
         */
        // retrievet de records uit de database via de leerlingModel
        $leerlingen = $this->leerlingModel->getLessen();
        $ophaallocaties = $this->leerlingModel->getOphaalLocaties();
        //var_dump($ophaallocaties);exit();

        // maakt een leeg array aan voor de data die we later in de view willen gebruiken
        $ophaalRows = '';
        //foreach loop om alle ophaallocaties waarden te krijgen en in te vullen in de ophaalRows array
            foreach ($ophaallocaties as $o){
                $ophaalRows .= "<tr>
                            <td>" . $o->datum . "</td>
                            <td>" . $o->woonplaats . "</td>
                            <td>" . $o->straat . "</td>
                            <td>" . $o->naam . "</td>;
                            </tr>";
            }
            // maakt een leeg array aan voor de data die we later in de view willen gebruiken
        $rows = '';
        //foreach loop om alle ophaallocaties waarden te krijgen en in te vullen in de ophaalRows array
            foreach ($leerlingen as $l){
                $rows .= "<tr>
                            <td>" . $l->datum . "</td>
                            <td>" . $l->woonplaats . "</td>
                            <td>" . $l->straat . "</td>
                            <td>" . $l->naam . "</td>;
                            </tr>";
            }     

        // stopt de rows in een $data array en stuurt de $data variabel terug naar de view
        $data = [
        'title' => '<h3>Leerlingen overview</h3>',
        'ophaallocaties' => $ophaalRows,
        'leerlingen' => $rows
        
        ];
        // stuurt de data naar de view
        $this->view('leerlingen/index', $data);
    }

    public function wijzig()
    {
        /**
         * Haal via de method getleerlingen() uit de model Rijles de records op
         * uit de database
         */
        // retrievet de records uit de database via de leerlingModel
        $wijzigingen = $this->leerlingModel->getWijzigingen();

        $rows = '';
        //vervolgens worden alle leerlingen waarden in het array gezet als $i
        foreach ($wijzigingen as $w){
            $rows .= "<tr>
                        <td>" . $w->datum . "</td>
                        <td><a href='" . URLROOT . "/leerlingen/create/$w->id'><i class='bi bi-pencil-square'></i></a></td>
                        </tr>";
        }

        // stopt de rows in een $data array en stuurt de $data variabel terug naar de view
        $data = [
        'title' => '<h3>Leerlingen overview</h3>',
        'wijzigingen' => $rows,
        ];
        $this->view('leerlingen/wijzig', $data);
    }

    public function create($id = null) {
        /**
         * Default waarden voor de view create.php
         */
        // stopt in een $row variabel de waarden van de getSingleLes functie gebaseerd op id uit de database
        $row = $this->leerlingModel->getSingleLes($id);
        $data = [
        'title' => '<h3>Wijzig ophaaladres!</h3>',
        'straat' => '',
        'woonplaats' => '',
        'straatError' => '',
        'woonplaatsError' => '',
        'row' => $row   
        ];

        // Deze code wordt uitgevoerd als er op de submit button wordt gedrukt
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // filtert de ingevoerde data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            //stopt de geposte data in een $data array
            $data = [
            'title' => '<h3>Wijzig ophaaladres!</h3>',
            'straat' => trim($_POST['straat']),
            'woonplaats' => trim($_POST['woonplaats']),
            'straatError' => '',
            'woonplaatsError' => ''
            ];

            $data = $this->validateCreateForm($data);
            // submit de record alleen maar als er geen validatie fouten in zitten
            //var_dump($data);exit();
            if (empty($data['straatError']) && empty($data['woonplaatsError'])) {
                if ($this->leerlingModel->createLeerling($_POST)) {
                    //echo'd een alert message en refresht de page vervolgens door naar de index
                    echo "<div class='alert alert-success' role='alert'>
                            Succesvol een afspraak ingeplant..
                        </div>";
                       // var_dump($data);
                    header("Refresh:2; url=" . URLROOT . "/leerlingen/create");
                } else {
                    //echo'd een alert message en refresht de page vervolgens door naar de index
                    echo "<div class='alert alert-danger' role='alert'>
                            Afspraak niet ingeplant, vul alle velden goed in.
                        </div>";
                    var_dump($data);
                    header("Refresh:2; url=" . URLROOT . "/leerlingen/index");
                }
            }
        }
        $this->view("leerlingen/create", $data);
    }

    //validatie form om te checken of de ingevoerde data correct is en/of leeg
    private function validateCreateForm($data) {
        //checkt of de straat leeg is en geeft als dat waar is een melding met "Straat is verplicht"
        if (empty($data['straat'])) {
            $data['straatError'] = 'Straat is verplicht';
        }
        //checkt of de woonplaats leeg is en geeft als dat waar is een melding met "Woonplaats is verplicht"
        if (empty($data['woonplaats'])) {
            $data['woonplaatsError'] = 'Woonplaats is verplicht';
        }
        //returnt de resultaten
        return $data;
        }
}