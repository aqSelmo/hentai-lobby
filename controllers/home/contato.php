<?php
namespace Hentailobby\Controllers\Home;

use Hentailobby\Controllers\Home\Defaults;
use Hentailobby\Models\Home\Contato as Model;
use PHPMailer\PHPMailer\PHPMailer;
use Hentailobby\Classes\Filter;

class Contato extends Defaults {
	public function __construct()
	{
		parent::__construct();
		$this->model = new Model;
	}
	public function index($args=null)
	{
		\Hentailobby\Classes\Render::view("home/contato", array(
			"banners" => $this->model->banners(),
			"categorias" => $this->model->categorias()
		));
	}
	public function enviar($args=null)
	{
		$args= array(
			"nome" => Filter::sanitizeString($_POST['nome']),
			"email" => Filter::sanitizeString($_POST['email']),
			"assunto" => Filter::sanitizeString($_POST['assunto']),
			"mensagem" => Filter::sanitizeString($_POST['mensagem']),
			"status" => 0
		);
		
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host       = SMTP_SERVER;
		$mail->SMTPAuth   = true;
		$mail->Username   = SMTP_USERNAME;
		$mail->Password   = SMTP_PASSWORD;
		$mail->Port       = SMTP_PORT;
		$mail->setFrom(SMTP_USERNAME, PLATAFORMA);
		$mail->addAddress('guilusa25@gmail.com', 'Guilherme Falcão');
		$mail->isHTML(true);
		$mail->Subject = 'Contato :: ' . PLATAFORMA;
		$mail->Body    = '<div><p><strong>Nome: </strong>'.$args['nome'].'</p><p><strong>E-mail: </strong>'.$args['email'].'</p><p><strong>Assunto: </strong>'.$args['assunto'].'</p><p><strong>Mensagem: </strong>'.$args['mensagem'].'</p><p><strong>IP: </strong>'.$_SERVER['HTTP_CF_CONNECTING_IP'].'</p><p><strong>Data: </strong>'.date("d/m/Y").'</p></div>';
		
		if($mail->send()){
			$args['status'] = 1;
		}
		
		\Hentailobby\Classes\Render::view("home/contato", array(
			"status" => $args['status'],
			"banners" => $this->model->banners(),
			"categorias" => $this->model->categorias()
		));
	}
	public function newsletter($args=null)
	{
		$args= array(
			"nome" => ($_POST['n_nome'] ? Filter::sanitizeString($_POST['n_nome']) : "-"),
			"email" => ($_POST['n_nome'] ? Filter::sanitizeEmail($_POST['n_email']) : Filter::sanitizeEmail($_POST['n_email_footer'])),
			"ip" => $_SERVER['HTTP_CF_CONNECTING_IP']
		);
		
		\Hentailobby\Classes\Render::view("home/contato", array(
			"newsletter" => $this->model->newsletter($args),
			"banners" => $this->model->banners(),
			"categorias" => $this->model->categorias()
		));
	}
}