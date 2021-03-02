<?php
namespace Hentailobby\Models\Administracao;

use Hentailobby\Models\Administracao\Defaults;

class Administracao extends Defaults {
	public function __construct()
	{
		parent::__construct();
	}
	public function listar($args=null)
	{
		return $this->select("SELECT a_id, a_nome, a_login, a_email FROM administracao ORDER BY a_id DESC");
	}
	public function salvar($args=[])
	{
		return $this->query("INSERT INTO administracao (a_id, a_nome, a_nascimento, a_login, a_senha, a_avatar, a_email, a_status) VALUES (:id, :nome, :nascimento, :login, :senha, :avatar, :email, :status) ON DUPLICATE KEY UPDATE a_nome = :nome, a_nascimento = :nascimento, a_login = :login, a_senha = :senha, a_avatar = :avatar, a_email = :email, a_status = :status", $args);
	}
	public function alterar($args=[])
	{
		return $this->row("SELECT * FROM administracao WHERE a_id = :id ORDER BY a_id DESC", $args);
	}
	public function avatar($args=[])
	{
		return $this->query("UPDATE administracao SET a_avatar = NULL WHERE a_avatar = :avatar", $args);
	}
}