<div class="d-block">
	<a href="home/quadrinho/listar/<?=$qua['q_slug']?>">
		<div class="d-block mb-3">
			<div class="quadrinho-box" style="background-image: url(uploads/archives/<?=$qua['q_id']?>/<?=$qua['capa']?>)">
				<div class="quadrinho-aside small">
					<i class="fas fa-eye"></i>
					<span> <?=$qua['q_visitas']?></span>
				</div>
				<div class="quadrinho-info small">
					<p class="mb-1 font-weight-bold"><?=$qua['q_titulo']?></p>
					<p class="mb-0 border-top font-weight-light"><?=$qua['q_autor']?></p>
				</div>
			</div>
		</div>
	</a>
</div>