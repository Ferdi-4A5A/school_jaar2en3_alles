<?php

class Book {

    var $title;
    var $numPages;
    var $numChapters;


    function __construct($numPages) {
        $this->numPages = $numPages;
    }



    function setNumPages($numOfPages) {
        $numPages = $numOfPages;
    }

    function setTitle($Title) {
        $title  = $Title;
    }

    function setChapters($numOfChapters) {
        $numChapters = $numOfChapters;
    }




    function getNumPages($numPages) {
        return $numPages;
    }

    function getTitle($title) {
        return $title;
    }

    function getNumChapters($chapters) {
        return $chapters;
    }

}



$chapters = array("Hoofdstuk 1", "Hoofdstuk 2", "Hoofdstuk 3", "Hoofdstuk 4", "Hoofdstuk 5", "Hoofdstuk 6");
//$age = array("Title"=>"Kutboek", "pages"=>234, "Joe"=>"43");

//hoofdstukken (array)
//inhoudsopgave (html uitschrijven)

$yellowPages = new Book(341);
$outputPages = $yellowPages->numPages;
var_dump($outputPages);

foreach ($chapters as &$value) {
    echo $value . "<br>";
}

$rest = substr("abcdefghijklmnopqrstuvwxyz", 3, 4);  // returns "defg"

echo $rest;


echo '<form name="formOne" method="get" action="page2.php">';

    Name:

echo '<input type="text" name="name" size="15" maxlength="10" />';

    echo "<br>" . "Pick a random number from 1 to 10:" . "<br>";

echo '<input type="text" name="aNumber" size="8" maxlength="2" />';

echo '<input type="submit" />';


