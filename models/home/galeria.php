<?php
namespace Hentailobby\Models\Home;

use Hentailobby\Models\Home\Defaults;

class Galeria extends Defaults {
	public function __construct()
	{
		parent::__construct();
	}
	public function galeria($args=null)
	{
		return $this->select("SELECT * FROM galeria ORDER BY RAND()");
	}
}