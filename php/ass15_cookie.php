<?php

setcookie("cookie1", "this is a 3-cookie");

if (isset($_COOKIE['cookie1'])) {
    $cookie1 = $_COOKIE['cookie1'];
    echo $cookie1;
}

?>