<?php

$stmt = $conn->prepare("SELECT * FROM navigation");
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<nav id="main-nav">
    <ul>
        <li class="active"><a href="home.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
</nav>