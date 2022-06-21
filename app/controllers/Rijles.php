<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class Rijles extends Controller 
{
    // Properties, fields
    private $rijlesenModel;

    // Dit is de constructor
    public function __construct()
    {
        $this->rijlesenModel = $this->model('Rijlesen');
    }

    public function index()
    {
        /**
         * Haal via de method getInstructor() uit de model Instructor de records op
         * uit de database
         */
        $rijles = $this->rijlesenModel->getRijlesen();

        /**
         * Maak de inhoud voor de tbody in de view
         */
        $rows = '';
        foreach ($rijles as $value){
            $rows .= "<tr>
                        <td>" . $value->id . "</td>
                        <td>" . $value->instructer . "</td>
                        <td>" . $value->Student . "</td>
                        <td>" . $value->ophaaladres . "</td>
                        <td>" . $value->date . "</td>
                        <td>" . $value->time . "</td>
                        <td>" . $value->doelvanles . "</td>
                        
                                  
                        </tr>";
        }


        $data = [
            //deze title laat je het zien via data in je index te gebruiken
        'title' => '<h3>Rijlesenoverzicht</h3>',
        'rijlesen' => $rows
        ];
        $this->view('rijlesen/index', $data);// deze code word boven op gezien en het stuurt je ook naa die folder
    }
}