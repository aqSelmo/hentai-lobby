<?php
namespace Hentailobby\Models\Administracao;

use Hentailobby\Models\Administracao\Defaults;

class Quadrinhos extends Defaults {
	public function __construct()
	{
		parent::__construct();
	}
	public function listar($args=null)
	{
		return $this->select("SELECT q_id, q_titulo, q_autor, q_colaborador, (SELECT a_nome FROM administracao WHERE a_id = q_colaborador) AS colaborador, (SELECT t_titulo FROM tipos WHERE t_tipo = 1 AND t_valor = q_status) AS status, IF(q_status = 1, 'btn-success', IF(q_status = 2, 'btn-warning', 'btn-danger')) AS status_bg FROM quadrinhos");
	}
	public function listarArquivos($args=[])
	{
		if($args){
			return $this->select("SELECT * FROM arquivos WHERE a_quadrinho = :id", $args);	
		}
		return $this->select("SELECT a.a_id, a.a_tipo, b.t_titulo AS tipo FROM arquivos a LEFT JOIN tipos b ON a.a_tipo = b.t_valor WHERE b.t_tipo = 9 ORDER BY a.a_id DESC");	
	}
	public function listarArquivo($args=[])
	{
		return $this->row("SELECT a_quadrinho, a_src FROM arquivos WHERE a_id = :id", $args);
	}
	public function excluirArquivo($args=[])
	{
		return $this->query("DELETE FROM arquivos WHERE a_id = :id", $args);
	}
	public function actionArquivos($args=[])
	{
		$quadrinhoAtual = $this->row("SELECT a_tipo, a_quadrinho FROM arquivos WHERE a_id = :id", array(
			"id" => $args['id']
		));
		$capa = $this->single("SELECT a_id FROM arquivos WHERE a_tipo = '3' AND a_quadrinho = :quadrinho", array(
			"quadrinho" => $quadrinhoAtual['a_quadrinho']
		));
		$thumbnails = $this->single("SELECT COUNT(a_id) FROM arquivos WHERE a_tipo = '2' AND a_quadrinho = :quadrinho", array(
			"quadrinho" => $quadrinhoAtual['a_quadrinho']
		));
		
		if($quadrinhoAtual['a_tipo'] == $args['tipo']) {
			return $this->query("UPDATE arquivos SET a_tipo = '1' WHERE a_id = :id", array(
				"id" => $args['id']
			));
		} else {
			if($args['tipo'] == 3){
				if(isset($capa) && $capa) {
					$this->query("UPDATE arquivos SET a_tipo = '1' WHERE a_id = :id", array(
						"id" => $capa
					));
				}
				return $this->query("UPDATE arquivos SET a_tipo = '3' WHERE a_id = :id AND a_quadrinho = :quadrinho", array(
					"id" => $args['id'],
					"quadrinho" => $quadrinhoAtual['a_quadrinho']
				));
			} else if($args['tipo'] == 2) {
				if((int)$thumbnails >= 3){
					$this->query("UPDATE arquivos SET a_tipo = '1' WHERE a_quadrinho = :quadrinho AND a_tipo = '2' ORDER BY updated_at LIMIT 1", array(
						"quadrinho" => $quadrinhoAtual['a_quadrinho']
					));
				}
				return $this->query("UPDATE arquivos SET a_tipo = '2' WHERE a_id = :id", array(
					"id" => $args['id']
				));
			}
		}
	}
	public function salvar($args=[])
	{
		return $this->query("INSERT INTO quadrinhos (q_id, q_titulo, q_autor, q_categorias, q_tags, q_status, q_descricao, q_colaborador, q_destaque) VALUES (:id, :titulo, :autor, :categorias, :tags, :status, :descricao, :colaborador, :destaque) ON DUPLICATE KEY UPDATE q_titulo = :titulo, q_autor = :autor, q_categorias = :categorias, q_tags = :tags, q_status = :status, q_descricao = :descricao, q_destaque = :destaque", $args);
	}
	public function arquivos($args=[])
	{
		foreach($args['arquivos'] as $i => $src) {
			$this->query("INSERT INTO arquivos (a_quadrinho, a_tipo, a_src) VALUES (:quadrinho, :tipo, :src)", array(
				"quadrinho" => $args['quadrinho'],
				"tipo" => ($i == 0 ? "3" : (in_array($i, array(1,2,3)) ? "2" : "1")),
				"src" => $src
			));
		}
		
		return true;
	}
	public function alterar($args=[])
	{
		return $this->row("SELECT * FROM quadrinhos WHERE q_id = :id", $args);
	}
	public function excluir($args=[])
	{
		return $this->query("DELETE FROM quadrinhos WHERE q_id = :id", $args);
	}
	public function categorias($args=null)
	{
		return $this->select("SELECT c_id, c_titulo FROM categorias");
	}
}