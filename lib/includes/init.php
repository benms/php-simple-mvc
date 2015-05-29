<?php

/*** error reporting on ***/
error_reporting(E_ALL);

/*** include the active record class ***/
include __SITE_PATH . '/config/' . 'config.php';
/*** include the registry class ***/
include __SITE_PATH . '/lib/' . 'registry.class.php';
/*** include the template class ***/
include __SITE_PATH . '/lib/' . 'template.class.php';
/*** include the request class ***/
include __SITE_PATH . '/lib/' . 'request.class.php';
/*** include the db class ***/
include __SITE_PATH . '/lib/' . 'db.class.php';
/*** include the active record class ***/
include __SITE_PATH . '/lib/' . 'active_record_base.class.php';
/*** include the router class ***/
include __SITE_PATH . '/lib/' . 'router.class.php';
/*** include the controller class ***/
include __SITE_PATH . '/lib/' . 'controller_base.class.php';

define('__VIEW_PATH', __SITE_PATH . '/app/views');

$root_url = explode('?', $_SERVER['REQUEST_URI'])[0];
define('__ROOT_URL', $root_url);

/*** auto load model classes ***/
function __autoload($class_name) {
	// $filename = strtolower($class_name) . '.class.php';
	$filename = $class_name . '.class.php';
	$file = __SITE_PATH . '/app/models/' . $filename;

	if (file_exists($file) == false) {
		return false;
	}
	include $file;
}

/*** a new registry object ***/
$registry = new registry;

/*** a new modelStudent object ***/
$registry->modelStudent = new studentModel(db::getInstance($db_config_arr));

/*** load the router ***/
$registry->router = new router($registry);

/*** set the controller path ***/
$registry->router->setPath(__SITE_PATH . '/app/controllers');

/*** set the default controller ***/
$registry->router->controller = isset($config_default_controller) ? $config_default_controller : 'index';
/*** set the default action ***/
$registry->router->action = isset($config_default_action) ? $config_default_action : 'index';

/*** load up the template ***/
$registry->template = new template($registry);

/*** load the controllers ***/
$registry->router->loader();

?>
