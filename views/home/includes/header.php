<header>
	<div class="container-fluid bg-2">
		<nav class="navbar navbar-expand-lg navbar-dark px-0 py-lg-4">
			<a class="navbar-brand d-lg-none" href="pagina-inicial">
				<img height="40" src="assets/img/home/logotipo2.png">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuHeader" aria-controls="menuHeader" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse row" id="menuHeader">
				<div class="col-2 d-lg-block d-none">
					<a href="home">
						<img class="header-logo" src="assets/img/home/logotipo2.png">
					</a>
				</div>
				<div class="col-xl-7 col-lg-5">
					<ul class="navbar-nav justify-content-end text-uppercase small text-lg-start text-center mb-lg-0 mb-2">
						<li class="nav-item <?=(CONTROLLER == "dashboard" ? "active ts-1" : "")?>">
							<a class="nav-link py-1 font-weight-bold" href="home">Home</a>
						</li>
						<li class="nav-item <?=(CONTROLLER == "categorias" ? "active ts-1" : "")?>">
							<a class="nav-link py-1 font-weight-bold" href="home/categorias">Categorias</a>
						</li>
						<li class="nav-item <?=(CONTROLLER == "galeria" ? "active ts-1" : "")?>">
							<a class="nav-link py-1 font-weight-bold" href="home/galeria">Galeria</a>
						</li>
						<li class="nav-item <?=(CONTROLLER == "contato" ? "active ts-1" : "")?>">
							<a class="nav-link py-1 font-weight-bold" href="home/contato">Fale conosco</a>
						</li>
					</ul>
				</div>
				<div class="col-xl-3 col-lg-5 d-flex">
					<form class="w-100 mr-2 mb-lg-0 mb-3" method="post" enctype="application/x-www-form-urlencoded" action="home/quadrinho/buscar">
						<div class="d-flex">
							<input type="text" class="form-control rounded border-0 mr-2" placeholder="Pesquisa rápida" name="keywords">
							<button type="submit" class="btn btn-light rounded"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>
			</div>
		</nav>
	</div>
</header>