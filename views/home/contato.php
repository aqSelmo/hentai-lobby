<!doctype html>
<html lang="en">
	<head>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/head.php"; ?>
		<title><?=PLATAFORMA;?> :: Contato</title>
	</head>
	<body>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/header.php"; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/carousel.php"; ?>
		<main>
			<div class="container-fluid bg-4">
				<div class="container py-3">
					<h3 class="font-weight-light text-light mb-3">Fale conosco</h3>
<?php if(isset($status) && $status) { ?>
					<div class="custom-alert2" role="alert"><i class="far fa-check-circle text-success"></i> Mesangem enviada com sucesso.</div>
<?php } ?>
					<form method="post" enctype="application/x-www-form-urlencoded" action="home/contato/enviar">
						<div class="row">
							<div class="col-sm-6">
								<div class="input-group mb-3 border rounded bd-1">
									<div class="input-group-prepend">
										<span class="input-group-text bg-2 border-0" aria-label="nome"><i class="fas fa-user-circle"></i></span>
									</div>
									<input type="text" name="nome" class="form-control bg-2 border-0" autocomplete="off" placeholder="Digite seu nome" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group mb-3 border rounded bd-1">
									<div class="input-group-prepend">
										<span class="input-group-text bg-2 border-0" aria-label="email"><i class="fas fa-envelope"></i></span>
									</div>
									<input type="email" name="email" class="form-control bg-2 border-0" autocomplete="off" placeholder="Digite seu email" required>
								</div>
							</div>
							<div class="col-12">
								<div class="input-group mb-3 border rounded bd-1">
									<div class="input-group-prepend">
										<span class="input-group-text bg-2 border-0" aria-label="assunto"><i class="fas fa-comment-alt"></i></span>
									</div>
									<input type="text" name="assunto" class="form-control bg-2 border-0" autocomplete="off" placeholder="Digite o assunto" required>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<textarea class="form-control bg-2 bd-1" name="mensagem" placeholder="Mensagem"></textarea>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-block bg-1 text-light mb-3">ENVIAR</button>
					</form>
					<div class="w-100 py-2 bd-3"></div>
					<h3 class="font-weight-light text-light mb-3">Assinar newsletter</h3>
<?php if(isset($newsletter) && $newsletter) { ?>
					<div class="custom-alert2" role="alert"><i class="far fa-check-circle text-success"></i> Newsletter criada com sucesso.</div>
<?php } ?>
					<form method="post" enctype="application/x-www-form-urlencoded" action="home/contato/newsletter">
						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="input-group border rounded bd-1 mb-lg-0 mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text bg-2 border-0" aria-label="n_nome"><i class="fas fa-user"></i></span>
									</div>
									<input type="text" name="n_nome" class="form-control bg-2 border-0" autocomplete="off" placeholder="Digite seu nome" required>
								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="input-group border rounded bd-1 mb-lg-0 mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text bg-2 border-0" aria-label="n_email"><i class="fas fa-envelope"></i></span>
									</div>
									<input type="email" name="n_email" class="form-control bg-2 border-0" autocomplete="off" placeholder="Digite seu email" required>
								</div>
							</div>
							<div class="col-lg-4">
								<button type="submit" class="btn bg-1 btn-block text-light">ASSINAR</button>
							</div>
						</div>
					</form>
				</div>		
			</div>
		</main>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/footer.php"; ?>
		
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/scripts.php"; ?>
	</body>
</html>