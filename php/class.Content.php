<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//include_once 'class.Article.php';
include_once 'class.DbHandler.php';

class Content

    // doorgeefluik/schoonmaakluik, media voer je dingen net als article
    // alles dus generiek maken zodat je DRY kan blijven werken, dus ook DB verbinding hier zodat alles eromheen hier gebruik van kan maken
{

    function __construct($crud) {
        $this->crud = $crud;
    }

    function DBReadData($sql) {
        $crud->readData($sql);
    }


    function __destruct(){

    }

}









