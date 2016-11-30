<?php

/**
 * Front controller
 */
define('ENVIRONMENT', 'development');
if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

define('APP', ROOT . 'src' . DIRECTORY_SEPARATOR);

// This is the auto-loader for Composer-dependencies
require ROOT . 'vendor/autoload.php';

// load application config
require APP . 'config/config.php';

// load application class
use Chat\Core\Application;

// start the application
$app = new Application();