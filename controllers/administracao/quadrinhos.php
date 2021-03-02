<?php
namespace Hentailobby\Controllers\Administracao;

use Hentailobby\Controllers\Administracao\Defaults;
use Hentailobby\Models\Administracao\Quadrinhos as Model;
use Hentailobby\Classes\Filter;

class Quadrinhos extends Defaults {
	private $model;
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new Model;
	}
	public function index($args=null)
	{
		\Hentailobby\Classes\Render::view("administracao/quadrinhos", array(
			"categorias" => $this->model->categorias(),
			"listar" => $this->model->listar()
		));
	}
	public function salvar($args=null)
	{
		$args = array(
			"id" => Filter::sanitizeInt($_POST['q_id']),
			"titulo" => Filter::sanitizeString($_POST['q_titulo']),
			"autor" => Filter::sanitizeString($_POST['q_autor']),
			"categorias" => implode(",", $_POST['q_categorias']),
			"tags" => Filter::sanitizeString($_POST['q_tags']),
			"status" => (isset($_POST['q_status']) ? Filter::sanitizeString($_POST['q_status']) : '2'),
			"descricao" => Filter::sanitizeHTML($_POST['q_descricao']),
			"colaborador" => $_SESSION['@Hentalobby::id'],
			"destaque" => (isset($_POST['q_destaque']) ? Filter::sanitizeInt($_POST['q_destaque']) : 0)
		);
		
		$quadrinho = $this->model->salvar($args);

		if($quadrinho && isset($_FILES['arquivos']['tmp_name'])) {
			$id = ($args['id'] ?: $quadrinho);
			$args = array(
				"quadrinho" => $id,
				"arquivos" => $this->multiple("archives/{$id}", $_FILES['arquivos'])
			);
			$this->model->arquivos($args);
		}
		
		\Hentailobby\Classes\Render::view("administracao/quadrinhos", array(
			"categorias" => $this->model->categorias(),
			"salvar" => $quadrinho,
			"listar" => $this->model->listar()
		));
	}
	public function alterar($args=null)
	{
		$args = array(
			"id" => Filter::sanitizeInt($args)
		);
		
		\Hentailobby\Classes\Render::view("administracao/quadrinhos", array(
			"arquivos" => $this->model->listarArquivos($args),
			"categorias" => $this->model->categorias(),
			"tipos" => $this->model->tipos(1),
			"alterar" => $this->model->alterar($args),
			"listar" => $this->model->listar()
		));
	}
	public function excluir($args=null)
	{
		$args = array(
			"id" => Filter::sanitizeInt($args)
		);
		
		$arquivos = $this->model->listarArquivos($args);
		if(isset($arquivos) && $arquivos) {
			foreach($arquivos as $key => $arquivo) {
				$this->remove("archives/" . $args['id'], $arquivo['a_src']);
			}
			$this->removePath("archives/" . $args['id']);
		}
		
		\Hentailobby\Classes\Render::view("administracao/quadrinhos", array(
			"categorias" => $this->model->categorias(),
			"tipos" => $this->model->tipos(1),
			"excluir" => $this->model->excluir($args),
			"listar" => $this->model->listar()
		));
	}
	public function arquivosList($args=null)
	{
		$data = [];
		
		$response = $this->model->listarArquivos();
		foreach($response as $key => $res) {
			array_push($data, array(
				"id" => $res['a_id'],
				"tipo" => $res['a_tipo'],
				"tipo_text" => $res['tipo'],
			));
		}
		
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	public function arquivosRemove($args=null)
	{
		$args = array(
			"id" => Filter::sanitizeInt($_POST['id'])
		);
		
		$quadrinho = $this->model->listarArquivo($args);
		if(isset($quadrinho) && $quadrinho){
			if($this->remove("archives/" . $quadrinho['a_quadrinho'], $quadrinho['a_src'])){
				$this->model->excluirArquivo($args);
			}
		}
		
		header('Content-Type: application/json');
		echo json_encode(array(
			"status" => 1
		));
	}
	public function arquivosAction($args=null)
	{
		$args = array(
			"id" => Filter::sanitizeInt($_POST['id']),
			"tipo" => Filter::sanitizeInt($_POST['tipo'])
		);
		
		$data = [];
		
		$response = $this->model->actionArquivos($args);
		if(isset($response) && $response){
			array_push($data, array(
				"status" => "OK"
			));
		}
		
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}