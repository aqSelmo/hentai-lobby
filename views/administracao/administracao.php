<!doctype html>
<html lang="en">
	<head>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/head.php" ?>
		<title>Hentai Lobby :: Administração :: Dashboard</title>
	</head>
	<body>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/header.php" ?>
		<main>
			<div class="container-admin">
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/navbar.php" ?>
				<div class="container-admin-content">
					<div class="container-fluid py-3">
						<div class="card border-0 mb-3">
							<div class="card-header border-0"><?=(isset($alterar) ? "Editar Administrador" : "Novo Administrador")?></div>
							<div class="card-body">
<?php if(isset($salvar) && $salvar) { ?>
								<div class="alert alert-success small" role="alert">Dados salvos com sucesso.</div>
<?php } ?>
								<form method="post" enctype="multipart/form-data" action="administracao/salvar">
									<div class="row">
										<div class="col-3">
											<div class="form-group">
												<label for="a_nome">Nome completo</label>
												<input class="form-control" type="text" name="a_nome" value="<?=(isset($alterar['a_nome']) ? $alterar['a_nome'] : "")?>">
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label for="a_nascimento">Data de nascimento</label>
												<input class="form-control" type="text" name="a_nascimento" data-mask="##/##/####" maxlength="10" value="<?=(isset($alterar['a_nascimento']) ? $alterar['a_nascimento'] : "")?>">
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label for="a_nascimento">Login</label>
												<input class="form-control" type="text" name="a_login" value="<?=(isset($alterar['a_login']) ? $alterar['a_login'] : "")?>">
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label for="a_senha">Senha</label>
												<input class="form-control" type="password" name="a_senha">
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label for="a_avatar">Avatar</label>
<?php if(isset($alterar['a_avatar']) && $alterar['a_avatar']) { ?>
												<div class="input-group border rounded overflow-hidden flex-nowrap">
													<div class="custom-input-group px-2 small"><?=$alterar['a_avatar']?></div>
													<div class="input-group-prepend">
														<a data-fancybox="" href="/uploads/avatars/<?=$alterar['a_avatar']?>" class="input-group-text border-top-0 border-bottom-0 text-secondary"><i class="fas fa-eye"></i></a>
													</div>
													<div class="input-group-prepend">
														<a href="administracao/avatar/<?=$alterar['a_avatar']?>" class="input-group-text border-top-0 border-bottom-0 text-danger"><i class="fas fa-trash"></i></a>
													</div>
												</div>
<?php } else { ?>
												<div class="custom-file">
													<input type="file" name="a_avatar" accept="image/*" class="custom-file-input" id="inputAvatar">
													<label class="custom-file-label" for="inputAvatar">Buscar arquivo</label>
												</div>
<?php } ?>
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label for="a_email">Email</label>
												<input class="form-control" type="email" name="a_email" value="<?=(isset($alterar['a_email']) ? $alterar['a_email'] : "")?>">
											</div>
										</div>
										<div class="col-3">
											<div class="form-group">
												<label for="a_status">Status</label>
												<select class="custom-select" name="a_status">
<?php foreach($status as $key => $a) { 
	if(isset($alterar) && $alterar['a_status'] == $a['t_valor']) { ?>
													<option value="<?=$a['t_valor']?>" selected><?=$a['t_titulo']?></option>
<?php } elseif(($a['t_valor'] == 2) && !isset($alterar['a_status'])) { ?>
													<option value="<?=$a['t_valor']?>" selected><?=$a['t_titulo']?></option>
<?php } else { ?>
													<option value="<?=$a['t_valor']?>"><?=$a['t_titulo']?></option>
<?php }} ?>
												</select>
											</div>
										</div>
										<div class="col-3 d-flex align-items-end mb-3">
<?php if(isset($alterar)) { ?>
											<a href="administracao" class="btn btn-block btn-dark mr-1">CANCELAR</a>
<?php } ?>
											<button class="btn btn-block bg-1 text-light mt-0">SALVAR</button>
										</div>
									</div>
									<input type="hidden" name="a_id" value="<?=(isset($alterar['a_id']) ? $alterar['a_id'] : "")?>">
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
											<th>Nome</th>
											<th>Login</th>
											<th>E-mail</th>
											<th width="50">Editar</th>
										</tr>
									</thead>
									<tbody>
<?php foreach($listar as $a) { ?>
										<tr>
											<td align="center"><?=$a['a_id']?></td>
											<td><?=$a['a_nome']?></td>
											<td><?=$a['a_login']?></td>
											<td><?=$a['a_email']?></td>
											<td align="center"><a href="administracao/alterar/<?=$a['a_id']?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a></td>
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