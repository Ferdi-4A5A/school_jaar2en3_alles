<?php
    $conn = new PDO("mysql:host=192.168.56.1;dbname=dunk_article", 'mainuser', 'dev01dev');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM article INNER JOIN articleContent WHERE authorID = 2");
    $stmt->execute();

//$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($result);
foreach ($result as $row) {
    echo $row['articleImage'] . '<br/>';
    echo $row['articleTitle'] . '<br/>';
    echo $row['articleDetails'] . '<br/>';
//    echo $row['authorName'] . '<br/>';
//    echo $row['authorFunction'] . '<br/>';
//    echo $row['authorImage'] . '<br/>';
}

// foto, titel, details, (http://www.nu.nl/economie/4699815/staatsschuld-valt-32-miljard-euro-lager-dan-gedacht.html) + auteur auteurfoto
















