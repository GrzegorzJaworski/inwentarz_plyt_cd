<?php
error_reporting(E_ALL|E_STRICT);





date_default_timezone_set('Europe/Warsaw');

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
//set_include_path(implode(PATH_SEPARATOR, array(
//    realpath(APPLICATION_PATH . '/../library'),
//    get_include_path(),
//)));

set_include_path('.' . PATH_SEPARATOR . '/../library'
//    . PATH_SEPARATOR . '/../application/models/'
    . PATH_SEPARATOR . get_include_path());




/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
//include "Zend/Loader.php";
//Zend_Loader::loadClass('Zend_Registry');
//Zend_Loader::loadClass('Zend_Db');
//Zend_Loader::loadClass('Zend_Db_Table');
//Zend_Loader::registerAutoload();

require_once 'Zend/Loader/Autoloader.php';
$loader = Zend_Loader_Autoloader::getInstance();
$loader->registerNamespace('My_');
$loader->setFallbackAutoloader(true);

//require_once 'Zend/Loader.php';
//Zend_Loader::registerAutoload();


//$config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', 'general');
//$registry = Zend_Registry::getInstance();
//$registry->set('config', $config);

//$db = Zend_Db::factory(	$config->db->adapter,
//    $config->db->config->toArray() );
//Zend_Db_Table::setDefaultAdapter($db);



$application->bootstrap()
            ->run();

//include "Zend/Loader.php";
//Zend_Loader::loadClass('Zend_Controller_Front');
//$frontController = Zend_Controller_Front::getInstance();
//$frontController->throwExceptions(true);
//$frontController->setControllerDirectory('/../application/controllers');
//
////$frontController->dispatch();