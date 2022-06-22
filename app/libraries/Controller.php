<?php
// Dit wordt de parentclass van alle andere controller
// We loaden de model en de view


namespace TDD\libraries;


class Controller {
  // Geen properties
  

  public function model($model) {
    require_once('C:/Users/sheri/Documents/School/Examen/app/models/' . $model . '.php');
    return new $model();
  }

  public function view($view, $data = []) {
    if (file_exists('../app/views/' . $view . '.php')) {
      require_once('../app/views/' . $view . '.php');
    } else {
      die('View bestaat niet');
    }
  }
}