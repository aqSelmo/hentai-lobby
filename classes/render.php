<?php
namespace Hentailobby\Classes;

class Render {
	static function view($path, $args) {
		if(isset($args) && $args) {
			foreach($args as $key=> $a){
				$$key = $a;
			}	
		}
		return require_once __DIR__ . DIRECTORY_SEPARATOR . "../views/" . $path . ".php";
	}
}