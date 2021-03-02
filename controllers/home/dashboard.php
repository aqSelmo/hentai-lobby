<?php
namespace Hentailobby\Controllers\Home;

use Hentailobby\Controllers\Home\Defaults;
use Hentailobby\Models\Home\Dashboard as Model;
use Hentailobby\Classes\Filter;

class Dashboard extends Defaults {
	private $model;
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new Model;
	}
	public function index($args=null)
	{
		$args = array(
			"pagina" => (isset($args) && $args ? Filter::sanitizeInt($args) : 1)
		);
		
		\Hentailobby\Classes\Render::view("home/dashboard", array(
			"pagina" => $args['pagina'],
			"paginas" => $this->model->paginas(),
			"banners" => $this->model->banners(),
			"destaques" => $this->model->destaques(),
			"quadrinhos" => $this->model->quadrinhos($args),
			"categorias" => $this->model->categorias()
		));
	}
}