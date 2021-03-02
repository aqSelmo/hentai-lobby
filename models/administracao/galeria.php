<?php
namespace Hentailobby\Models\Administracao;

use Hentailobby\Models\Administracao\Defaults;

class Galeria extends Defaults {
	public function __construct()
	{
		parent::__construct();
	}
	public function listar($args=null)
	{
		return $this->select("SELECT * FROM galeria ORDER BY g_id DESC");
	}
	public function salvar($args=[])
	{
		foreach($args['src'] as $key => $foto) {
			$this->query("INSERT INTO galeria (g_src, g_colaborador) VALUES (:src, :colaborador)", array(
				"src" => $foto,
				"colaborador" => $args['colaborador']
			));
		}
		return true;
	}
	public function alterar($args=[])
	{
		return $this->row("SELECT * FROM galeria WHERE g_id = :id", $args);
	}
	public function excluir($args=[])
	{
		return $this->query("DELETE FROM galeria WHERE g_id = :id", $args);
	}
}