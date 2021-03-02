<!doctype html>
<html lang="en">
	<head>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/head.php" ?>
		<title>Hentai Lobby :: Administração :: Banners</title>
	</head>
	<body>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/header.php" ?>
		<main>
			<div class="container-admin">
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/navbar.php" ?>
				<div class="container-admin-content">
					<div class="container-fluid py-3">
						<div class="card border-0 mb-3">
							<div class="card-header border-0"><?=(isset($alterar) ? "Editar Banner" : "Novo Banner")?></div>
							<div class="card-body">
								<div class="col-3">
									
								</div>
<?php if(isset($salvar) && $salvar) { ?>
								<div class="alert alert-success small" role="alert">Dados salvos com sucesso.</div>
<?php } elseif(isset($excluir) && $excluir) { ?>
								<div class="alert alert-danger small" role="alert">Dados excluidos com sucesso.</div>
<?php } ?>
								<form method="post" enctype="multipart/form-data" action="banners/salvar">
									<div class="row">
										<div class="col-3">
											<div class="form-group">
												<label for="b_titulo">Título</label>
												<input type="text" name="b_titulo" class="form-control" value="<?=(isset($alterar['b_titulo']) ? $alterar['b_titulo'] : "")?>">
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label for="b_tipo">Tipo</label>
												<select class="custom-select" name="b_tipo">
<?php foreach($tipos as $tipo) {
	if(isset($alterar['b_tipo']) && $alterar['b_tipo'] == $tipo['t_valor']) { ?>
													<option value="<?=$tipo['t_valor']?>" selected><?=$tipo['t_titulo']?></option>
<?php } else { ?>
													<option value="<?=$tipo['t_valor']?>"><?=$tipo['t_titulo']?></option>
<?php }} ?>
												</select>
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label for="b_link">Link</label>
												<input type="url" name="b_link" class="form-control" value="<?=(isset($alterar['b_link']) ? $alterar['b_link'] : "")?>">
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label for="b_src">Arquivo</label>
<?php if(isset($alterar['b_src']) && $alterar['b_src']) { ?>
												<div class="input-group border rounded overflow-hidden flex-nowrap">
													<div class="custom-input-group px-2 small"><?=$alterar['b_src']?></div>
													<div class="input-group-prepend">
														<a data-fancybox="" href="/uploads/banners/<?=$alterar['b_src']?>" class="input-group-text border-top-0 border-bottom-0 text-secondary"><i class="fas fa-eye"></i></a>
													</div>
													<div class="input-group-prepend">
														<a href="banners/imagem/<?=$alterar['b_src']?>" class="input-group-text border-top-0 border-bottom-0 text-danger"><i class="fas fa-trash"></i></a>
													</div>
												</div>
<?php } else { ?>
												<div class="custom-file">
													<input type="file" name="b_src" accept="image/*" class="custom-file-input" id="inputBanner">
													<label class="custom-file-label" for="inputBanner">Buscar arquivo</label>
												</div>
<?php } ?>
											</div>
										</div>

										<div class="col-3 d-flex align-items-end mb-3">
<?php if(isset($alterar)) { ?>
											<a href="banners" class="btn btn-block btn-dark mr-1">CANCELAR</a>
<?php } ?>
											<button class="btn btn-block bg-1 text-light mt-0">SALVAR</button>
										</div>
									</div>
									<input type="hidden" name="b_id" value="<?=(isset($alterar['b_id']) ? $alterar['b_id'] : "")?>">
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
											<th>Tipo</th>
											<th>Título</th>
											<th width="50">Editar</th>
											<th width="50">Excluir</th>
										</tr>
									</thead>
									<tbody>
<?php foreach($listar as $a) { ?>
										<tr>
											<td align="center"><?=$a['b_id']?></td>
											<td><?=$a['tipo']?></td>
											<td><?=$a['b_titulo']?></td>
											<td align="center"><a href="banners/alterar/<?=$a['b_id']?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
											<td align="center"><a href="banners/excluir/<?=$a['b_id']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
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