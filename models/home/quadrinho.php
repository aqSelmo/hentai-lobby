<?php
namespace Hentailobby\Models\Home;

use Hentailobby\Models\Home\Defaults;

class Quadrinho extends Defaults {
	public function __construct()
	{
		parent::__construct();
	}
	public function quadrinho($args=[])
	{
		return $this->row("SELECT a.*, GROUP_CONCAT(b.a_src) AS arquivos, (SELECT GROUP_CONCAT(c_titulo) FROM categorias WHERE FIND_IN_SET(c_id, a.q_categorias)) AS categorias FROM quadrinhos a LEFT JOIN arquivos b ON a.q_id = b.a_quadrinho WHERE b.a_tipo IN(3,2) AND q_status = '1' AND q_slug = :slug", $args);
	}
	public function relacionados($args=[])
	{
		$ids = [];
        $quadrinhos = $this->select("SELECT * FROM quadrinhos WHERE q_slug != :slug", $args);
        $quadrinho = $this->quadrinho($args);
        
        foreach($quadrinhos as $key => $a){
            foreach(explode(",", $a['q_categorias']) as $b){
                if(in_array($b, explode(",", $quadrinho['q_categorias']))){
                    array_push($ids, $a['q_id']);
                }
            }
        }
		
		return $this->select("SELECT a.q_id, a.q_titulo, a.q_visitas, a.q_autor, a.q_slug, (SELECT a_src FROM arquivos WHERE a_quadrinho = a.q_id AND a_tipo = '3') AS capa FROM quadrinhos a WHERE a.q_status = '1' AND FIND_IN_SET(q_id, :quadrinhos)", array(
			"quadrinhos" => implode(",", array_unique($ids))
		));
	}
	public function categoria($args=[])
	{
		return $this->select("SELECT *, (SELECT COUNT(q_id) FROM quadrinhos WHERE FIND_IN_SET(c_id, q_categorias) AND q_status = '1') AS quadrinhos FROM categorias WHERE c_titulo LIKE :keywords OR c_slug LIKE :keywords ORDER BY c_id DESC", array(
			"keywords" => "%{$args['keywords']}%"
		));
	}
	public function quadrinhos($args=[])
	{
		$categoria = $this->single("SELECT c_id FROM categorias WHERE c_titulo LIKE :keywords OR c_slug LIKE :keywords LIMIT 1", array(
			"keywords" => "%{$args['keywords']}%"
		));
		
		return $this->select("SELECT a.q_id, a.q_titulo, a.q_visitas, a.q_autor, a.q_slug, (SELECT a_src FROM arquivos WHERE a_quadrinho = a.q_id AND a_tipo = '3') AS capa FROM quadrinhos a WHERE a.q_status = '1' AND a.q_titulo LIKE :keywords OR a.q_status = '1' AND a.q_autor LIKE :keywords OR a.q_status = '1' AND a.q_tags LIKE :keywords OR a.q_status = '1' AND a.q_slug LIKE :keywords OR a.q_status = '1' AND FIND_IN_SET(:categoria, a.q_categorias) ORDER BY q_id DESC", array(
			"keywords" => "%{$args['keywords']}%",
			"categoria" => $categoria
		));
	}
	public function arquivos($args=[])
	{
		return $this->select("SELECT a_id, a_src FROM arquivos WHERE a_quadrinho IN(SELECT q_id FROM quadrinhos WHERE q_slug = :slug)", $args);
	}
	public function visitas($args=[])
	{
		return $this->query("UPDATE quadrinhos SET q_visitas = (q_visitas + 1) WHERE q_slug = :slug", $args);
	}
}