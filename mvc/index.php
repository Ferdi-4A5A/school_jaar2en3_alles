<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'controller/ContactsController.php';
require_once 'Router.php';

$controller = new ContactsController();
$controller->handleRequest();

$router = new Router();