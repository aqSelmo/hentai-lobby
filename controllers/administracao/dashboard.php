<?php
namespace Hentailobby\Controllers\Administracao;

use Hentailobby\Controllers\Administracao\Defaults;
use Hentailobby\Models\Administracao\Dashboard as Model;

class Dashboard extends Defaults {
	private $model;
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new Model;
	}
	public function index($args=null)
	{
		\Hentailobby\Classes\Render::view("administracao/dashboard", NULL);
	}
	public function analytics($args=null)
	{
		$data = [];
		
		foreach($this->model->analytics() as $key => $a) {
			array_push($data, $a);
		}
		
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	public function quadrinhos($args=null)
	{
		$data = [];
		
		foreach($this->model->quadrinhos() as $key => $a) {
			array_push($data, $a);
		}
		
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}