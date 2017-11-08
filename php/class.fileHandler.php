<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class fileHandler {

    var $fileName;
    var $fileExtension;

    function __construct($fileName, $fileExtension) {
        $this->fileName = $fileName;
        $this->fileExtension = $fileExtension;
    }

    function createFile() {
        $fileOpen = fopen($this->fileName . $this->fileExtension, "w") or die("Unable to open file " . $this->fileName . $this->fileExtension . " !");
            fclose($fileOpen);
            return "The file " . $this->fileName . $this->fileExtension . " has been created successfully";
    }

    function readFile() {
        $fileOpen = fopen($this->fileName . $this->fileExtension, "r") or die("Unable to open file " . $this->fileName . $this->fileExtension . " !");
        if ($fileOpen < 1) {
            return "The file " . $this->fileName . $this->fileExtension . " doesn't have any content";
        } else {
            $fileContent = file_get_contents($this->fileName . $this->fileExtension);
            fclose($fileOpen);
            return htmlspecialchars($fileContent);
        }
    }
//    Ophalen van $fileContent(parameter) ??
    function updateFile() {
        $fileOpen = fopen($this->fileName . $this->fileExtension, "r+") or die("Unable to open file " . $this->fileName . $this->fileExtension . " !");
        if ($fileOpen < 1) {
            return "The file " . $this->fileName . $this->fileExtension . " doesn't have any content";
        } else {
            $fileContent = file_get_contents($this->fileName . $this->fileExtension);
            fclose($fileOpen);
            return htmlspecialchars($fileContent);
        }
    }

    function deleteFile() {
        $myFile = unlink($this->fileName . $this->fileExtension);
        if ($myFile) {
            return "The file " . $this->fileName . $this->fileExtension . " has been deleted successfully";
        } else {
            return "The file " . $this->fileName . $this->fileExtension . " doesn't exist";
        }
    }

    function createMultipleFiles($fileNames) {
        foreach ($fileNames as $value) {
            $this->fileName = $value;
            echo $this->createFile($value);
            echo "<br>";
        }
    }

    function fileSize() {
        $bytes = filesize($this->fileName . $this->fileExtension);

        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' kB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }
        return $bytes;
    }

//    function __destruct() {

//    }

}


