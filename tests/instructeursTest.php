<?php


/**
 * Dit is de testclass voor de countries controller class
 */


namespace TDD\Test;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\controllers\Instructeurs;


 class instructeursTest extends TestCase
 {
<<<<<<< Updated upstream
    public function testSayMyName()
    {
        $instructeurs = new Instructeurs();
        $output = $instructeurs->createMankement();
        $expected = "Arjan";
        $message = "Er moet uitkomen Arjan";
=======
    public function testSayInstructeursName()
    {
        $instructeurs = new Instructeurs();
        $output = $instructeurs->SayInstructeursName();
        $expected = "Gert-jannus";
        $message = "Er moet uitkomen Gert-jannus";
>>>>>>> Stashed changes

        $this->assertEquals($expected,
                            $output,
                            $message);

    }
 }