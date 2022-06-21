<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class HomePages extends Controller {

  public function index() {
    $data = [
      'title' => "Startpagina"
    ];
    $this->view('homepages/index', $data);
  }
}
