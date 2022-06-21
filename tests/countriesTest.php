<?php


/**
 * Dit is de testclass voor de countries controller class
 */


namespace TDD\Test;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\controllers\Countries;


 class countriesTest extends TestCase
 {
    public function testSayMyName()
    {
        $countries = new Countries();
        $output = $countries->sayMyName();
        $expected = "Arjan";
        $message = "Er moet uitkomen Arjan";

        $this->assertEquals($expected,
                            $output,
                            $message);

    }
 }