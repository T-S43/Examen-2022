<?php


// testcase voor standen, het testen van hoe de variabelen in een array naar buiten komen


namespace TDD\Test;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\controllers\Standen;


 class standenTest extends TestCase
 {
    public function testIndex()
    {
        $standen = new standen();
        $output = $standen->index();
        $expected = "AU-67-10	Golf
                    TH-78-KL	Ferrari
                    90-KL-TR	Fiat 500
                    YY-OP-78	Mercedes";
                    // in de vorm van array
        $message = "Een array moet eruitkomen met acht keer losse data in twee tabellen";

        $this->assertEquals($expected,
                            $output,
                            $message);

    }
 }
