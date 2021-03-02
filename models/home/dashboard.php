<?php
namespace Hentailobby\Models\Home;

use Hentailobby\Models\Home\Defaults;

class Dashboard extends Defaults {
	private $limite = 12;
	
	public function __construct()
	{
		parent::__construct();
	}
	public function banners($args=null)
	{
		return $this->select("SELECT b_titulo, b_src FROM banners WHERE b_tipo = '1' ORDER BY b_id DESC");
	}
	public function destaques($args=null)
	{
		return $this->select("SELECT a.q_id, a.q_titulo, a.q_visitas, a.q_autor, a.q_slug, (SELECT a_src FROM arquivos WHERE a_quadrinho = a.q_id AND a_tipo = '3') AS capa FROM quadrinhos a WHERE a.q_status = '1' AND q_destaque = 1 ORDER BY q_id DESC");
	}
	public function quadrinhos($args=[])
	{
		return $this->select("SELECT a.q_id, a.q_titulo, a.q_visitas, a.q_autor, a.q_slug, (SELECT a_src FROM arquivos WHERE a_quadrinho = a.q_id AND a_tipo = '3') AS capa FROM quadrinhos a WHERE a.q_status = '1' ORDER BY q_id DESC LIMIT ".(($this->limite * $args['pagina']) - $this->limite).", " . $this->limite);
	}
	public function paginas($args=[])
	{
		return ceil(($this->single("SELECT COUNT(q_id) FROM quadrinhos WHERE q_status = '1'")) / $this->limite);
	}
}