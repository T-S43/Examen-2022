<?php

function logger($fileName, $methodName, $lineNumber, $error) {
    /**
     * We gaan de tijd toevoegen waarop de error plaatsvond
     */
    date_default_timezone_set('Europe/Amsterdam');
    $time = "Datum/tijd: " . date('d-M-Y H:i:s', time()) . "\t";

    /**
     * De error uit de code
     */
    $error = "De error is: " . $error . "\t";

    /**
     * Het ip adres van degene die de error veroorzaakte
     */
    $ip  = "Remote IP Address: " . $_SERVER["REMOTE_ADDR"] . "\t";

    /**
     * Waar het de error plaatsgevonden
     */
    $placeOfError = "file: " . $fileName . " method: " . $methodName . " linenumber: " . $lineNumber . "\t";
    /**
     * we maken een logfile aan
     */
    $pathToLogfile = APPROOT . '/logs/nonfunctionallog.txt';
    
    /**
     * Check of er al een logfile bestaat, zo niet maak hem dan.
     */
    if (!file_exists($pathToLogfile)) {
        file_put_contents($pathToLogfile, "Non Functional Log\r");
    }

    /**
     * Vraag de content op van het logfile
     */
    $contents = file_get_contents($pathToLogfile);

    /**
     * Voeg de nieuwe error toe aan het logfile
     */
    $contents .= $time . $ip . $error . $placeOfError . "\r";

    /**
     * Schrijf de nieuwe content naar de logfile
     */
    file_put_contents($pathToLogfile, $contents);
}