<style>
    .table
    {
        display:table;
        border-collapse:separate;
        border-spacing:2px;
    }
    .thead
    {
        display:table-header-group;
        color:white;
        font-weight:bold;
        background-color:grey;
    }
    .tr
    {
        display:table-row;
    }
    .td
    {
        display:table-cell;
        border:1px solid black;
        padding:1px;
    }
</style>

<?php

    include 'class.DbHandler.php';

    $crud = new DbHandler('192.168.56.1','dbcrud','mainuser','dev01dev');

    // Create
//    $sql = "INSERT INTO `dbcrud`.`users` (`user_id`, `first_name`, `last_name`, `user_city`) VALUES (NULL, 'Firstname', 'Lastname', 'UserCity');";
//    echo $crud->createData($sql);

    // Read
//    $sql = "SELECT * FROM `users` LIMIT 0, 30";
//    $res = $crud->readData($sql);
//    foreach ($res as $row){
//        foreach ($row as $key => $val){
//            echo "key = $key, val = $val\n";
//            echo "<br />";
//        }
//    }

    // Update
//    $sql = "UPDATE `dbcrud`.`users` SET `first_name` = 'Jack' WHERE `users`.`user_id` = 2;";
//    echo $crud->updateData($sql);

    // Delete
//    $sql = "DELETE FROM `dbcrud`.`users` WHERE `users`.`user_id` = 1";
//    echo $crud->deleteData($sql);
//    echo "<br />";

    // SQL Query
    $sql = "SELECT * FROM `users` LIMIT 0, 30";
    $res = $crud->readData($sql);

    // Read in table

//    echo "<table border='1'>";

//        foreach ($res as $row) {
//            echo "<tr>";
//                foreach ($row as $key => $val) {
//                    echo "<th> $key </th>";
//                }
//            echo "</tr>";
//            break;
//        }

//        foreach ($res as $row) {
//            echo "<tr>";
//                foreach ($row as $key => $val) {
//                    echo "<td> $val </td>";
//                }
//            echo "</tr>";
//        }

//    echo "</table>";


//    echo "<table border='1'>";

        // Table Header

//        foreach ($res as $row) {
//            echo "<tr>";
//                foreach ($row as $key => $val) {
//                    echo "<th>$key</th>";
//                }
//            echo "</tr>";
//            break;
//        }

    // Table data

//        foreach ($res as $row) {
//            echo "<tr>";
//                foreach ($row as $key => $val) {
//                    echo '<td><input type="text" name="' . $key . '" value="' . $val . '" /></td>';
//                }
//                echo '<form method="post" action="">';
//                    echo '<td><button type="submit" name="btn-update" value="'.$row["user_id"].'">Update</button></td>';
//                echo '</form>';
//            echo "</tr>";
//        }

//    echo "</table>";




    // Echo op elke nieuwe regel of door laten lopen?
    // alles beveiligen (parameters/htmlspecialchars/prepare/ID escape (en waarom) en verder kijken)
    //read delete update per row


    // Update DB
    // Table Header

    echo '<div class="table">';
        echo '<div class="thead">';
            foreach ($res as $row) {
                echo '<div class="tr">';
                foreach (array_slice($row,1) as $key=>$value) {
                    echo '<span class="td">' . $key . '</span>';
                }
                echo "</div>";
                break;
            }
        echo "</div>";

        // Table data

        foreach ($res as $row) {
            echo '<form class="tr" method="post" action="">';
                foreach(array_slice($row,1) as $key=>$value) {
                    echo '<span class="td"><input type="text" name="' . $key . '" value="' . $value . '" /></span>';
                }
                echo '<span class="td"><button type="submit" name="btn-update" value="' . $row["user_id"] . '">Update</button></span>';
            echo "</form>";
        }
    echo "</div>";

    // Update DB

    if (isset($_POST['btn-update'])) {
        $sql = "UPDATE `dbcrud`.`users` SET `first_name` = '".$_POST['first_name']."', `last_name` = '".$_POST['last_name']."', `user_city` = '".$_POST['user_city']."' WHERE `users`.`user_id` = '".$_POST['btn-update']."';";
        echo $crud->updateData($sql);
    }

echo '<br /><br /><br /><br />';

    // Insert DB

    echo '<div class="table">';
        echo '<div class="thead">';
            echo '<span class="td">';
                echo "Insert";
            echo '</span>';
        echo "</div>";

        // Table data

        foreach ($res as $row) {
            echo '<form class="tr" method="post" action="">';
                foreach (array_slice($row,1) as $key=>$value) {
                    echo '<span class="tr"><span class="td"><input type="text" name="' . $key . '" placeholder="' . $key . '" /></span></span>';
                }
                echo '<span class="tr"><button type="submit" name="btn-insert">Insert</button></span>';
            echo "</form>";
            break;
        }
    echo "</div>";

if (isset($_POST['btn-insert'])) {
//    $conn = new PDO("mysql:host=192.168.56.1;dbname=dbcrud", "mainuser", "dev01dev");
//    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, user_city) VALUES (:firstname, :lastname, :city)");
//    $stmt->bindParam(':firstname', $firstname);
//    $stmt->bindParam(':lastname', $lastname);
//    $stmt->bindParam(':city', $city);

    // insert a row
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $city = $_POST['user_city'];
//    $stmt->execute();

    $sql = "INSERT INTO users (first_name, last_name, user_city) VALUES ('$firstname', '$lastname', '$city')";
    $res = $crud->createData($sql);
}