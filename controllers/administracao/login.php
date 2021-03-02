<?php
namespace Hentailobby\Controllers\Administracao;

use Hentailobby\Models\Administracao\Login as Model;
use Hentailobby\Classes\Filter;

class Login {
	private $model;
	private $session;
	
	public function __construct()
	{
		session_start();
		$this->model = new Model;
	}
	public function index($args=null)
	{
		\Hentailobby\Classes\Render::view("administracao/login", array(
			"sessao" => $this->checkSession()
		));
	}
	public function entrar($args=null)
	{
		$args = array(
			"login" => Filter::sanitizeString($_POST['a_login']),
			"senha" => Filter::sanitizeString(md5($_POST['a_senha'])),
		);
		
		$this->session = $this->model->entrar($args);
		
		if($this->session) {
			$_SESSION['@Hentalobby::login'] = $this->session['login'];
			$_SESSION['@Hentalobby::id'] = $this->session['id'];
			$_SESSION['@Hentalobby::email'] = $this->session['email'];
			
			foreach($this->session as $key => $value) {
				define(strtoupper($key), $value);
			}
			
			header("Location: /administracao/dashboard");
			exit;
		} else {
			\Hentailobby\Classes\Render::view("administracao/login", array(
				"status" => 0
			));
		}
	}
	public function sair($args=null)
	{
		if(isset($_SESSION['@Hentalobby::login']) && $_SESSION['@Hentalobby::login']){
			session_destroy();
		}
		
		header("Location: /administracao");
		exit;
	}
	public function salvar($args=null)
	{
		$args = array(
			"nome" => Filter::sanitizeString($_POST['c_nome']),
			"nascimento" => Filter::sanitizeString($_POST['c_nascimento']),
			"email" => Filter::sanitizeEmail($_POST['c_email']),
			"login" => Filter::sanitizeString($_POST['c_login']),
			"senha" => Filter::sanitizeString(md5($_POST['c_senha']))
		);
		
		\Hentailobby\Classes\Render::view("administracao/login", array(
			"salvar" => $this->model->salvar($args)
		));
	}
	public function checkSession($args=null)
	{
		if(isset($_SESSION['@Hentalobby::login']) && $_SESSION['@Hentalobby::login']) {
			header("Location: /administracao/dashboard");
			exit;
		}
	}
}