<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'class.Content.php';

class Article extends Content
{


    function __construct() {
//        new Content
    }


    function __destruct(){

    }

}

// http://php.net/manual/en/language.oop5.inheritance.php (lees ook "note:")
// je moet toch juist new Content() moeten zeggen en dan al een db verbinding automatisch krijgen??
// of toch niet, db handler word ge closed bij destruct, je MOET een object aanmaken en die gebruiken anders roep je class.dbhandler op en closed ie de verbinding zonder iets te doen lol


$crud = new DbHandler('192.168.56.1','dunk_article','mainuser','dev01dev');
$sql = "SELECT * FROM `article` LIMIT 0, 30";

$res = $crud->readData($sql);
var_dump($res);

foreach ($res as $row) {
    echo $row['articleTitle'];
}
