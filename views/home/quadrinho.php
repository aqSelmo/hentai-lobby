<!doctype html>
<html lang="en">
	<head>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/head.php"; ?>
		<meta property="og:url" content="<?=ENDERECO . "/quadrinho/listar/" . $quadrinho['q_slug']?>">
		<meta property="og:title" content="<?=($quadrinho['q_titulo'] ?: "Quadrinho não encontrado.")?>">
		<meta property="og:site_name" content="<?=ENDERECO?>">
		<meta property="og:image" content="<?=ENDERECO?>/assets/img/home/logotipo.png">
		<meta property="og:description" content="<?=strip_tags(html_entity_decode($quadrinho['q_descricao']))?>">
		<title><?=PLATAFORMA?> :: <?=($quadrinho['q_titulo'] ?: "Quadrinho não encontrado.")?></title>
	</head>
	<body>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/header.php"; ?>
		<main>
			<div class="container-fluid bg-4">
				<div class="container py-4">
<?php if(isset($quadrinho['q_id']) && $quadrinho['q_id']) { ?>
					<div class="row">
						<div class="col-md-4 mb-md-0 mb-3">
							<div id="carouselQuadrinho" class="carousel slide rounded overflow-hidden" data-ride="carousel">
								<div class="carousel-inner">
<?php foreach(explode(",", $quadrinho['arquivos']) as $key => $arquivo) { ?>
									<div class="carousel-item <?=($key == 0 ? "active" : "")?>">
										<img src="uploads/archives/<?=$quadrinho['q_id']?>/<?=$arquivo?>" class="d-block w-100" alt="<?=$quadrinho['q_titulo']?>">
									</div>
<?php } ?>
								</div>
								<a class="carousel-control-prev" href="#carouselQuadrinho" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselQuadrinho" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
						<div class="col-md-8">
							<div class="d-flex h-100 flex-column justify-content-between">
								<div class="d-block">
									<h2 class="font-weight-bold text-light mb-0"><?=$quadrinho['q_titulo']?></h2>
									<p class="text-light font-weight-light"><?=$quadrinho['q_autor']?></p>
									<div class="d-flex flex-wrap align-items-center mb-2">
<?php foreach(explode(",", $quadrinho['categorias']) as $key => $categoria) { ?>
										<div class="bg-1 px-1 py-1 rounded text-light mr-1 mb-1 text-nowrap"><?=$categoria?></div>
<?php } ?>
									</div>
									<div class="text-light">
										<?=html_entity_decode($quadrinho['q_descricao'])?>
									</div>
								</div>
								<div class="d-flex justify-content-end align-items-center">
									<span class="text-light mr-2"><i class="fas fa-eye"></i> <?=$quadrinho['q_visitas']?></span>
									<a href="home/quadrinho/visualizar/<?=$quadrinho['q_slug']?>" class="btn bg-1 text-light">Visualizar</a>
								</div>
							</div>
						</div>
					</div>
<?php if(isset($relacionados) && $relacionados) { ?>
					<div class="d-flex align-items-center justify-content-between mt-4 mb-3">
						<h3 class="font-weight-light text-light">Quadrinhos <span class="font-weight-bold">relacionados</span></h3>
						<div class="btn-group">
							<a class="btn bg-1 mr-1 text-light" onClick="slickSlider('slickPrev')"><i class="fas fa-angle-left"></i></a>
							<a class="btn bg-1 text-light" onClick="slickSlider('slickNext')"><i class="fas fa-angle-right"></i></a>
						</div>
					</div>
					<div class="scroller-relacionados">
<?php foreach($relacionados as $key => $qua) {
	require __DIR__ . DIRECTORY_SEPARATOR . "includes/destaque.php";
} ?>
					</div>
<?php }} else { ?>
					<div class="custom-alert2" role="alert"><i class="fas fa-exclamation-circle text-danger"></i> Nenhum conteúdo encontrado.</div>
<?php } ?>
				</div>
			</div>
		</main>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/footer.php"; ?>
		
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/scripts.php"; ?>
	</body>
</html>