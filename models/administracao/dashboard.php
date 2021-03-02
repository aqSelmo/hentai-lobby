<?php
namespace Hentailobby\Models\Administracao;

use Hentailobby\Models\Administracao\Defaults;

class Dashboard extends Defaults {
	public function __construct()
	{
		parent::__construct();
	}
	public function analytics($args=null)
	{
		return $this->select("SELECT COUNT(a_id) AS janeiro, (SELECT COUNT(a_id) FROM analytics WHERE MONTH(created_at) = 2) AS fevereiro, (SELECT COUNT(a_id) FROM analytics WHERE MONTH(created_at) = 3) AS marco, (SELECT COUNT(a_id) FROM analytics WHERE MONTH(created_at) = 4) AS abril, (SELECT COUNT(a_id) FROM analytics WHERE MONTH(created_at) = 5) AS maio, (SELECT COUNT(a_id) FROM analytics WHERE MONTH(created_at) = 6) AS junho, (SELECT COUNT(a_id) FROM analytics WHERE MONTH(created_at) = 7) AS julho, (SELECT COUNT(a_id) FROM analytics WHERE MONTH(created_at) = 8) AS agosto, (SELECT COUNT(a_id) FROM analytics WHERE MONTH(created_at) = 9) AS setembro, (SELECT COUNT(a_id) FROM analytics WHERE MONTH(created_at) = 10) AS outubro, (SELECT COUNT(a_id) FROM analytics WHERE MONTH(created_at) = 11) AS novembro, (SELECT COUNT(a_id) FROM analytics WHERE MONTH(created_at) = 12) AS dezembro FROM analytics WHERE MONTH(created_at) = 1 LIMIT 1");
	}
	public function quadrinhos($args=null)
	{
		return $this->select("SELECT q_titulo, q_visitas FROM quadrinhos ORDER BY q_visitas DESC");
	}
}