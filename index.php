<?php
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/application'));
// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));
// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    realpath(APPLICATION_PATH . '/models'),
    realpath(APPLICATION_PATH . '/forms'),

    get_include_path()
)));
/** Zend_Application */
require_once 'Zend/View.php';

$view = new Zend_View();
$view->setHelperPath(realpath(APPLICATION_PATH . '/views/helpers'));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

// Chargement automatique de Zend_Db_Adapter_Pdo_Mysql, et instanciation.
$config = new Zend_Config_Ini('./application/configs/application.ini', 'production');

$db = Zend_Db::factory($config->database->adapter,array(
   'host'  => $config->database->host,
  'username'  => $config->database->params->username,
  'password'  => $config->database->params->password,
  'dbname'  => $config->database->params->dbname,
    )
);

$registry = Zend_Registry::getInstance();
// placer la connexion dans un registre global à l'application
$registry->set('db', $db);
// en faire la connexion par defaut
Zend_Db_Table::setDefaultAdapter($db);
$application->bootstrap();
//demarrer
$application->run();
