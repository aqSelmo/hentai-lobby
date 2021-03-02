<?php
namespace Hentailobby\Models\Administracao;

use Hentailobby\Models\Administracao\Defaults;

class Banners extends Defaults {
	public function __construct()
	{
		parent::__construct();
	}
	public function listar($args=null)
	{
		return $this->select("SELECT *, (SELECT t_titulo FROM tipos WHERE t_tipo = 13 AND t_valor = b_tipo) AS tipo FROM banners");
	}
	public function salvar($args=[])
	{
		return $this->query("INSERT INTO banners (b_id, b_tipo, b_titulo, b_link, b_src) VALUES (:id, :tipo, :titulo, :link, :src) ON DUPLICATE KEY UPDATE b_tipo = :tipo, b_titulo = :titulo, b_link = :link, b_src = :src", $args);
	}
	public function alterar($args=[])
	{
		return $this->row("SELECT * FROM banners WHERE b_id = :id", $args);
	}
	public function excluir($args=[])
	{
		return $this->query("DELETE FROM banners WHERE b_id = :id", $args);
	}
	public function imagem($args=[])
	{
		return $this->query("UPDATE banners SET b_src = NULL WHERE b_src = :src", $args);
	}
}