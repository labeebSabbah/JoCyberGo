<?php

session_start();

require 'vendor/autoload.php';

$uri = $_SERVER["REQUEST_URI"];

$router = require 'Routes/routes.php';