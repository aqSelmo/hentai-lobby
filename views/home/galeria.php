<!doctype html>
<html lang="en">
	<head>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/head.php"; ?>
		<title><?=PLATAFORMA;?> :: Galeria</title>
	</head>
	<body>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/header.php"; ?>
		<main>
			<div class="container-fluid bg-4">
				<div class="container py-3">
					<h3 class="font-weight-light text-light mb-3">Galeria</h3>
<?php if(isset($galeria) && $galeria) { ?>
					<div class="d-flex flex-wrap">
<?php foreach($galeria as $key => $foto) { ?>
						<div class="col-md-2 col-sm-4 col-6 p-1">
							<a href="uploads/gallery/<?=$foto['g_src']?>" data-fancybox="gallery">
								<div class="galeria-foto rounded" style="background-image: url(uploads/gallery/<?=$foto['g_src']?>)"></div>
							</a>
						</div>
<?php } ?>
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