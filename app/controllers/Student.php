<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Student extends Controller 
{
    // Properties, fields
    private $studentsModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->studentsModel = $this->model('Students');
    }

    public function index()
    {
        /**
         * Haal via de method getStudent() uit de model Student de records op
         * uit de database
         */
        $student = $this->studentsModel->getStudent();

        /**
         * Maak de inhoud voor de tbody in de view
         */
        $rows = '';
        foreach ($student as $value){
            $rows .= "<tr>
                        <td>" . $value->id . "</td>
                        <td>" . $value->name . "</td> 
                        </tr>";
        }


        $data = [
        'title' => '<h3>Leerling overzicht</h3>',
        'student' => $rows
        ];
        $this->view('student/index', $data);// deze code word boven op gezien en het stuurt je ook naa die folder
    }


    public function create() {
        /**
         * Default waarden voor de view create.php
         */

        $data = [
        'title' => '<h3>voeg u melding in</h3>',
        'id' => '',
        'student' => '',
        'meld' => '',
        
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
            'title' => '<h3>voeg het naam van het student</h3>',
            'student' => trim($_POST['student']),
            'meld' => trim($_POST['meld']),
            'studentError' => '',
            'meldError' => ''
            ];
// alles het goed gaat met het verzending van je code 
            $data = $this->validateCreateForm($data);
        
            if (empty($data['studentError']) && empty($data['meldError'])) {
                if ($this->studentsModel->createStudent($_POST)) {
                    header("Location:" . URLROOT . "student/index");
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                            Er heeft een interne servererror plaatsgevonden<br>probeer het later nog eens...
                        </div>";
                    header("Refresh:3; url=" . URLROOT . "student/index");
                }
            }
        } 

        $this->view("student/create", $data);    
    }
    
   //Error code for wanneer je iets leeg laat of alles er een teken die niet i moet staan

    private function validateCreateForm($data) {
        if (empty($data['student'])) {
        $data['studentError'] = 'U heeft nog geen student ingevuld';
        } elseif (filter_var($data['student'], FILTER_VALIDATE_EMAIL)) {
        $data['studentError'] = 'U heeft blijkbaar een emailadres ingevuld';
        } elseif(!preg_match('/^[a-zA-Z]*$/', $data['student'])) {
        $data['studentError'] = 'U heeft andere tekens gebruikt dan die in het alfabet';
        }

        if (empty($data['meld'])) {
        $data['meldError'] = 'U heeft nog geen melding ingevuld';
        }
        
        return $data;
    }
}