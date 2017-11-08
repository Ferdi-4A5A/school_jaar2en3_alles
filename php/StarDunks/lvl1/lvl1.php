<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <link rel="stylesheet" type="text/css" href="style.css">-->
<!--    <script src="main.js"></script>-->
    <meta charset="utf-8" />
    <script src="https://use.fontawesome.com/fa107fe55c.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        .search {
            font-family: FontAwesome;
            text-align: right;
        }
        [class*="col-"] {
            /*float: left;*/
            padding: 15px;
            border: 1px solid black;
        }
        .col-1 {width: 8.33%;}
        .col-2 {width: 16.66%;}
        .col-3 {width: 25%;}
        .col-4 {width: 33.33%}
        .col-5 {width: 41.66%;}
        .col-6 {width: 50%;}
        .col-7 {width: 58.33%;}
        .col-8 {width: 66.66%;}
        .col-9 {width: 75%;margin: 0 auto;}
        .col-10 {width: 83.33%;}
        .col-11 {width: 91.66%;}
        .col-12 {width: 100%;}
        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }
        table tr {
            background: rgba(248, 248, 248, 0.76);
            border: 1px solid #ddd;
            padding: .35em;
        }
        table th,
        table td {
            padding: .625em;
            text-align: center;
        }
        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
        }
        .table-form {
            margin-bottom: 0em;
        }
        .div-table {
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }
        .div-tr {
            background: rgba(248, 248, 248, 0.76);
            border-right: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            border-left: 1px solid #ddd;
            padding: .35em;
        }
        .div-td {
            padding: .625em;
            text-align: center;
        }
    </style>

</head>



<body>

<?php

//export to CSV button vergeten
// grid met kolommen & alles in switch zetten? -_-

// als je row delete met button terug naar pagina of validation ofzo
// alles op herhalende variabelen etc doorkijken

// alles beveiligen (parameters/htmlspecialchars/prepare/ID escape (en waarom) en verder kijken)
// pagination search+normaal met 2 if statements met sql query laden onderaan en 2x if statement met foreach buttons laden, en als het zoekveld leeg is ook normaal laden
// btn-search pagination met limit.. + search ook met GET?

    include '../../class.DbHandler.php';

    $dbName = 'Products';
    $tableID = 'product_id';
    $tableName = 'Products';

    $paginationStartFrom = 0;
    $paginationRowPerPage = 5;

    $paginationPageNumber = (isset($_GET['page'])) ? $_GET['page'] : '1';


    $crud = new DbHandler('192.168.56.1',$dbName,'mainuser','dev01dev');

    if (isset($paginationPageNumber)) {
        $paginationStartFrom = ($paginationPageNumber - 1) * $paginationRowPerPage;

        $sql = "SELECT * FROM `$tableName`";
        $res = $crud->readData($sql);
        $paginationPageLimit = ceil(count($res) / $paginationRowPerPage);

        $sql = "SELECT * FROM `$tableName` LIMIT $paginationStartFrom, $paginationRowPerPage";
    }

    if (isset($_POST['previous'])) {
        if ($paginationPageNumber <= 1) {
            $paginationPageNumber = $paginationPageLimit + 1;
        }

        $paginationPageNumber = $paginationPageNumber - 1;
        $pageDir = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $baseUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$page_link";

        header('Location:' . $baseUrl . $pageDir . '?page=' . $paginationPageNumber);
    }

    if (isset($_POST['next'])) {
        if ($paginationPageNumber == $paginationPageLimit) {
            $paginationPageNumber = 0;
        }

        $paginationPageNumber = $paginationPageNumber + 1;
        $page_link = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $baseUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$page_link" . '?page=' . $paginationPageNumber;

        header('Location:' . $baseUrl);
    }

    if (isset($_POST['input-search'])) {
        $sql = "SELECT * FROM `$tableName` WHERE product_name LIKE '%".$_POST['input-search']."%' OR other_product_details LIKE '%".$_POST['input-search']."%'";
    } else {
        $sql = "SELECT * FROM `$tableName` LIMIT $paginationStartFrom, $paginationRowPerPage";
    }

    $res = $crud->readData($sql);

    echo '<div class=col-9>';

//        echo '<form method="post" action="lvl1_action.php">';
//            echo '<button type="submit" name="btn-insert">Insert</button>';
//        echo '</form>';


        $first = true;
        echo '<form class="table-form" method="post" action="">';
            echo '<table id="table-id">';
                echo '<tr>';
                    if ($first) {
                        echo '<td><button type="submit" name="btn-delete-all">Delete selected</button></td>';
                        echo '<td><input type="text" name="input-search" /><span class="search"></span><button type="submit" name="btn-search"><i class="fa fa-search" aria-hidden="true"></i></button></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td></td>';
                        echo '<td><button type="submit" name="btn-insert">Insert</button></td>';
                        $first = false;
                    }
                echo '</tr>';


                foreach ($res as $row) {
                    echo '<tr>';
                        echo'<th><input type="checkbox" id="select-all" /></th>';
                        foreach (array_slice($row,1) as $key=>$value) {
                            echo '<th >' . $key . '</th>';
                        }
                        echo'<th></th>';
                    echo '</tr>';
                    break;
                }

                foreach ($res as $row) {
                    echo '<tr>';
                        echo '<td><input id="checkbox" type="checkbox" name="check_list[' . $row["$tableID"] . ']" value="' . $row["$tableID"] . '" /></td>';
                        echo '<td>' . $row['product_type_code'] . '</td>';
                        echo '<td>' . $row['supplier_id'] . '</td>';
                        echo '<td>' . $row['product_name'] . '</td>';
                        echo '<td>' . '&euro; ' . $row['product_price'] . '</td>';
                        echo '<td>' . $row['other_product_details'] . '</td>';
                        echo '<td><button type="submit" name="btn-read-newpage" value="' . $row["$tableID"] . '"><i class="fa fa-book" aria-hidden="true"></i></button>';
                        echo '<button type="submit" name="btn-update-newpage" value="' . $row["$tableID"] . '"><i class="fa fa-pencil" aria-hidden="true"></i></button>';
                        echo '<button type="submit" name="btn-delete-newpage" value="' . $row["$tableID"] . '"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
                    echo '</tr>';
                }
            echo '</table>';
        echo '</form>';

        $sql = "SELECT * FROM $tableName";
        $res = $crud->readData($sql);
        $paginationPageLimit = ceil(count($res) / $paginationRowPerPage);
        $PaginationPagePlus = $paginationPageNumber +1;
        $PaginationPageMin = $paginationPageNumber -1;

        echo '<div class="div-table">';
            echo '<div class="div-tr">';
                echo '<div class="div-td">';

                    echo '<form method="get" action="">';
                        for ($paginationPages = 1; $paginationPages <= $paginationPageLimit; $paginationPages++) {
                            echo '<button type="submit" name="page" value="' . $paginationPages . '">' . $paginationPages .'</button>';
                        }
                    echo '</form>';

                    echo '<form method="post" action="">';
                        echo '<button type="submit" name="previous" value=' . $PaginationPageMin . '>Previous</button>';
                        echo '<button type="submit" name="next" value=' . $PaginationPagePlus . '>Next</button>';
                    echo '</form>';

                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';

    // Update DB row (form lvl1_action.php)
    if (isset($_POST['btn-update'])) {
        $sql = "UPDATE `$dbName`.`$tableName` SET `product_type_code` = '".$_POST['product_type_code']."', `supplier_id` = '".$_POST['supplier_id']."', `product_name` = '".$_POST['product_name']."', `product_price` = '".$_POST['product_price']."', `other_product_details` = '".$_POST['other_product_details']."' WHERE `$tableName`.`$tableID` = '".$_POST['btn-update']."'";
        echo $crud->updateData($sql);
    }

    // Create DB row (form lvl1_action.php)
    if (isset($_POST['btn-insert-db'])) {
        $sql = "INSERT INTO $tableName (product_type_code, supplier_id, product_name, product_price, other_product_details) VALUES ('".$_POST['product_type_code']."', '".$_POST['supplier_id']."', '".$_POST['product_name']."', '".$_POST['product_price']."', '".$_POST['other_product_details']."')";
        $res = $crud->createData($sql);
    }

    // Delete checked DB rows
    if (isset($_POST['btn-delete-selected'])) {
        $sql = "DELETE FROM `$tableName` WHERE $tableID = '" .$_POST['btn-delete-selected']. "'";
        echo $crud->deleteData($sql);
    }

    if(isset($_POST['btn-delete-all'])) {
        foreach ($_POST['check_list'] as $item) {
            $sql = "DELETE FROM `$tableName` WHERE $tableID = $item";
            echo $crud->deleteData($sql);
        }
    }

    // Create DB row
    if (isset($_POST['btn-insert'])) {
        $sql = "SELECT * FROM `$dbName`";
        $res = $crud->readData($sql);

        echo '<div class="table">';
            echo '<div class="thead">';
                echo '<span class="td">';
                    echo "Insert";
                echo '</span>';
            echo "</div>";

            foreach ($res as $row) {
                echo '<form class="tr" method="post" action="lvl1.php">';
                    foreach (array_slice($row,1) as $key=>$value) {
                        echo '<span class="tr"><span class="td"><input type="text" name="' . $key . '" placeholder="' . $key . '"></span></span>';
                    }
                    echo '<span class="tr"><button type="submit" name="btn-insert-db">Insert</button></span>';
                echo "</form>";
                break;
            }
        echo "</div>";
    }

    // Read DB row
    if (isset($_POST['btn-read-newpage'])) {
        $sql = "SELECT * FROM `$tableName` WHERE $tableID = '" . $_POST['btn-read-newpage'] . "'";
        $res = $crud->readData($sql);

        echo '<table border="1">';
            foreach ($res as $row) {
                foreach(array_slice($row,1) as $key=>$value) {
                    echo '<tr><th>' . $key . '</th><td>' . $value . '</td></tr>';
                }
            }
        echo "</table>";
    }

    // Update DB row
    if (isset($_POST['btn-update-newpage'])) {
        $sql = "SELECT * FROM `$tableName` WHERE $tableID = '" . $_POST['btn-update-newpage'] . "'";
        $res = $crud->readData($sql);

        echo '<div class="table">';
        foreach ($res as $row) {
            echo '<form method="post" action="lvl1.php">';
                foreach(array_slice($row,1) as $key=>$value) {
                    echo '<div class="tr">';
                    echo '<div class="th">' . $key . '</div>';
                    echo '<span class="td"><input name="' . $key . '" value="' . $value . '" /></span>';
                    echo '</div>';
                }
                echo '<button type="submit" name="btn-update" value="' . $row["$tableID"] . '">Update</button>';
            echo "</form>";
        }
        echo "</div>";
    }

    // Delete DB row
    if (isset($_POST['btn-delete-newpage'])) {
        $sql = "DELETE FROM `$tableName` WHERE $tableID = '" .$_POST['btn-delete-newpage']. "'";
        echo $crud->deleteData($sql);
    }

?>

<script>
    $( '#select-all' ).click( function () {
        $( '#table-id tr td input[type="checkbox"]' ).prop('checked', this.checked)
    })
</script>
