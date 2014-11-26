<?php
error_reporting(E_ALL | E_STRICT);

$loader = require_once __DIR__ . '/../../../../vendor/autoload.php';
$loader->addPsr4('nickescobedo\\penapi\\', __DIR__ . '/pen-api');
