<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class dier
{
    var $nummer;

    function __construct($nummer) {
        $this->nummer = $nummer;
    }

    function feignDeath() {

    }

    function __destruct() {
    }
}