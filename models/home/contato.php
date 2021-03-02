<?php
namespace Hentailobby\Models\Home;

use Hentailobby\Models\Home\Defaults;

class Contato extends Defaults {
	public function __construct()
	{
		parent::__construct();
	}
	public function banners($args=null)
	{
		return $this->select("SELECT b_titulo, b_src FROM banners WHERE b_tipo = '2' ORDER BY b_id DESC");
	}
	public function newsletter($args=[])
	{
		return $this->query("INSERT INTO newsletter (n_nome, n_email, n_ip) VALUES (:nome, :email, :ip) ON DUPLICATE KEY UPDATE n_nome = :nome, n_email = :email, n_ip = :ip", $args);
	}
}