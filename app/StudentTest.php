<?php


/**
 * Dit is de testclass voor de student controller class
 */


namespace TDD\Test;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\controllers\student;


 class studentTest extends TestCase
 {
    public function testSayMyName()
    {
        $student = new student();
        $output = $student->sayMyName();
        $expected = "Erica";
        $message = "Er moet succesful uit komen";

        $this->assertEquals($expected,
                            $output,
                            $message);

    }
 }