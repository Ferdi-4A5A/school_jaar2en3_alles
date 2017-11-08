<?php

require_once 'model/class.DbHandler.php';
require_once 'model/class.Table.php';
require_once 'js/main.js';

class ContactsService
{
    public function __construct() {
        $this->DbHandler = new DbHandler('192.168.56.1','mvc','mainuser','dev01dev');
    }

    public function readContacts() {
        if (isset($_GET['name'])) {
            $sql = "SELECT * FROM info WHERE mvcName = '".$_GET['name']."'";
        } else {
            $sql = "SELECT * FROM info";
        }
        return $this->DbHandler->readData($sql);
    }

    public function createContactTable($contacts) {
        foreach ($contacts as $row) {
            $row['mvcName'] = "<form method='post' action=''><a href=http://school.dev/mvc/ContactsController/readAllContactData/".$row['mvcID'].">".$row['mvcName']."</a></form>";
            $row['Delete'] = "<form method='post' action=''><a href=http://school.dev/mvc/ContactsController/deleteContactData/".$row['mvcID'].">X</a></form>";
            foreach ($row as $key=>$value) {
                $tableContactValue[] = $value;
            }
        }

        foreach ($row as $key=>$value) {
            $tableContactHeader[] = $key;
        }

        $handler = new Table();
        return $handler->createTable($tableContactHeader, $tableContactValue);
    }

    public function createContactData() {
        $sql = "INSERT INTO info (mvcName, mvcPhone, mvcEmail, mvcAddress) VALUES ('".$_POST['contact_name']."', '".$_POST['contact_telephone']."', '".$_POST['contact_email']."', '".$_POST['contact_address']."')";
        return $this->DbHandler->createData($sql);
    }

    public function deleteContactData($id) {
//        var_dump($id);
        $sql = "DELETE FROM info WHERE mvcID = $id";
        return $this->DbHandler->deleteData($sql);
    }

    public function createSelect($array, $selectName, $columnID, $columnTitle, $selectCounter) {
//        var_dump($selectCounter);

//        $check = array();
//        for ($counter=1;$counter<=3;$counter++){
//            echo $counter;
//            $check[] = "some value";


        $select = '<form method="post" action="">';
            $select .= '<select name="' . $selectName . '">';
                foreach ($array as $key => $value) {
//                    var_dump($value[$columnID]);

//                    $test = $_POST[$selectName];
//                    var_dump($test);
                    $select .= '<option value="' . $value[$columnID] . '"';
//                    if (isset($_POST[$selectName])) {$test=$_POST[$selectName];}
                    if (isset($_POST['select1']) && $value[$columnID] == $_POST['select1']) {$select .= 'selected="selected"';}
                    elseif (isset($_POST['select2']) && $value[$columnID] == $_POST['select2']) {$select .= 'selected="selected"';}

//                    if (isset($_POST[$selectName]) && $value[$columnID] == $test) {$select .= 'selected="selected"';}
//                    var_dump($test);
                    $select .= '>';
                        $select .= $value[$columnTitle];
                    $select .= '</option>';
                    }
            $select .= '</select>';
            $select .= '<button type="submit">Submit</button>';
        $select .= '</form>';
var_dump($select);
        return $select;

//        }
    }
}