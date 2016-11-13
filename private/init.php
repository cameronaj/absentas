<?php

define('AUTHORS',"Andrew Cameron, Huey Hum, Katie Piette, Yacoub Seyni, and Andrew Kraft");

//define('BASE_PATH','/home/ubuntu/workspace');

define('BASE_PATH','public/');

define('WEB_PATH', BASE_PATH . "/public");

define('SMARTY_ROOT', WEB_PATH . "/Smarty/");
define('SMARTY_TEMPLATES', SMARTY_ROOT . "templates/");
define('SMARTY', SMARTY_ROOT . "libs/Smarty.class.php");

require_once SMARTY;

$smarty = new Smarty();

$smarty->assign('AUTHORS', AUTHORS);
$smarty->setTemplateDir(SMARTY_TEMPLATES);
$smarty->setCompileDir(SMARTY_ROOT . 'templates_c');
$smarty->setCacheDir(SMARTY_ROOT . 'tmp');
$smarty->setConfigDir(SMARTY_ROOT . 'configs');

?>