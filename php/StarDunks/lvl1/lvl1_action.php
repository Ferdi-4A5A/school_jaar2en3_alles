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

include '../../class.DbHandler.php';

    $dbName = 'Products';
    $tableID = 'product_id';
    $tableName = 'Products';

    $crud = new DbHandler('192.168.56.1',$dbName,'mainuser','dev01dev');

//    // Create DB row
//    if (isset($_POST['btn-insert'])) {
//        $sql = "SELECT * FROM `$dbName`";
//        $res = $crud->readData($sql);
//
//        echo '<div class="table">';
//            echo '<div class="thead">';
//                echo '<span class="td">';
//                    echo "Insert";
//                echo '</span>';
//            echo "</div>";
//
//            foreach ($res as $row) {
//                echo '<form class="tr" method="post" action="lvl1.php">';
//                    foreach (array_slice($row,1) as $key=>$value) {
//                        echo '<span class="tr"><span class="td"><input type="text" name="' . $key . '" placeholder="' . $key . '"></span></span>';
//                    }
//                    echo '<span class="tr"><button type="submit" name="btn-insert">Insert</button></span>';
//                echo "</form>";
//                break;
//            }
//        echo "</div>";
//    }

//    // Read DB row
//    if (isset($_POST['btn-read-newpage'])) {
//        $sql = "SELECT * FROM `$tableName` WHERE $tableID = '" . $_POST['btn-read-newpage'] . "'";
//        $res = $crud->readData($sql);
//
//        echo '<table border="1">';
//            foreach ($res as $row) {
//                foreach(array_slice($row,1) as $key=>$value) {
//                    echo '<tr><th>' . $key . '</th><td>' . $value . '</td></tr>';
//                }
//            }
//        echo "</table>";
//    }

//    // Update DB row
//    if (isset($_POST['btn-update-newpage'])) {
//        $sql = "SELECT * FROM `$tableName` WHERE $tableID = '" . $_POST['btn-update-newpage'] . "'";
//        $res = $crud->readData($sql);
//
//        echo '<div class="table">';
//            foreach ($res as $row) {
//                echo '<form method="post" action="lvl1.php">';
//                    foreach(array_slice($row,1) as $key=>$value) {
//                        echo '<div class="tr">';
//                            echo '<div class="th">' . $key . '</div>';
//                            echo '<span class="td"><input name="' . $key . '" value="' . $value . '" /></span>';
//                        echo '</div>';
//                    }
//                    echo '<button type="submit" name="btn-update" value="' . $row["$tableID"] . '">Update</button>';
//                echo "</form>";
//            }
//        echo "</div>";
//    }

//    // Delete DB row
//    if (isset($_POST['btn-delete-newpage'])) {
//        $sql = "DELETE FROM `$tableName` WHERE $tableID = '" .$_POST['btn-delete-newpage']. "'";
//        echo $crud->deleteData($sql);
//    }