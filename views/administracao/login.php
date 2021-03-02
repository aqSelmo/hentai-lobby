<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<base href="http://localhost/">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/admin.css?<?=mt_rand()?>">
		<title>Hentai Lobby :: Administração :: Login</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-3 px-0">
					<div class="login-box bg-2">
						<div class="px-4">
							<div class="d-flex justify-content-center">
								<img class="mb-4" width="200" src="assets/img/administracao/logotipo2.png">
							</div>
<?php if(isset($status) && !$status) { ?>
							<div class="alert alert-danger small text-center" role="alert">Usuário e/ou senha inválido(s)</div>
<?php } ?>
							<form method="post" enctype="application/x-www-form-urlencoded" action="administracao/login/entrar">
								<div class="input-group mb-3 border rounded bd-1">
									<div class="input-group-prepend">
										<span class="input-group-text bg-2 border-0" aria-label="a_login"><i class="fas fa-user-circle"></i></span>
									</div>
									<input type="text" name="a_login" class="form-control bg-2 border-0" autocomplete="off" placeholder="Digite seu login" required>
								</div>
								<div class="input-group mb-3 border rounded bd-1">
									<div class="input-group-prepend">
										<span class="input-group-text bg-2 border-0" aria-label="a_senha"><i class="fas fa-lock"></i></span>
									</div>
									<input type="password" name="a_senha" class="form-control bg-2 border-0" placeholder="Digite sua senha" required>
								</div>
								<button type="submit" class="btn btn-block bg-1 text-light font-weight-bold mb-3">ENTRAR</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-9 px-0">
					<div id="carouselLogin" class="carousel slide" data-ride="carousel" data-pause="false" data-interval="8000">
						<div class="carousel-inner">
<?php for($i = 1;$i <= 3;$i++) { ?>
							<div class="carousel-item <?=($i == 1 ? "active" : "")?>" style="background-image: url(assets/img/administracao/bg_<?=$i?>.jpg)"></div>
<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
		<script src="https://kit.fontawesome.com/ecb1a9c00a.js" crossorigin="anonymous"></script>
		<script src="assets/js/administracao/scripts.js?<?=mt_rand()?>"></script>
	</body>
</html>