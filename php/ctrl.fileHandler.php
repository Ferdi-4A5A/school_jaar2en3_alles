<?php
    include 'class.fileHandler.php';

    // readFile in 2 textarea's gaat niet omdat isset false is zodra je op een andere button klikt (weg echo)

    $dir    = '../php';
    $files = scandir($dir);
    $filesOnly = array_slice($files, 2);

    if(isset($_POST['todo'])) {
        switch ($_REQUEST['todo']) {
            case "create":
                $afile = new fileHandler($_REQUEST['fileName'], ".txt");
                var_dump($afile->createFile());
                break;
            case "createMultiple":
                $afile = new fileHandler($_REQUEST['fileNameMultiple'] , ".txt");
                $multipleFileNames = (explode(" ",$_REQUEST['fileNameMultiple']));
                $afile->createMultipleFiles($multipleFileNames);
                break;
            case "delete":
                $afile = new fileHandler($_REQUEST['fileName'], ".txt");
                var_dump($afile->deleteFile());
                break;
            default:
                return false;
        }
    }

    // Onderstaande if statements beter niet in switch zetten ivm functies oproepen met isset van buttons?

    if (isset($_POST['readFileContent'])) {
        $selectFileName = pathinfo($_POST['selectReadFileContent']);
        $path_extension = '.' . $selectFileName['extension'];
        $handler = new fileHandler($selectFileName['filename'], $path_extension);
    }

    if (isset($_POST['readFile'])) {
        $handler = new fileHandler($_POST['fileName'], '.txt');
    }

    if (isset($_POST['updateFile'])) {
        $handler = new fileHandler($_REQUEST['fileName'], ".txt");
    }

    if (isset($_POST['saveFile'])) {
        $str = $_POST['textField1'];
        $out = fopen($_POST['fileName'] . ".txt", "w");
        fwrite($out, $str);
        fclose($out);
    }


