<footer>
	<div class="container-fluid bg-2">
		<div class="containder py-4">
			<div class="row">
				<div class="col-2 d-sm-flex d-none align-items-center justify-content-center mb-xl-0 mb-3">
					<img width="150" src="assets/img/home/logotipo2.png">
				</div>
				<div class="col-xl-2 col-sm-4 mb-xl-0 mb-3">
					<h4 class="text-light mb-3">Acesso rápido</h4>
					<ul class="list-unstyled">
						<li><a class="text-light" href="home">Home</a></li>
						<li><a class="text-light" href="home/galeria">Galeria</a></li>
						<li><a class="text-light" href="home/contato">Fale Conosco</a></li>
					</ul>
				</div>
				<div class="col-xl-4 col-sm-6 mb-xl-0 mb-3">
					<h4 class="text-light mb-3">Categorias</h4>
					<div class="d-flex flex-wrap small">
<?php foreach($categorias as $key => $categoria) { ?>
						<a href="home/categorias/visualizar/<?=$categoria['c_slug']?>">
							<div class="px-2 py-1 bg-1 rounded mr-1 mb-1 text-light"><?=$categoria['c_titulo']?></div>
						</a>
<?php } ?>					
					</div>
				</div>
				<div class="col-xl-2 col-sm-6 mb-sm-0 mb-3">
					<h4 class="text-light mb-3">Newsletter</h4>
					<form method="post" enctype="application/x-www-form-urlencoded" action="home/contato/newsletter">
						<label class="small text-light" for="n_email">Receba nossa newsletter e fique por dentro de novos quadrinhos!</label>
						<div class="d-flex align-items-center">
							<div class="input-group rounded overflow-hidden mr-1">
								<div class="input-group-prepend">
									<span class="input-group-text bg-white border-0 pr-1"><i class="fas fa-envelope"></i></span>
								</div>
								<input type="email" name="n_email_footer" class="form-control border-0" placeholder="Digite seu e-mail" required>
							</div>
							<button type="submit" class="btn bg-1 rounded text-light"><i class="far fa-check-circle"></i></button>
						</div>
					</form>
				</div>
				<div class="col-xl-2 col-sm-6">
					<h4 class="text-light mb-3">Redes Sociais</h4>
					<div class="d-flex">
						<a class="btn btn-sm btn-light mr-1"><i class="fab fa-facebook-f"></i></a>
						<a class="btn btn-sm btn-light mr-1"><i class="fab fa-instagram"></i></a>
						<a class="btn btn-sm btn-light"><i class="fab fa-twitter"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-1">
		<div class="container py-3">
			<p class="mb-0 text-center text-light small">Todos os direitos reservados <span class="font-weight-bold"><?=PLATAFORMA?></span> <?=date('Y')?>.</p>
		</div>
	</div>
</footer>