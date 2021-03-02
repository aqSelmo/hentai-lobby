<!doctype html>
<html lang="en">
	<head>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/head.php" ?>
		<title>Hentai Lobby :: Administração :: Categorias</title>
	</head>
	<body>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/header.php" ?>
		<main>
			<div class="container-admin">
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/navbar.php" ?>
				<div class="container-admin-content">
					<div class="container-fluid py-3">
						<div class="card border-0 mb-3">
							<div class="card-header border-0"><?=(isset($alterar) ? "Editar Categoria" : "Nova Categoria")?></div>
							<div class="card-body">
								<div class="col-3">
									
								</div>
<?php if(isset($salvar) && $salvar) { ?>
								<div class="alert alert-success small" role="alert">Dados salvos com sucesso.</div>
<?php } elseif(isset($excluir) && $excluir) { ?>
								<div class="alert alert-danger small" role="alert">Dados excluidos com sucesso.</div>
<?php } ?>
								<form method="post" enctype="multipart/form-data" action="categorias/salvar">
									<div class="row">
										<div class="col-3">
											<div class="form-group">
												<label for="c_titulo">Título</label>
												<input type="text" name="c_titulo" class="form-control" value="<?=(isset($alterar['c_titulo']) ? $alterar['c_titulo'] : "")?>" required>
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label for="c_banner">Capa</label>
<?php if(isset($alterar['c_banner']) && $alterar['c_banner']) { ?>
												<div class="input-group border rounded overflow-hidden flex-nowrap">
													<div class="custom-input-group px-2 small"><?=$alterar['c_banner']?></div>
													<div class="input-group-prepend">
														<a data-fancybox="" href="/uploads/banners/<?=$alterar['c_banner']?>" class="input-group-text border-top-0 border-bottom-0 text-secondary"><i class="fas fa-eye"></i></a>
													</div>
													<div class="input-group-prepend">
														<a href="categorias/banner/<?=$alterar['c_banner']?>" class="input-group-text border-top-0 border-bottom-0 text-danger"><i class="fas fa-trash"></i></a>
													</div>
												</div>
<?php } else { ?>
												<div class="custom-file">
													<input type="file" name="c_banner" accept="image/*" class="custom-file-input" id="inputBanner">
													<label class="custom-file-label" for="inputBanner">Buscar arquivo</label>
												</div>
<?php } ?>
											</div>
										</div>
										<div class="col-3 d-flex align-items-end mb-3">
<?php if(isset($alterar)) { ?>
											<a href="categorias" class="btn btn-block btn-dark mr-1">CANCELAR</a>
<?php } ?>
											<button class="btn btn-block bg-1 text-light mt-0">SALVAR</button>
										</div>
									</div>
									<input type="hidden" name="c_id" value="<?=(isset($alterar['c_id']) ? $alterar['c_id'] : "")?>">
								</form>
							</div>
						</div>
						<div class="card border-0">
							<div class="card-header border-0">Registros</div>
							<div class="card-body">
								<table class="table table-striped table-bordered datatable rounded">

									<thead>
										<tr>
											<th width="50">ID</th>
											<th>Título</th>
											<th width="50">Editar</th>
											<th width="50">Excluir</th>
										</tr>
									</thead>
									<tbody>
<?php foreach($listar as $a) { ?>
										<tr>
											<td align="center"><?=$a['c_id']?></td>
											<td><?=$a['c_titulo']?></td>
											<td align="center"><a href="categorias/alterar/<?=$a['c_id']?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
											<td align="center"><a href="categorias/excluir/<?=$a['c_id']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
										</tr>
<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/scripts.php" ?>
	</body>
</html>