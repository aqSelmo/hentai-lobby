<?php
namespace Hentailobby\Controllers\Administracao;

use Hentailobby\Models\Administracao\Defaults as Model;
use Exception;

interface defaultsInterface {
	public function checkSession($args=null);
}

abstract class Defaults implements defaultsInterface {
	private $config;
	private $model;
	
	public function __construct()
	{
		session_start();
		$this->checkSession();
		$this->getIniInformation();
		$requestUri = explode("/", $_SERVER['REQUEST_URI']);
		
		$this->model = new Model;
		
		if(isset($requestUri[2]) && $requestUri[2]) {
			define("CONTROLLER" , $requestUri[2]);	
		}
		foreach($this->config['PLATAFORMA'] as $key => $a){
			define(strtoupper($key), $a);
		}
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
	public function checkSession($args=null)
	{
		if(!isset($_SESSION['@Hentalobby::login']) || !$_SESSION['@Hentalobby::login']) {
			header("Location: /administracao/login");
			exit;
		}
	}
	private function setPath($args=null)
	{
		$path = __DIR__ . DIRECTORY_SEPARATOR . "../../uploads/" . $args . "/";
		if(!is_dir($path)){
			mkdir($path, 0775, true);
		}
		return $path;
	}
	public function remove($path=null, $file=null)
	{
		$src = $this->setPath($path) . $file;
		if(file_exists($src)) {
			unlink($src);
			return true;
		}
		return false;
	}
	public function removePath($path=null)
	{
		$folder = $this->setPath($path);
		if(is_dir($folder)) {
			rmdir($folder);
			return true;
		}
		return false;
	}
	public function upload($path=null, $file=null)
	{
		if(is_uploaded_file($file['tmp_name'])) {
			$src = uniqid() . "." . pathinfo($file['name'], PATHINFO_EXTENSION);
			$path = $this->setPath($path);
			if(move_uploaded_file($file['tmp_name'], $path . $src)) {
				return $src;
			} else {
				return false;
			}
		}
		return false;
	}
	public function multiple($path=null, $files=[])
	{
		if(isset($files['name']) && is_array($files['name'])){
			$arrayOfImages = [];
			$path = $this->setPath($path);
			foreach($files['tmp_name'] as $i => $file) {
				$src = uniqid() . "." . pathinfo($files['name'][$i], PATHINFO_EXTENSION);
				if(move_uploaded_file($file, $path . $src)) {
					array_push($arrayOfImages, $src);
				}
			}
			return $arrayOfImages;
		}
		return false;
	}
}