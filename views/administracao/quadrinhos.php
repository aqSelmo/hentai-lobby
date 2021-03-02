<!doctype html>
<html lang="en">
	<head>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/head.php" ?>
		<title>Hentai Lobby :: Administração :: Quadrinhos</title>
	</head>
	<body>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/header.php" ?>
		<main>
			<div class="container-admin">
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/navbar.php" ?>
				<div class="container-admin-content">
					<div class="container-fluid py-3">
						<div class="card border-0 mb-3">
							<div class="card-header border-0"><?=(isset($alterar) ? "Editar Quadrinho" : "Novo Quadrinho")?></div>
							<div class="card-body">
<?php if(isset($salvar) && $salvar) { ?>
								<div class="alert alert-success small" role="alert">Dados salvos com sucesso.</div>
<?php } elseif(isset($excluir) && $excluir) { ?>
								<div class="alert alert-danger small" role="alert">Dados excluidos com sucesso.</div>
<?php } ?>
								<form method="post" enctype="multipart/form-data" action="quadrinhos/salvar">
									<div class="row">
										<div class="col-6">
											<div class="row">
												<div class="col-6">
													<div class="form-group">
														<label for="q_titulo">Título</label>
														<input type="text" name="q_titulo" class="form-control" value="<?=(isset($alterar['q_titulo']) ? $alterar['q_titulo'] : "")?>" required>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group">
														<label for="q_autor">Autor</label>
														<input type="text" name="q_autor" class="form-control" value="<?=(isset($alterar['q_autor']) ? $alterar['q_autor'] : "")?>" required>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group">
														<label for="q_categoria">Categorias</label>
														<div class="custom-input-group">
															<select class="selectpicker" multiple data-live-search="true" name="q_categorias[]">
<?php foreach($categorias as $categoria) { 
			if(isset($alterar['q_categorias']) && in_array($categoria['c_id'], explode(",", $alterar['q_categorias']))) { ?>
																<option value="<?=$categoria['c_id']?>" selected><?=$categoria['c_titulo']?></option>
<?php } else { ?>
																<option value="<?=$categoria['c_id']?>"><?=$categoria['c_titulo']?></option>
<?php }} ?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="form-group">
														<label for="q_tags">Tags</label>
														<input type="text" name="q_tags" class="form-control" value="<?=(isset($alterar['q_tags']) ? $alterar['q_tags'] : "")?>" data-role="tagsinput" >
													</div>
												</div>
<?php if(isset($arquivos) && $arquivos) { ?>
												<div class="col-6">
													<div class="form-group">
														<label for="q_status">Status</label>
														<select class="custom-select" name="q_status">
<?php foreach($tipos as $tipo) { 
	if($tipo['t_valor'] == $alterar['q_status']) { ?>
															<option value="<?=$tipo['t_valor']?>" selected><?=$tipo['t_titulo']?></option>
<?php } else { ?>
															<option value="<?=$tipo['t_valor']?>"><?=$tipo['t_titulo']?></option>
<?php }} ?>
														</select>
													</div>
												</div>
<?php } else { ?>
												<div class="col-6">
													<div class="form-group">
														<label for="arquivos">Arquivos</label>
														<div class="custom-file">
															<input type="file" name="arquivos[]" accept=".jpg,.jpeg,.png" class="custom-file-input" id="inputArquivos" multiple>
															<label class="custom-file-label overflow-hidden" for="inputArquivos">Buscar arquivo</label>
														</div>
													</div>
												</div>
<?php } ?>
												<div class="col-6">
													<div class="form-group">
														<label for="q_destaque">Destaque</label>
														<div class="custom-control custom-switch">
<?php if(isset($alterar['q_destaque']) && $alterar['q_destaque']) { ?>
															<input type="checkbox" name="q_destaque" value="1" class="custom-control-input" id="destaqueSwitch" checked>
<?php } else { ?>
															<input type="checkbox" name="q_destaque" value="1" class="custom-control-input" id="destaqueSwitch">
<?php } ?>
															<label class="custom-control-label" for="destaqueSwitch">Sim</label>
														</div>
													</div>
												</div>
												<div class="col-6 d-flex align-items-end mb-3">
<?php if(isset($alterar)) { ?>
													<a href="quadrinhos" class="btn btn-block btn-dark mr-1">CANCELAR</a>
<?php } ?>
													<button class="btn btn-block bg-1 text-light mt-0">SALVAR</button>
												</div>
											</div>
										</div>
										<div class="col-6">
											<div class="form-group">
												<label for="q_descricao">Descrição</label>
												<textarea name="q_descricao" rows="15" data-ckeditor="true"><?=(isset($alterar['q_descricao']) ? $alterar['q_descricao'] : "")?></textarea>
											</div>
										</div>
									</div>
									<input type="hidden" name="q_id" value="<?=(isset($alterar['q_id']) ? $alterar['q_id'] : "")?>">
								</form>
							</div>
						</div>
<?php if(isset($alterar) && $alterar) { ?>
						<div class="card border-0 mb-3">
							<div class="card-header border-0 d-flex align-items-center justify-content-between">
								<span>Arquivos</span>
								<button class="btn btn-light bg-white" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-bars"></i></button>
							</div>
							<div class="card-body p-0">
								<div class="collapse" id="collapseExample">
									<div class="card-body" id="loading">
<?php if(isset($arquivos) && $arquivos) { ?>
										<div class="row">
<?php foreach($arquivos as $key => $arquivo) { ?>
											<div class="col-2" id="quadrinho<?=$arquivo['a_id']?>">
												<div class="quadrinho-box" style="background-image: url(/uploads/archives/<?=$arquivo['a_quadrinho']?>/<?=$arquivo['a_src']?>)">
													<div class="quadrinho-info bg-light">
														<p class="text-secondary text-center mb-0"><?=str_pad(($key + 1), 2, 0, STR_PAD_LEFT)?></p>
													</div>
													<div class="quadrinho-aside">
														<div class="btn-group" data-status="<?=$arquivo['a_id']?>">
														</div>
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
<?php } ?>
						<div class="card border-0 mb-3">
							<div class="card-header border-0">Registros</div>
							<div class="card-body">
								<table class="table table-striped table-bordered datatable rounded">

									<thead>
										<tr>
											<th width="50">ID</th>
											<th>Nome</th>
											<th>Autor</th>
											<th>Colaborador</th>
											<th>Status</th>
											<th width="50">Editar</th>
											<th width="50">Excluir</th>
										</tr>
									</thead>
									<tbody>
<?php foreach($listar as $a) { ?>
										<tr>
											<td align="center"><?=$a['q_id']?></td>
											<td><?=$a['q_titulo']?></td>
											<td><?=$a['q_autor']?></td>
											<td><a class="text-primary" href="administracao/alterar/<?=$a['q_colaborador']?>"><?=$a['colaborador']?></a></td>
											<td><a href="quadrinhos/alterar/<?=$a['q_id']?>" class="btn btn-sm btn-block <?=$a['status_bg']?>"><?=$a['status']?></a></td>
											<td align="center"><a href="quadrinhos/alterar/<?=$a['q_id']?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a></td>
											<td align="center"><a href="quadrinhos/excluir/<?=$a['q_id']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a></td>
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