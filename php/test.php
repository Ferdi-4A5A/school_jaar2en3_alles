<style>
    * {
        box-sizing: border-box;
    }
    .row::after {
        content: "";
        clear: both;
        display: table;
    }
    [class*="col-"] {
        float: left;
        padding: 15px;
        border: solid black 1px;
    }
    @media only screen and (min-width: 600px) {
        /* For tablets: */
        .col-m-1 {width: 8.33%;}
        .col-m-2 {width: 16.66%;}
        .col-m-3 {width: 25%;}
        .col-m-4 {width: 33.33%;}
        .col-m-5 {width: 41.66%;}
        .col-m-6 {width: 50%;}
        .col-m-7 {width: 58.33%;}
        .col-m-8 {width: 66.66%;}
        .col-m-9 {width: 75%;}
        .col-m-10 {width: 83.33%;}
        .col-m-11 {width: 91.66%;}
        .col-m-12 {width: 100%;}
    }
    @media only screen and (min-width: 768px) {
        /* For desktop: */
        .col-1 {width: 8.33%;}
        .col-2 {width: 16.66%;}
        .col-3 {width: 25%;}
        .col-4 {width: 33.33%;}
        .col-5 {width: 41.66%;}
        .col-6 {width: 50%;}
        .col-7 {width: 58.33%;}
        .col-8 {width: 66.66%;}
        .col-9 {width: 75%;}
        .col-10 {width: 83.33%;}
        .col-11 {width: 91.66%;}
        .col-12 {width: 100%;}
    }
    html {
        font-family: "Lucida Sans", sans-serif;
    }
</style>

<?php

include 'class.DbHandler.php';

$crud = new DbHandler('192.168.56.1','testtest','mainuser','dev01dev');

// SQL Query
$sql = "SELECT * FROM `testbla` LIMIT 0, 30";
$res = $crud->readData($sql);

//    echo '<div class="row">';

foreach ($res as $row) {
//    echo '<div class="row">';
        echo '<div class="col-4">';
            foreach($row as $key=>$value) {
//                echo '<div class="col-2">';
                    echo $value;
//                echo '</div>';
            }
        echo '</div>';
//    echo '</div>';
}
