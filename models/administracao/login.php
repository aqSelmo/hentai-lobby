<?php
namespace Hentailobby\Models\Administracao;

use Hentailobby\Classes\DbConnection;

class Login extends DbConnection {
	public function __construct()
	{
		parent::__construct();
	}
	public function entrar($args=[])
	{
		return $this->row("SELECT a_id AS id, a_login AS login, a_nome AS nome, a_email AS email FROM administracao WHERE a_login = :login AND a_senha = :senha", $args);
	}
	public function salvar($args=[])
	{
		return $this->query("INSERT INTO colaboradores (c_nome, c_nascimento, c_login, c_senha, c_email) VALUES (:nome, :nascimento, :login, :senha, :email)", $args);
	}
}