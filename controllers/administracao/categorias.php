<?php
namespace Hentailobby\Controllers\Administracao;

use Hentailobby\Controllers\Administracao\Defaults;
use Hentailobby\Models\Administracao\Categorias as Model;
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
		\Hentailobby\Classes\Render::view("administracao/categorias", array(
			"listar" => $this->model->listar()
		));
	}
	public function salvar($args=null)
	{
		$args = array(
			"id" => Filter::sanitizeInt($_POST['c_id']),
			"titulo" => Filter::sanitizeString($_POST['c_titulo']),
			"banner" => (isset($_FILES['c_banner']) ? $this->upload('banners', $_FILES['c_banner']) : ""),
		);
		
		\Hentailobby\Classes\Render::view("administracao/categorias", array(
			"salvar" => $this->model->salvar($args),
			"listar" => $this->model->listar()
		));
	}
	public function alterar($args=null)
	{
		$args = array(
			"id" => Filter::sanitizeInt($args),
		);
		
		\Hentailobby\Classes\Render::view("administracao/categorias", array(
			"alterar" => $this->model->alterar($args),
			"listar" => $this->model->listar()
		));
	}
	public function excluir($args=null)
	{
		$args = array(
			"id" => Filter::sanitizeInt($args),
		);
		
		$categoria = $this->model->alterar($args);
		if(isset($categoria['c_banner']) && $categoria['c_banner']) {
			$this->remove('banners', $categoria['c_banner']);
		}
		
		\Hentailobby\Classes\Render::view("administracao/categorias", array(
			"excluir" => $this->model->excluir($args),
			"listar" => $this->model->listar()
		));
	}
	public function banner($args=null)
	{
		$args = array(
			"banner" => Filter::sanitizeString($args)
		);
		if($this->remove('banners', $args['banner'])) {
			$this->model->banner($args);
		}
		
		header("Location: " . $_SERVER['HTTP_REFERER']);
		exit;
	}
}