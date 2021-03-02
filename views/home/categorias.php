<!doctype html>
<html lang="en">
	<head>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/head.php"; ?>
		<title><?=PLATAFORMA;?> :: Categorias</title>
	</head>
	<body>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/header.php"; ?>
		<main>
			<div class="container-fluid bg-4">
				<div class="container py-3">
					<h3 class="font-weight-light text-light mb-3">Categorias</h3>
<?php if(isset($categorias) && $categorias) { ?>
					<div class="row">
<?php foreach($categorias as $key => $cat) {
		require __DIR__ . DIRECTORY_SEPARATOR . "includes/categoria.php";
} ?>
					</div>
<?php } else { ?>
					<div class="custom-alert" role="alert"><i class="fas fa-exclamation-circle text-danger"></i> Nenhum conteúdo encontrado.</div>
<?php } ?>
				</div>		
			</div>
		</main>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/footer.php"; ?>
		
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/scripts.php"; ?>
	</body>
</html>