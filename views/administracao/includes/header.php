<header>
	<div class="container-fluid bg-1">
		<div class="d-flex align-items-center justify-content-between py-2">
			<div class="admin-title d-flex align-items-center justify-content-between">
				<p class="mb-0 text-light font-weight-bold"><?=PLATAFORMA?></p>
				<a href="javascript:;" onClick="toggleNavBar('.navbar-admin')" class="fc-1"><i class="fas fa-bars"></i></a>
			</div>
			<form method="post" enctype="application/x-www-form-urlencoded" action="administracao/dashboard/buscar">
				<div class="d-flex justify-content-end">
					<div class="input-group mr-2">
						<input type="search" class="form-control border-0" placeholder="Pesquise por conteúdo..">
						<div class="input-group-append">
							<span class="input-group-text bg-3 border-0 text-light"><i class="fa fa-search"></i></span>
						</div>
					</div>
					<div class="dropdown">
						<a class="btn bg-3 dropdown-toggle text-light" href="javascript:;" role="button" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
						<div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="dropdownAccount">
							<a class="dropdown-item" href="administracao/">Minha conta</a>
							<a class="dropdown-item" href="login/sair">Sair</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</header>