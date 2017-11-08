<style>
    /*.table*/
    /*{*/
        /*display:table;*/
        /*border-collapse:separate;*/
        /*border-spacing:2px;*/
    /*}*/
    /*.thead*/
    /*{*/
        /*display:table-header-group;*/
        /*color:white;*/
        /*font-weight:bold;*/
        /*background-color:grey;*/
    /*}*/
    /*.tr*/
    /*{*/
        /*display:table-row;*/
    /*}*/
    /*.td*/
    /*{*/
        /*display:table-cell;*/
        /*border:1px solid black;*/
        /*padding:1px;*/
    /*}*/
    /*.td-checkbox*/
    /*{*/
        /*display:table-cell;*/
        /*border:1px solid black;*/
        /*padding:1px;*/
    /*}*/
    .search {
        font-family: FontAwesome;
        text-align: right;
    }


</style>
<script src="https://use.fontawesome.com/fa107fe55c.js"></script>

<?php

    // pagination(uit hoofd/pseudocode) / als je row delete met button terug naar pagina of validation ofzo
    // currency hoeft niet gewoon overal euro teken voor :o

    // pagination search+normaal met 2 if statements met sql query laden onderaan en 2x if statement met foreach buttons laden, en als het zoekveld leeg is ook normaal laden

    // page naar page ivm $GET URL NAME? + btn-search pagination met limit.. + search ook met GET?

    // euro teken naast prijs kan alleen met de hand elke kolom apart posten?
    // alles beveiligen (parameters/htmlspecialchars/prepare/ID escape (en waarom) en verder kijken)
    // DRY blijven, maak bijv. variabele van tablenaam zodat je de volgende keer alleen die variabele hoeft aan te passen (voor hergebruik)
    // Blijf constant goed nadenken WAT er gebeurt en WAT er MOET gebeuren (op welke manier dat het kan)
    // grid met kolommen? -_-

    include '../../class.DbHandler.php';

    $dbName = 'Products';
    $tableID = 'product_id';
    $tableName = 'Products';

    $paginationStartFrom = 0;
    $paginationPerPage = 5;

    $crud = new DbHandler('192.168.56.1',$dbName,'mainuser','dev01dev');

    if (isset($_POST['input-search'])) {
        $sql = "SELECT * FROM `$tableName` WHERE product_name LIKE '%".$_POST['input-search']."%' OR other_product_details LIKE '%".$_POST['input-search']."%'";
    } else if(isset($_GET['page'])) {
//        $paginationStartFrom = $_GET['page'] * $paginationPerPage;

        // HIer moet je iets mee: origineel = $paginationStartFrom = $_GET['page'] * 5;

        $paginationStartFrom = $_GET['page'] - 1;
        var_dump($paginationStartFrom);
        $sql = "SELECT * FROM `$tableName` LIMIT $paginationStartFrom, $paginationPerPage";
    } else {
        $sql = "SELECT * FROM `$tableName` LIMIT $paginationStartFrom, $paginationPerPage";
    }

    $res = $crud->readData($sql);

//    $QueryInput = implode(", ", array_keys($res[0]));

    echo '<form method="post" action="lvl1_action.php">';
        echo '<button type="submit" name="btn-insert">Insert</button>';
    echo '</form>';

    echo '<form method="post" action="">';
        echo '<input type="text" name="input-search" /><span class="search"><i class="fa fa-search" aria-hidden="true"></i></span>';
        echo '<button type="submit" name="btn-search">Search</button>';
    echo '</form>';

    // Update DB
    echo '<table>';
        echo '<th>';
            foreach ($res as $row) {
                echo '<tr>';
                    foreach (array_slice($row,1) as $key=>$value) {
                        echo '<th >' . $key . '</th>';
                    }
                echo "</tr>";
                break;
            }
        echo "</th>";

        // Checkboxes + submit button
        echo '<form method="post" action="lvl1_action.php">';
            echo '<td class="td-checkbox"><input type="checkbox" name="selectAll" /></td>';
            foreach ($res as $row) {
                echo '<tr><td class="td-checkbox"><input type="checkbox" name="check_list[' . $row["$tableID"] . ']" value="' . $row["$tableID"] . '" /></td></tr>';
            }
            echo '<button type="submit" name="btn-delete-all">Delete selected</button>';
        echo '</form>';



    // Checkboxes + submit button
    echo '<form method="post" action="lvl1_action.php">';
    echo '<td class="td-checkbox"><input type="checkbox" name="selectAll" /></td>';
        foreach ($res as $row) {
            echo '<tr>';
                echo '<form method="post" action="lvl1_action.php">';

        //            unset($row['product_id']);
        //                unset($row['product_id']);

                        foreach(array_slice($row,1) as $key=>$value) {
                            echo '<td>' . $value . '</td>';
                        }
                        echo '<td><button type="submit" name="btn-read-newpage" value="' . $row["$tableID"] . '"><i class="fa fa-book" aria-hidden="true"></i></button></td>';
                        echo '<td><button type="submit" name="btn-update-newpage" value="' . $row["$tableID"] . '"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>';
                        echo '<td><button type="submit" name="btn-delete-newpage" value="' . $row["$tableID"] . '"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
    //                echo '<button type="submit" name="btn-delete-all">Delete selected</button>';

                echo '</form>';
            echo '</tr>';
        }

//        $sql = "SELECT * FROM $tableName";
//        $res = $crud->readData($sql);
//        $paginationButtonCount = ceil(count($res) / $paginationPerPage) - 1;
//
//        echo '<form method="get" action="">';
//            for ($i = 0; $i <= $paginationButtonCount; $i++) {
//                $btnPageName = $i + 1;
//                echo '<button type="submit" name="page" value="' . $i * 10 . '">' . $btnPageName .'</button>';
//            }
//        echo '</form>';

    echo "</table>";

//    if (isset($_POST['input-search'])) {
//        $sql = "SELECT * FROM $tableName WHERE product_type_code LIKE '".$_POST['input-search']."' OR supplier_id LIKE '".$_POST['input-search']."' OR product_name LIKE '%".$_POST['input-search']."%' OR product_currency LIKE '".$_POST['input-search']."' OR product_price LIKE '".$_POST['input-search']."' OR other_product_details LIKE '%".$_POST['input-search']."%'";
//    } else if(isset($_GET['page'])) {
//        $paginationStartFrom = $_GET['page'];
//        $sql = "SELECT * FROM `$tableName` LIMIT $paginationStartFrom, $paginationPerPage";
//    } else {
//        $sql = "SELECT * FROM `$tableName` LIMIT $paginationStartFrom, $paginationPerPage";
//    }

    $sql = "SELECT * FROM $tableName";
    $res = $crud->readData($sql);
    $paginationButtonCount = ceil(count($res) / $paginationPerPage) - 1;

    echo '<form method="get" action="">';
        for ($i = 0; $i <= $paginationButtonCount; $i++) {
            $btnPageName = $i + 1;
            echo '<button type="submit" name="page" value="' . $btnPageName . '">' . $btnPageName .'</button>';
        }
        echo '<button type="submit" name="btn-next">Next</button>';
    echo '</form>';

    // Update DB row (form lvl1_action.php)
    if (isset($_POST['btn-update'])) {
        $sql = "UPDATE `$dbName`.`$tableName` SET `product_type_code` = '".$_POST['product_type_code']."', `supplier_id` = '".$_POST['supplier_id']."', `product_name` = '".$_POST['product_name']."', `product_price` = '".$_POST['product_price']."', `other_product_details` = '".$_POST['other_product_details']."' WHERE `$tableName`.`$tableID` = '".$_POST['btn-update']."'";
        echo $crud->updateData($sql);
    }

    // Create DB row (form lvl1_action.php)
    if (isset($_POST['btn-insert'])) {
        $sql = "INSERT INTO $tableName (product_type_code, supplier_id, product_name, product_price, other_product_details) VALUES ('".$_POST['product_type_code']."', '".$_POST['supplier_id']."', '".$_POST['product_name']."', '".$_POST['product_price']."', '".$_POST['other_product_details']."')";
        $res = $crud->createData($sql);
    }

    // Go to next field in pagination
    if (isset($_GET['btn-next'])) {
        var_dump($_GET['page']);
    }