<?php
namespace TDD\controllers;

use TDD\libraries\Controller;

class HomePages extends Controller {

  public function index() {
    $data = [
      'title' => "Homepage"
    ];
    $this->view('homepages/index', $data);
  }
}