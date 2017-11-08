<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

class Table
{

    // webpagina class waar je content uit een file haalt en vervolgens alle table content naar de controller/class schrijft (fileHandler gebruiken is handig)

    function __construct() {
    }

    function createTable($tableRowHeader, $tableRowData) {
        $table = '<table border="1">';
            $table .= '<tr>';
                foreach ($tableRowHeader as $value) {
                    $table .= '<th>' . $value . '</th>';
                }
            $table .= '</tr>';

        $counter = 1;

        // zorgen dat laatste row ook verwijderd word (als laatste row dan geen <tr> open, of last loop oid)
        foreach ($tableRowData as $key => $value) {
//            var_dump($counter);
            if ($counter != count($tableRowHeader)) {
                $table .= '<td>' . $value . '</td>';
                $counter++;
            } elseif ($counter == count($tableRowHeader)) {
                $table .= '<td>' . $value . '</td>';
                $table .= '</tr><tr>';
                $counter = 1;
                var_dump(count($tableRowData));
//                end($tableRowData);
//                if ($key === key($tableRowData))
//                    break;
            }
        }
        $table .= '</table>';
        return $table;
    }

    function __destruct(){
    }
}