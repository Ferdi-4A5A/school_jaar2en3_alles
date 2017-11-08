<?php
    $conn = new PDO("mysql:host=192.168.56.1;dbname=dunk_article", 'mainuser', 'dev01dev');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM article INNER JOIN articleContent WHERE authorID = 2");
    $stmt->execute();

$url = "/ContactsController/readAllContactData/param1/param2";

$packets = explode('/',$url);

echo 'Controller: ' . $packets[1] . '<br />';
echo 'Method: ' . $packets[2] . '<br />';
echo 'Parameter1: ' . $packets[3] . '<br />';
echo 'Parameter2: ' . $packets[4] . '<br />';

?>













