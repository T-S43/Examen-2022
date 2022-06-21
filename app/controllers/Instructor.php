<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Instructor extends Controller 
{
    // Properties, fields
    private $instructorsModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->instructorsModel = $this->model('Instructors');
    }

    public function index()
    {
        /**
         * Haal via de method getInstructor() uit de model Instructor de records op
         * uit de database
         */
        $instructor = $this->instructorsModel->getInstructor();

        /**
         * Maak de inhoud voor de tbody in de view
         */
        $rows = '';
        foreach ($instructor as $value){
            $rows .= "<tr>
                        <td>" . $value->name . "</td>
                        <td>" . $value->tel . "</td>
                        <td>" . $value->id . "</td>
                        <td>" . $value->sex . "</td>
                                  
                        </tr>";
        }


        $data = [
            //deze title laat je het zien via data in je index te gebruiken
        'title' => '<h3>Instructoroverzicht</h3>',
        'instructor' => $rows
        ];
        $this->view('instructor/index', $data);// deze code word boven op gezien en het stuurt je ook naa die folder
    }
}