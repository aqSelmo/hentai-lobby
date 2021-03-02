<!doctype html>
<html lang="en">
	<head>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/head.php"; ?>
		<title><?=PLATAFORMA;?> :: Buscar</title>
	</head>
	<body>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/header.php"; ?>
		<main>
			<div class="container-fluid bg-2 bd-2">
				<div class="container py-3">
					<h3 class="font-weight-light text-light mb-3">Categorias <span class="font-weight-bold">relacionadas</span></h3>
<?php if(isset($categoria) && $categoria) { ?>
					<div class="row">
<?php foreach($categoria as $key => $cat) {
		require __DIR__ . DIRECTORY_SEPARATOR . "includes/categoria.php";
} ?>
					</div>
<?php } else { ?>
					<div class="custom-alert" role="alert"><i class="fas fa-exclamation-circle text-danger"></i> Nenhum conteúdo encontrado.</div>
<?php } ?>
				</div>		
			</div>
			<div class="container-fluid bg-4">
				<div class="container py-3">
					<h3 class="font-weight-light text-light mb-3">Quadrinhos <span class="font-weight-bold">relacionados</span></h3>
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
			</div>
		</main>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/footer.php"; ?>
		
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/scripts.php"; ?>
	</body>
</html>