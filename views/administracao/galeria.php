<!doctype html>
<html lang="en">
	<head>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/head.php" ?>
		<title>Hentai Lobby :: Administração :: Galeria</title>
	</head>
	<body>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/header.php" ?>
		<main>
			<div class="container-admin">
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/navbar.php" ?>
				<div class="container-admin-content">
					<div class="container-fluid py-3">
						<div class="card border-0 mb-3">
							<div class="card-header border-0">Editar Galeria</div>
							<div class="card-body">
<?php if(isset($salvar) && $salvar) { ?>
								<div class="alert alert-success small" role="alert">Dados salvos com sucesso.</div>
<?php } ?>
								<form method="post" enctype="multipart/form-data" action="galeria/salvar">
									<div class="row">
										<div class="col-6">
											<div class="form-group">
												<label for="g_src">Arquivos</label>
												<div class="custom-file">
													<input type="file" name="g_src[]" accept=".jpg,.jpeg,.png" class="custom-file-input" id="inputGallery" multiple required>
													<label class="custom-file-label" for="inputGallery">Buscar arquivo</label>
												</div>
											</div>
										</div>
										<div class="col-6 d-flex align-items-end">
											<div class="alert alert-warning w-100" role="alert">Certifique-se de enviar no máximo <span class="font-weight-bold"><?=ini_get("max_file_uploads")?></span> arquivos por vez.</div>
										</div>
										<div class="col-3 d-flex align-items-end mb-3">
											<button class="btn btn-block bg-1 text-light mt-0">SALVAR</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="card border-0 mb-3">
							<div class="card-header border-0 d-flex align-items-center justify-content-between">
								<span>Arquivos</span>
								<button class="btn btn-light bg-white" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-bars"></i></button>
							</div>
							<div class="card-body p-0">
								<div class="collapse" id="collapseExample">
									<div class="card-body" id="loading">
<?php if(isset($listar) && $listar) { ?>
										<div class="row">
<?php foreach($listar as $key => $arquivo) { ?>
											<div class="col-2" id="arquivo<?=$arquivo['g_id']?>">
												<div class="quadrinho-box" style="background-image: url(/uploads/gallery/<?=$arquivo['g_src']?>)">
													<div class="quadrinho-info bg-light">
														<p class="text-secondary text-center mb-0"><?=str_pad($arquivo['g_id'], 2, 0, STR_PAD_LEFT)?></p>
													</div>
													<div class="quadrinho-aside">
														<button onClick="removerArquivo(<?=$arquivo['g_id']?>, '#arquivo<?=$arquivo['g_id']?>')" class="btn p-0 quadrinho-btn text-danger shadow mr-2"><i class="fas fa-trash"></i></button>
													</div>
												</div>
											</div>
<?php } ?>
										</div>
<?php } else { ?>
										<div class="alert alert-warning small mb-0" role="alert">Nenhum conteúdo encontrado.</div>
<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/scripts.php" ?>
	</body>
</html>