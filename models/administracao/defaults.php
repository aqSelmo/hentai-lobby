<?php
namespace Hentailobby\Models\Administracao;

use Hentailobby\Classes\DbConnection;

class Defaults extends DbConnection {
	public function __construct()
	{
		parent::__construct();
	}
	public function tipos($args=null)
	{
		return $this->select("SELECT * FROM tipos WHERE t_tipo = :tipo", array(
			"tipo" => $args
		));
	}
}