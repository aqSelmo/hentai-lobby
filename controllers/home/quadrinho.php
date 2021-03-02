<?php
namespace Hentailobby\Controllers\Home;

use Hentailobby\Controllers\Home\Defaults;
use Hentailobby\Models\Home\Quadrinho as Model;
use Hentailobby\Classes\Filter;

class Quadrinho extends Defaults {
	private $model;
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new Model;
	}
	public function listar($args=null)
	{
		$args = array(
			"slug" => Filter::sanitizeUrl($args)
		);
		
		\Hentailobby\Classes\Render::view("home/quadrinho", array(
			"visitas" => $this->model->visitas($args),
			"quadrinho" => $this->model->quadrinho($args),
			"relacionados" => $this->model->relacionados($args),
			"categorias" => $this->model->categorias()
		));
	}
	public function visualizar($args=null)
	{
		$args = array(
			"slug" => Filter::sanitizeUrl($args)
		);
		
		\Hentailobby\Classes\Render::view("home/visualizar", array(
			"quadrinho" => $this->model->quadrinho($args),
			"arquivos" => $this->model->arquivos($args),
			"categorias" => $this->model->categorias()
		));
	}
	public function categoria($args=null)
	{
		$args = array(
			"categoria" => Filter::sanitizeUrl($args)
		);
		
		\Hentailobby\Classes\Render::view("home/categorias", array(
			"quadrinho" => $this->model->quadrinho($args),
			"categorias" => $this->model->categorias()
		));
	}
	public function buscar($args=null)
	{
		$args = array(
			"keywords" => Filter::sanitizeString($_POST['keywords'])
		);
		
		\Hentailobby\Classes\Render::view("home/buscar", array(
			"categoria" => $this->model->categoria($args),
			"quadrinhos" => $this->model->quadrinhos($args),
			"categorias" => $this->model->categorias()
		));
	}
}