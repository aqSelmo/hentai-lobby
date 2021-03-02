<?php
namespace Hentailobby\Controllers\Administracao;

use Hentailobby\Controllers\Administracao\Defaults;
use Hentailobby\Models\Administracao\Administracao as Model;
use Hentailobby\Classes\Filter;

class Administracao extends Defaults {
	private $model;
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new Model;
	}
	public function index($args=null)
	{
		\Hentailobby\Classes\Render::view("administracao/administracao", array(
			"status" => $this->model->tipos(1),
			"listar" => $this->model->listar()
		));
	}
	public function alterar($args=null)
	{
		$args = array(
			"id" => Filter::sanitizeInt($args)
		);
		
		\Hentailobby\Classes\Render::view("administracao/administracao", array(
			"status" => $this->model->tipos(1),
			"listar" => $this->model->listar(),
			"alterar" => $this->model->alterar($args)
		));
	}
	public function salvar($args=null)
	{
		$args = array(
			"id" => Filter::sanitizeInt($_POST['a_id']),
			"nome" => Filter::sanitizeString($_POST['a_nome']),
			"nascimento" => Filter::sanitizeString($_POST['a_nascimento']),
			"login" => Filter::sanitizeString($_POST['a_login']),
			"senha" => (isset($_POST['a_senha']) && $_POST['a_senha'] ? md5($_POST['a_senha']) : ""),
			"avatar" => (isset($_FILES['a_avatar']) ? $this->upload('avatars', $_FILES['a_avatar']) : ""),
			"email" => Filter::sanitizeEmail($_POST['a_email']),
			"status" => Filter::sanitizeString($_POST['a_status'])
		);
		
		\Hentailobby\Classes\Render::view("administracao/administracao", array(
			"status" => $this->model->tipos(1),
			"salvar" => $this->model->salvar($args),
			"listar" => $this->model->listar()
		));
	}
	public function avatar($args=null)
	{
		$args = array(
			"avatar" => Filter::sanitizeString($args)
		);
		if($this->remove('avatars', $args['avatar'])) {
			$this->model->avatar($args);
		}
		
		header("Location: " . $_SERVER['HTTP_REFERER']);
		exit;
	}
}