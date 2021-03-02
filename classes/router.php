<?php
namespace Hentailobby\Classes;

use Hentailobby\Classes\Filter;
use Exception;

interface RouterInterface {
	public function bindParams($args=[]);
	public function setParams($args=[]);
}

class Router implements RouterInterface {
	private $requestURI;
	private $path;
	private $controller;
	private $method;
	private $args;
	
	public function __construct()
	{
		$this->requestURI = explode("/", $_SERVER['REQUEST_URI']);
		$this->bindParams();
	}
	public function bindParams($args=[])
	{
		$this->path = (isset($this->requestURI[1]) && $this->requestURI[1] ? Filter::sanitizeString(ucfirst($this->requestURI[1])) : "Home");
		$this->controller = (isset($this->requestURI[2]) && $this->requestURI[2] ? Filter::sanitizeString(ucfirst($this->requestURI[2])) : "Dashboard");
		$this->method = (isset($this->requestURI[3]) && !is_numeric($this->requestURI[3]) ? Filter::sanitizeString(strtolower($this->requestURI[3])) : "index");
		$this->args = (isset($this->requestURI[4]) && $this->requestURI[4] ? Filter::sanitizeUrl($this->requestURI[4]) : (isset($this->requestURI[3]) && is_numeric($this->requestURI[3]) ? Filter::sanitizeInt($this->requestURI[3]) : NULL));
	}
	private function callClassRequest($controller, $method, $args){
		$controller = new $controller;
		$controller->$method($args);
	}
	public function setParams($args=null)
	{
		try {
			if(class_exists("Hentailobby\\Controllers\\" . $this->path . "\\" . $this->controller)){
				if(method_exists("Hentailobby\\Controllers\\" . $this->path . "\\" . $this->controller, $this->method)) {
					$this->callClassRequest("Hentailobby\\Controllers\\" . $this->path . "\\" . $this->controller, $this->method, $this->args);
				} else {
					throw new Exception('MÉTODO INEXISTENTE');
				}
			} else {
				throw new Exception('CLASSE INEXISTENTE');
			}
		} catch (Exception $e) {
#			die($e->getMessage());
			header("Location: /home");exit;
		}
	}
	public function init($args=null) {
		self::__construct();
		$this->setParams();
	}
}