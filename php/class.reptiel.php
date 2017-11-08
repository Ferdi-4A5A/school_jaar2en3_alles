<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class reptiel extends dier
{
    var $type;
    var $kleurschubben;

    function __construct($type, $kleurschubben) {
        $this->type = $type;
        $this->kleurschubben = $kleurschubben;
    }

    function __destruct() {
    }
}