<?php
namespace Hentailobby\Controllers\Home;

use Hentailobby\Models\Home\Defaults as Model;

abstract class Defaults {
	private $model;
	
	public function __construct()
	{
		$this->model = new Model;
		$this->getIniInformation();
		foreach($this->config['PLATAFORMA'] as $key => $a){
			define(strtoupper($key), $a);
		}
		$site = explode("/", $_SERVER['REQUEST_URI']);
		define("CONTROLLER", (isset($site[2]) ? $site[2] : "dashboard"));
		$this->model->analytics(array(
			"ip" => $_SERVER['REMOTE_ADDR'],
			"referer" => (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : "/"),
			"request" => $_SERVER['REQUEST_URI']
		));
	}
	private function getIniInformation($args=null)
	{
		try {
			if(file_exists(__DIR__ . DIRECTORY_SEPARATOR . "../../classes/config.ini")) {
				$this->config = parse_ini_file(__DIR__ . DIRECTORY_SEPARATOR . "../../classes/config.ini", true);
			} else {
				throw new Exception("O arquivo de configuração está do site está com erro.");
			}
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}