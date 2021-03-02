<?php
namespace Hentailobby\Models\Home;

use Hentailobby\Models\Home\Defaults;

class Categorias extends Defaults {
	public function __construct()
	{
		parent::__construct();
	}
	public function categorias($args=null)
	{
		return $this->select("SELECT *, (SELECT COUNT(q_id) FROM quadrinhos WHERE FIND_IN_SET(c_id, q_categorias) AND q_status = '1') AS quadrinhos FROM categorias ORDER BY c_id DESC");
	}
	public function categoria($args=null)
	{
		return $this->row("SELECT * FROM categorias WHERE c_slug = :slug", $args);
	}
	public function quadrinhos($args=[])
	{
		return $this->select("SELECT a.*, GROUP_CONCAT(b.a_src) AS arquivos, (SELECT GROUP_CONCAT(c_titulo) FROM categorias WHERE FIND_IN_SET(c_id, a.q_categorias)) AS categorias FROM quadrinhos a LEFT JOIN arquivos b ON a.q_id = b.a_quadrinho WHERE b.a_tipo IN(3,2) AND q_status = '1' AND FIND_IN_SET((SELECT c_id FROM categorias WHERE c_slug = :slug LIMIT 1), q_categorias) GROUP BY a.q_id", $args);
	}
}