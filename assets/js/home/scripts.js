((f,a,l,c,s)=>{
	if(f('[aria-label]').length && f('[name]').length) {
		const obj = f('input[name]');
		
		for(let i=0;i < obj.length;i++){
			const inputName = obj[i].attributes.name.value;
			
			f(obj[i]).on('blur', e => {
				if(e.target.value != '') {
					f('[aria-label="'+inputName+'"]').addClass('text-danger')
				}
			});
		}
	}
	if(f('.scroller-destaques').length){
		f('.scroller-destaques').slick({
			dots:true,
			arrows: false,
			speed: 300,
			autoplay : true,
			infinite : false,
			slidesToShow: 4,
			slidesToScroll: 4,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
					}
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
	}
	if(f('.scroller-relacionados').length){
		f('.scroller-relacionados').slick({
			dots:false,
			arrows: false,
			speed: 300,
			infinite : false,
			slidesToShow: 4,
			slidesToScroll: 4,
			responsive: [
				{
					breakpoint: 1024,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
					}
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
				},
				{
					breakpoint: 480,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
		a.slickSlider = action => f('.scroller-relacionados').slick(action);
	}
})($, window, document, 0, 1);