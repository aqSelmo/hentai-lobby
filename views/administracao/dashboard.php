<!doctype html>
<html lang="en">
	<head>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/head.php" ?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
		<title>Hentai Lobby :: Administração :: Dashboard</title>
	</head>
	<body>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/header.php" ?>
		<main>
			<div class="container-admin">
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/navbar.php" ?>
				<div class="container-admin-content">
					<div class="container-fluid py-3">
						<div class="row">
							<div class="col-3 mb-3">
								<div class="d-flex bg-danger rounded py-3 px-3">
									<i class="fas fa-chart-line fa-3x mr-3"></i>
									<div class="d-flex flex-column">
										<p class="font-weight-bold mb-0">VISITAS</p>
										<p class="mb-0 ">00 visitas recentes</p>
									</div>
								</div>
							</div>
							<div class="col-3 mb-3">
								<div class="d-flex bg-primary rounded py-3 px-3">
									<i class="fas fa-eye  fa-3x mr-3"></i>
									<div class="d-flex flex-column">
										<p class="font-weight-bold  mb-0">VISUALIZAÇÕES</p>
										<p class="mb-0 ">00 visualizações</p>
									</div>
								</div>
							</div>
							<div class="col-3 mb-3">
								<div class="d-flex bg-warning rounded py-3 px-3">
									<i class="fas fa-images  fa-3x mr-3"></i>
									<div class="d-flex flex-column">
										<p class="font-weight-bold  mb-0">QUADRINHO MAIS VISUALIZADO</p>
										<p class="mb-0 ">Holdup Problem</p>
									</div>
								</div>
							</div>
							<div class="col-3 mb-3">
								<div class="d-flex bg-info rounded py-3 px-3">
									<i class="fas fa-user  fa-3x mr-3"></i>
									<div class="d-flex flex-column">
										<p class="font-weight-bold  mb-0">COLABORADOES</p>
										<p class="mb-0 ">00 colaboradores totais</p>
									</div>
								</div>
							</div>
							<div class="col-4 mb-3">
								<div class="card card-admin border-0">
									<div class="card-header border-bottom-0">Colaborados pendentes</div>
									<div class="card-body overflow-auto">
<?php if(isset($colaboradores) && $colaboradores) { ?>
										<div></div>
<?php } else { ?>
										<div class="alert alert-warning small" role="alert">Nenhum colaborador pendente.</div>
<?php } ?>
									</div>
								</div>
							</div>
							<div class="col-4 mb-3">
								<div class="card card-admin border-0">
									<div class="card-header border-bottom-0">Avaliadores pendentes</div>
									<div class="card-body overflow-auto">
<?php if(isset($avaliadores) && $avaliadores) { ?>
										<div></div>
<?php } else { ?>
										<div class="alert alert-warning small" role="alert">Nenhum avaliador pendente.</div>
<?php } ?>
									</div>
								</div>
							</div>
							<div class="col-4 mb-3">
								<div class="card card-admin border-0">
									<div class="card-header border-bottom-0">Quadrinhos pendentes</div>
									<div class="card-body overflow-auto">
<?php if(isset($pendentes) && $pendentes) { ?>
										<div></div>
<?php } else { ?>
										<div class="alert alert-warning small" role="alert">Nenhum quadrinho pendente.</div>
<?php } ?>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="card h-100 border-0">
									<div class="card-header border-bottom-0">Gráfico de visitas</div>
									<div class="card-body">
										<div class="chart-box bg-white px-2 pt-0 rounded">
											<canvas id="chartVisitors" width="100%"></canvas>
										</div>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div class="card h-100 border-0">
									<div class="card-header border-bottom-0">Melhores quadrinhos</div>
									<div class="card-body">
										<div class="chart-box bg-white px-2 pt-0 rounded">
											<canvas id="chartComics" width="100%"></canvas>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<?php require_once __DIR__ . DIRECTORY_SEPARATOR . "includes/scripts.php" ?>
	</body>
</html>