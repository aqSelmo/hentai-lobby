<!doctype html>
<html lang="en">
	<head>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/head.php"; ?>
		<meta property="og:url" content="<?=ENDERECO . "/quadrinho/listar/" . $quadrinho['q_slug']?>">
		<meta property="og:title" content="<?=($quadrinho['q_titulo'] ?: "Quadrinho não encontrado.")?>">
		<meta property="og:site_name" content="<?=ENDERECO?>">
		<meta property="og:image" content="<?=ENDERECO?>/assets/img/home/logotipo.png">
		<meta property="og:description" content="<?=$quadrinho['q_descricao']?>">
		<title><?=PLATAFORMA;?> :: <?=($quadrinho['q_titulo'] ?: "Quadrinho não encontrado.")?></title>
	</head>
	<body>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/header.php"; ?>
		<main>
			<div class="container-fluid bg-4">
				<div class="container py-3">
<?php if(isset($quadrinho) && $quadrinho) { ?>
					<div class="d-flex flex-md-row flex-column align-items-md-center justify-content-between mb-md-0 mb-3">
						<div class="d-block mb-3">
							<h3 class="font-weight-bold mb-1 text-light"><?=$quadrinho['q_titulo']?></h3>
							<p class="font-weight-light text-light mb-0"><?=$quadrinho['q_titulo']?></p>
						</div>
						<span class="font-weight-light text-light"><?=count($arquivos)?> Páginas</span>
					</div>
<?php if(isset($arquivos) && $arquivos) { ?>
					<div class="row">
<?php foreach($arquivos as $key => $arquivo) { ?>
						<div class="col-md-6">
							<a href="uploads/archives/<?=$quadrinho['q_id']?>/<?=$arquivo['a_src']?>" data-caption="<?=$quadrinho['q_titulo']?> - Pág. <?=($key + 1)?>" data-fancybox="gallery">
								<div class="mb-3 rounded overflow-hidden">
									<img class="img-fluid" src="uploads/archives/<?=$quadrinho['q_id']?>/<?=$arquivo['a_src']?>">
								</div>
							</a>
						</div>
<?php } ?>
					</div>
<?php } else { ?>
					<div class="custom-alert2" role="alert"><i class="fas fa-exclamation-circle text-danger"></i> Nenhum arquivo encontrado.</div>
<?php }} else { ?>
					<div class="custom-alert2" role="alert"><i class="fas fa-exclamation-circle text-danger"></i> Nenhum quadrinho encontrado.</div>
<?php } ?>
				</div>
			</div>
		</main>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/footer.php"; ?>
		
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/scripts.php"; ?>
	</body>
</html>