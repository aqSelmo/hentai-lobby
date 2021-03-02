<?php
namespace Hentailobby\Controllers\Administracao;

use Hentailobby\Controllers\Administracao\Defaults;
use Hentailobby\Models\Administracao\Galeria as Model;
use Hentailobby\Classes\Filter;

class Galeria extends Defaults {
	private $model;
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new Model;
	}
	public function index($args=null)
	{
		\Hentailobby\Classes\Render::view("administracao/galeria", array(
			"listar" => $this->model->listar()
		));
	}
	public function salvar($args=null)
	{
		$args = array(
			"src" => $this->multiple('gallery', $_FILES['g_src']),
			"colaborador" => $_SESSION['@Hentalobby::id']
		);
		
		\Hentailobby\Classes\Render::view("administracao/galeria", array(
			"salvar" => $this->model->salvar($args),
			"listar" => $this->model->listar()
		));
	}
	public function excluir($args=null)
	{
		$args = array(
			"id" => Filter::sanitizeInt($_POST['id']),
		);
		
		$arquivo = $this->model->alterar($args);
		if(isset($arquivo) && $arquivo){
			if($this->remove("gallery/", $arquivo['g_src'])){
				$this->model->excluir($args);
			}
		}
		
		header('Content-Type: application/json');
		echo json_encode(array(
			"status" => 1
		));
	}
}