<?php
namespace Hentailobby\Models\Administracao;

use Hentailobby\Models\Administracao\Defaults;

class Categorias extends Defaults {
	public function __construct()
	{
		parent::__construct();
	}
	public function listar($args=null)
	{
		return $this->select("SELECT * FROM categorias");
	}
	public function salvar($args=[])
	{
		return $this->query("INSERT INTO categorias (c_id, c_titulo, c_banner) VALUES (:id, :titulo, :banner) ON DUPLICATE KEY UPDATE c_titulo = :titulo, c_banner = :banner", $args);
	}
	public function alterar($args=[])
	{
		return $this->row("SELECT * FROM categorias WHERE c_id = :id", $args);
	}
	public function excluir($args=[])
	{
		return $this->query("DELETE FROM categorias WHERE c_id = :id", $args);
	}
	public function banner($args=[])
	{
		return $this->query("UPDATE categorias SET c_banner = NULL WHERE c_banner = :banner", $args);
	}
}