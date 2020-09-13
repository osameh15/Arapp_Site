<?php
session_start();
require '../bootstrap/autoload.php';

error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

date_default_timezone_set("Asia/Tehran");
$router = require "../App/Router.php";
$router->dispatch($_SERVER["QUERY_STRING"]);



