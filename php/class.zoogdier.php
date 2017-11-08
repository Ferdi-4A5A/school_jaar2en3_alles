<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class zoogdier extends dier
{
    var $type;
    var $retard;

    function __construct($type, $retard) {
        $this->nummer = $type;
        $this->retard = $retard;
    }

    function __destruct() {
    }
}