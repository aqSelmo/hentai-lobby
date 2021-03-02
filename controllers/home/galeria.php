<?php
namespace Hentailobby\Controllers\Home;

use Hentailobby\Controllers\Home\Defaults;
use Hentailobby\Models\Home\Galeria as Model;

class Galeria extends Defaults {
	private $model;
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new Model;
	}
	public function index($args=null)
	{
		\Hentailobby\Classes\Render::view("home/galeria", array(
			"galeria" => $this->model->galeria(),
			"categorias" => $this->model->categorias()
		));
	}
}