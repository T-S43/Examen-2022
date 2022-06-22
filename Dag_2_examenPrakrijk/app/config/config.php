<?php
// Je maak een conection met je database, let goed op dat je het goede naam van je database gebruik
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'examenparktijk');

define('APPROOT', dirname(dirname(__FILE__))) ;
//Deze code laat je naar je website gaan, alles je een andere link heb van een andere website dan woord je daar door gestuurt. Let op dat deze link het zelfde naam heeft alles je website naam
define('URLROOT', 'http://mvc-examen.nl/');

define('SITENAME', 'mvc-examen');
?>