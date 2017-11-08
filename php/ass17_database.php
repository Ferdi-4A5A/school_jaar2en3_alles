<?php
$servername = "192.168.56.1";
$username = "mainuser";
$password = "dev01dev";
$dbname = "schoolass17";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    )";

//     use exec() because no results are returned
    $conn->exec($sql);
    echo "Table MyGuests created successfully";

    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@example.com')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    // begin the transaction
//    $conn->beginTransaction();
//    // our SQL statements
//    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
//    VALUES ('John', 'Doe', 'john@example.com')");
//    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
//    VALUES ('Mary', 'Moe', 'mary@example.com')");
//    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
//    VALUES ('Julie', 'Dooley', 'julie@example.com')");
//
//    // commit the transaction
//    $conn->commit();
//    echo "New records created successfully";
//}
//catch(PDOException $e)
//{
//    // roll back the transaction if something failed
//    $conn->rollback();
//    echo "Error: " . $e->getMessage();
//}

//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests");
//    $stmt->execute();
//
//    // set the resulting array to associative
//    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//
//    $output = $stmt->fetchAll();
//var_dump($output);
//}
//catch(PDOException $e) {
//    echo "Error: " . $e->getMessage();
//}
//$conn = null;
//echo "</table>";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE MyGuests SET lastname='Doe', firstname='Sjaak' WHERE id=2";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
?>
