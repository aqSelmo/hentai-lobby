<?php
namespace Hentailobby\Models\Home;

use Hentailobby\Classes\DbConnection;

class Defaults extends DbConnection {
	public function __construct()
	{
		parent::__construct();
	}
	public function analytics($args=[])
	{
		return $this->query("INSERT INTO analytics (a_ip, a_referer, a_request) VALUES (:ip, :referer, :request) ON DUPLICATE KEY UPDATE a_referer = :referer, a_request = :request", $args);
	}
	public function categorias($args=null)
	{
		return $this->select("SELECT c_titulo, c_slug FROM categorias ORDER BY c_id DESC");
	}
}