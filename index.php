<?php
// Enable error reporting
error_reporting(E_ALL);

// Display errors on screen
ini_set('display_errors', 1);

date_default_timezone_set('Asia/Jakarta');

include_once 'config/static.php';
include_once 'controller/main.php';
include_once 'function/main.php';
include_once 'config/env.php';
include_once 'controller/routes.php';

new Router();