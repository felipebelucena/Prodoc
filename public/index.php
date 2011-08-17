<?php

// Define path to application directory
defined('APPLICATION_PATH')
        || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
        || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// define upload path
defined('APPLICATION_UPLOADS_DIR')
    || define('APPLICATION_UPLOADS_DIR', realpath(dirname(__FILE__) . '/../public/images/comprovantes'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
            realpath(APPLICATION_PATH . '/../library'),
            get_include_path(),
        )));

/** Zend_Application */
require_once 'Zend/Application.php';
// Create application, bootstrap, and run
$application = new Zend_Application(
                APPLICATION_ENV,
                APPLICATION_PATH . '/configs/application.ini'
);

$mysession = new Zend_Session_Namespace('mysession');
if (!isset($mysession->counter)) {
    $mysession->counter = 1000;
} else {
    $mysession->counter++;
}

if ($mysession->counter > 1999) {
    unset($mysession->counter);
}

$application->bootstrap()
        ->run();