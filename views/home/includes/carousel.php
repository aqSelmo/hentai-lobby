<section>
	<div id="<?=(CONTROLLER == "dashboard" ? "carouselHome" : "carouselContato")?>" class="carousel slide rounded overflow-hidden position-relative" data-ride="carousel">
<?php if(CONTROLLER == "dashboard") { ?>
		<div class="banner-aside d-sm-flex d-none">
			<img src="assets/img/home/logotipo.png">
		</div>
<?php } if(CONTROLLER == "dashboard") { ?>
		<ol class="carousel-indicators">
<?php foreach($banners as $key => $banner) { ?>
			<li data-target="#<?=(CONTROLLER == "dashboard" ? "carouselHome" : "carouselContato")?>" data-slide-to="<?=$key?>" class="<?=($key == 0 ? "active" : "")?>"></li>
<?php } ?>
		</ol>
<?php } ?>
		<div class="carousel-inner">
<?php foreach($banners as $key => $banner) { ?>
			<div class="carousel-item <?=($key == 0 ? "active" : "")?>">
				<img src="uploads/banners/<?=$banner['b_src']?>" class="d-block w-100" alt="<?=$banner['b_titulo']?>">
			</div>
<?php } ?>
		</div>
	</div>
</section>