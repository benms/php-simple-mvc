<?php

/*** define the site path ***/
$site_path = realpath(dirname(__FILE__));
define('__SITE_PATH', $site_path);

/*** include the init.php file ***/
include __SITE_PATH . '/lib/includes/init.php';

?>
