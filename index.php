<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor/autoload.php";

/*
if(!in_array($_SERVER['HTTP_CF_CONNECTING_IP'], array('250.173.152.145', '179.55.144.59', '177.32.55.193', '201.52.13.94', '246.222.108.168'))) {
	return require_once __DIR__ . DIRECTORY_SEPARATOR . "construcao/index.php";
}
*/

$instance = new Hentailobby\Classes\Router;
$instance->init();