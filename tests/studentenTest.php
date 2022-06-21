<?php


/**
 * Dit is de testclass voor de countries controller class
 */


namespace TDD\Test;

require dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\controllers\studenten;


 class studentenTest extends TestCase
 {
    public function addComment()
    {
        $student = new studenten();
        $output = $student->createComment();
        $expected = "Nice";
        $message = "Er moet uitkomen Nice";

        $this->assertEquals($expected,
                            $output,
                            $message);

    }
 }