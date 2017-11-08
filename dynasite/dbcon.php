<?php
$conn = new PDO("mysql:host=192.168.56.1;dbname=dynasite", 'mainuser', 'dev01dev');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);