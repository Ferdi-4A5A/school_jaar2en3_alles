<?php

$cookie_name = "grtrhrthr";
$cookie_value = "Hallo daar";

    if (!isset($_POST['btn-cookie']) && !isset($_COOKIE[$cookie_name])) {
        echo '<p>Accept cookie plz</p>';
    } elseif (isset($_POST['btn-cookie'])) {
        setcookie($cookie_name, $cookie_value, time() + 99999);
    }
    if (isset($_POST['btn-cookie']) || $_COOKIE[$cookie_name]) {
        echo 'De cookie is geaccepteerd!';
    }