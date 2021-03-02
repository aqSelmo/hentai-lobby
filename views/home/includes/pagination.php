<div class="d-flex justify-content-center pb-3">
<?php for($i = 1;$i <= $paginas;$i++) { 
	if($i == $pagina) { ?>
	<a href="javascript:;" class="btn-pagina bg-white text-dark mx-1"><?=$i?></a>
<?php } else { ?>
	<a href="home/dashboard/<?=$i?>" class="btn-pagina text-light mx-1"><?=$i?></a>
<?php }} ?>
</div>