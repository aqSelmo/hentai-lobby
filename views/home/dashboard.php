<!doctype html>
<html lang="en">
	<head>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/head.php"; ?>
		<title><?=PLATAFORMA;?> :: O seu site de Hentai</title>
	</head>
	<body>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/header.php"; ?>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/carousel.php"; ?>
		<main>
			<div class="container-fluid bg-2">
				<div class="container py-3">
					<h3 class="font-weight-light text-light mb-3">Quadrinhos em <span class="font-weight-bold">destaque</span></h3>
<?php if(isset($destaques) && $destaques) { ?>
					<div class="scroller-destaques">
<?php foreach($destaques as $key => $qua) {
			require __DIR__ . DIRECTORY_SEPARATOR . "includes/destaque.php";
} ?>
					</div>
<?php } else { ?>
					<div class="custom-alert" role="alert"><i class="fas fa-exclamation-circle text-danger"></i> Nenhum conteúdo encontrado.</div>
<?php } ?>
				</div>		
			</div>
			<div class="container-fluid bg-4">
				<div class="container py-3">
					<h3 class="font-weight-light text-light mb-3">Quadrinhos <span class="font-weight-bold">recentes</span></h3>
<?php if(isset($quadrinhos) && $quadrinhos) { ?>
					<div class="row">
<?php foreach($quadrinhos as $key => $qua) {
		require __DIR__ . DIRECTORY_SEPARATOR . "includes/quadrinho.php";
 } ?>
					</div>
<?php } else { ?>
					<div class="custom-alert2" role="alert"><i class="fas fa-exclamation-circle text-danger"></i> Nenhum conteúdo encontrado.</div>
<?php } ?>
				</div>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/pagination.php"; ?>
			</div>
		</main>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/footer.php"; ?>
		
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/scripts.php"; ?>
	</body>
</html>