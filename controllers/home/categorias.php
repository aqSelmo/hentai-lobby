<?php
namespace Hentailobby\Controllers\Home;

use Hentailobby\Controllers\Home\Defaults;
use Hentailobby\Models\Home\Categorias as Model;
use Hentailobby\Classes\Filter;

class Categorias extends Defaults {
	private $model;
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new Model;
	}
	public function index($args=null)
	{
		\Hentailobby\Classes\Render::view("home/categorias", array(
			"categorias" => $this->model->categorias()
		));
	}
	public function visualizar($args=null)
	{
		$args = array(
			"slug" => Filter::sanitizeUrl($args)
		);
		
		\Hentailobby\Classes\Render::view("home/categoria", array(
			"categoria" => $this->model->categoria($args),
			"quadrinhos" => $this->model->quadrinhos($args),
			"categorias" => $this->model->categorias()
		));
	}
}