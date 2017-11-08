<?php
$conn = new PDO("mysql:host=192.168.56.1;dbname=dbdsg1", 'mainuser', 'dev01dev');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT *, * FROM medewerkers LEFT JOIN afdelingen on afdelingen.afdelingsmanager = medewerkers.id");

$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($result);

//SELECT Orders.OrderID, Customers.CustomerName
//FROM Orders
//INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID;


// medewerkers.afdeling is afdelingen.afdeling_id
// en
//

// dit werkt niet ofzo zzz array in array random shit, ['naam'] werkt wel..
foreach ($result as $row) {


    echo $row . '<br/>';
//    echo $row['articleTitle'] . '<br/>';
//    echo $row['articleDetails'] . '<br/>';
//    echo $row['authorName'] . '<br/>';
//    echo $row['authorFunction'] . '<br/>';
//    echo $row['authorImage'] . '<br/>';
}