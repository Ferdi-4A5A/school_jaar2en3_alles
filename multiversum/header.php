<?php
include 'class/class.DbHandler.php';
$crud = new DbHandler('192.168.56.1','multiversum','mainuser','dev01dev');
header("Content-Type: text/html; charset=ISO-8859-1");
session_start();
?>

<div class="col-12 col-m-12 header-text">
    <img src="img/logo.svg" class="img-logo" />
      <div class="herologo"> MULTIVERSUM </div>
</div>

<div class="col-2"> </div>

<div class="col-2 navmenu">
    <a href="index.php">Home</a>
</div>

<div class="col-2 navmenu">
    <a href="products.php">Products</a>
</div>

<div class="col-2 navmenu">
    <a href="contact.php">Contact</a>
</div>

<div class=" center col-2 navbar">

      <a href="shopping_card.php">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
      </a>

</div>

<div class="col-2"> </div>

<div class="col-12 headerimage"> <img src="css/vr-bril2.png"/></div>
