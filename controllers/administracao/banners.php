<?php
namespace Hentailobby\Controllers\Administracao;

use Hentailobby\Controllers\Administracao\Defaults;
use Hentailobby\Models\Administracao\Banners as Model;
use Hentailobby\Classes\Filter;

class Banners extends Defaults {
	private $model;
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new Model;
	}
	public function index($args=null)
	{
		\Hentailobby\Classes\Render::view("administracao/banners", array(
			"tipos" => $this->model->tipos(13),
			"listar" => $this->model->listar()
		));
	}
	public function salvar($args=null)
	{
		$args = array(
			"id" => Filter::sanitizeInt($_POST['b_id']),
			"titulo" => Filter::sanitizeString($_POST['b_titulo']),
			"tipo" => Filter::sanitizeString($_POST['b_tipo']),
			"link" => Filter::sanitizeUrl($_POST['b_link']),
			"src" => (isset($_FILES['b_src']) ? $this->upload('banners', $_FILES['b_src']) : ""),
		);
		
		\Hentailobby\Classes\Render::view("administracao/banners", array(
			"tipos" => $this->model->tipos(13),
			"salvar" => $this->model->salvar($args),
			"listar" => $this->model->listar()
		));
	}
	public function alterar($args=null)
	{
		$args = array(
			"id" => Filter::sanitizeInt($args)
		);
		
		\Hentailobby\Classes\Render::view("administracao/banners", array(
			"tipos" => $this->model->tipos(13),
			"alterar" => $this->model->alterar($args),
			"listar" => $this->model->listar()
		));
	}
	public function excluir($args=null)
	{
		$args = array(
			"id" => Filter::sanitizeInt($args)
		);
		
		$banner = $this->model->alterar($args);
		if(isset($banner['b_src']) && $banner['b_src']) {
			$this->remove('banners', $banner['b_src']);
		}
		
		\Hentailobby\Classes\Render::view("administracao/banners", array(
			"tipos" => $this->model->tipos(13),
			"excluir" => $this->model->excluir($args),
			"listar" => $this->model->listar()
		));
	}
	public function imagem($args=null)
	{
		$args = array(
			"src" => Filter::sanitizeString($args)
		);
		if($this->remove('banners', $args['src'])) {
			$this->model->imagem($args);
		}
		
		header("Location: " . $_SERVER['HTTP_REFERER']);
		exit;
	}
}