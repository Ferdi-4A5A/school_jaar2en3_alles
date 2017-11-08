<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'class.fileHandler.php';

class Webpagina
{

// getCompletePage met header+body+footer (uit textbestand) (variabele waarin je alles neerzet en vervolgens returnd en op een pagina eruit gooit)
// getDatabaseContent met content uit een DB

// met readFile kan je maar 1 bestand uitlezen dus kan alleen zo

//    var $fileName;
//    var $fileExtension;

    function __construct() {
//        $this->fileName = $fileName;
//        $this->fileExtension = $fileExtension;
    }

    function getCompletePage($headerName, $headerExtension, $bodyName, $bodyExtension, $footerName, $footerExtension) {
        $header = new fileHandler($headerName, $headerExtension);
        $body = new fileHandler($bodyName, $bodyExtension);
        $footer = new fileHandler($footerName, $footerExtension);

        $res = $header->readFile() . $body->readFile() . $footer->readFile();

        return htmlentities($res, ENT_QUOTES | ENT_IGNORE, "UTF-8");
    }

//    function getFileContent($fileName, $fileExtension) {
//        $file = new fileHandler($fileName, $fileExtension);
//        var_dump($file);
//        return $file->readFile();
//    }

    function __destruct(){

    }

}

$handler = new Webpagina('testfile', '.txt');

echo $handler->getCompletePage("header", ".txt", "body", ".txt", "footer", ".txt");