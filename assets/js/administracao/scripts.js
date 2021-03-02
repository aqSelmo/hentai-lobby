((f,a,l,c,s)=>{
	a.toggleNavBar = () => {
		f('.navbar-admin').toggleClass('navbar-active')
	}
	a.toggleSlick = (el, action)=>{
		f(el).slick(action);
	}
	function quadrinhoStatusUpdate() {
		const response = new Promise(function(resolve, reject) {
			f.ajax({
				method : "POST",
				dataType : "JSON",
				url : "quadrinhos/arquivosList",
				success : res => resolve(res)
			});
		});
		return response;
	}
	a.quadrinhoStatusLoading = (el, loading=true) => {
		if(loading) {
			return f(el).css('opacity', '.4');	
		}
		return f(el).css('opacity', '1');
	}
	a.quadrinhoStatusRemove = id => {
		f.ajax({
			method : "POST",
			data : {
				id : id
			},
			dataType : "JSON",
			url : "quadrinhos/arquivosRemove",
			success : res => (res.status == 1 ? f("#quadrinho" + id).remove() : bootbox.alert("Não foi possível remover arquivo. Tente novamente."))
		});
	}
	a.quadrinhosStatus = () => {
		if(f('[data-status]').length){
			quadrinhoStatusUpdate().then((res)=>{
				f('[data-status]').empty();
				res.forEach((qua) => {
					f('[data-status="'+qua.id+'"]').append([
						f(l.createElement('button')).prop({
							type : "button",
							class : "btn p-0 quadrinho-btn text-primary shadow mr-2",
						}).attr({
							"data-trigger" : "hover",
							"data-container" : "body",
							"data-toggle" : "popover",
							"data-placement" : "top",
							"data-content" : (qua.tipo == 3 ? "Remover Capa" : "Tornar Capa"),
							"onclick" : `quadrinhoStatusAction(3, ${qua.id})`
						}).append(f(l.createElement('i')).prop({
							class : (qua.tipo == 3 ? "fas fa-times" : "fas fa-camera")
						})),
						f(l.createElement('button')).prop({
							type : "button",
							class : "btn p-0 quadrinho-btn text-success shadow mr-2",
						}).attr({
							"data-trigger" : "hover",
							"data-container" : "body",
							"data-toggle" : "popover",
							"data-placement" : "top",
							"data-content" : (qua.tipo == 2 ? "Remover Thumbnail" : "Tornar Thumbnail"),
							"onclick" : `quadrinhoStatusAction(2, ${qua.id})`
						}).append(f(l.createElement('i')).prop({
							class : (qua.tipo == 2 ? "fas fa-times" : "fas fa-image")
						})),
						f(l.createElement('button')).prop({
							type : "button",
							class : "btn p-0 quadrinho-btn text-danger shadow mr-2",
						}).attr({
							"onclick" : `quadrinhoStatusRemove(${qua.id})`,
							"data-trigger" : "hover",
							"data-container" : "body",
							"data-toggle" : "popover",
							"data-placement" : "top",
							"data-content" : "Remover Imagem",
						}).append(f(l.createElement('i')).prop({
							class : "fas fa-trash"
						}))
					]);
				});
				f('[data-toggle="popover"]').popover();
				a.quadrinhoStatusLoading('#loading', false);
			});
		}
	}
	a.quadrinhoStatusAction = (type, id) => {
		f.ajax({
			method : "POST",
			data : {
				tipo : type,
				id : id
			},
			dataType : "JSON",
			url : "quadrinhos/arquivosAction",
			beforeSend : () => a.quadrinhoStatusLoading('#loading'),
			complete : setTimeout(() => {
				a.quadrinhosStatus()
			}, 500)
		});
	}
	a.removerArquivo = (id, el) => {
		f.ajax({
			method : "POST",
			data : {
				id : id
			},
			dataType : "JSON",
			url : "galeria/excluir",
			beforeSend : () => a.quadrinhoStatusLoading('#loading'),
			success : res => {
				if(res.status == 1) {
					f(el).remove();
				}
			},
			complete : setTimeout(() => {
				a.quadrinhoStatusLoading('#loading', false)
			}, 500)
		});
	}
	if(f('[data-status]').length){
		a.quadrinhosStatus();
	}
	if(f('[data-toggle="popover"]').length){
		f('[data-toggle="popover"]').popover();
	}
	if(f('[data-ckeditor]').length){
		CKEDITOR.replaceAll();
	}
	if(f('.selectpicker').length){
		f('.selectpicker').selectpicker({
			style : "btn-white border",
			noneSelectedText : "Nenhuma selecionada"
		});
	}
	if(f('.custom-file-input').length){
		const inputFile = f('.custom-file-input');
		inputFile.on('change', e => {
			const id = e.target.id;
			f('[for="'+id+'"]').empty();
			for(let i = 0;i < e.target.files.length;i++){
				f('[for="'+id+'"]').append(e.target.files[i + 1] ? e.target.files[i].name + ", " : e.target.files[i].name);
			}
		})
	}
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
	if(f('.scroller-login').length){
		f('.scroller-login').slick({
			dots: false,
			arrows: false,
			speed: 500,
			draggable : false,
			slidesToShow: 1,
		});
		if(f('#status').length) {
			f('.scroller-login').slick('slickNext');
		}
	}
	if(f('.datatable').length){
        f('.datatable').DataTable({
			order : [[0, 'desc']],
            autoWidth : true,
            language : {
                "info": "Mostrando página _PAGE_ de _PAGES_",
				"infoEmpty":  "Mostrando página 1 de 0",
                "lengthMenu": 'Mostrando <select class="custom-select">'+
                      '<option value="10">10</option>'+
                      '<option value="20">20</option>'+
                      '<option value="30">30</option>'+
                      '<option value="40">40</option>'+
                      '<option value="50">50</option>'+
                      '<option value="-1">All</option>'+
                      '</select> registros',
				"zeroRecords":    "Nenhum resultado encontrado",
                "search":         "Buscar:",
                "paginate": {
                    "first":      "Primeira",
                    "last":       "Última",
                    "next":       "Próxima",
                    "previous":   "Anterior"
                }
            }
        });
    }
	if(f('#chartVisitors').length) {
		let months = [];
		const data = new Date();
		const actuallyYear = (data.getFullYear());
		const actuallyMonth = (data.getMonth());
		for(let i = 0;i < 12;i++){
			if(actuallyMonth >= i) {
				data.setMonth(i);
				months.push(data.toLocaleDateString('pt-BR', {
					month : 'long'
				}));	
			}
		}
		f.ajax({
			method : "GET",
			url : "dashboard/analytics",
			dataType : "JSON",
			success : ([res]) => {
				var ctx = document.getElementById('chartVisitors').getContext('2d');
				new Chart(ctx, {
					type: 'line',
					data: {
						labels: months,
						datasets: [{
							label: `Visitas - ${actuallyYear}`,
							data: [res.janeiro, res.fevereiro, res.marco, res.abril, res.maio, res.junho, res.julho, res.agostro, res.setembro, res.outubro, res.novembro, res.dezembro],
							backgroundColor: 'rgba(40, 167, 69, 0.4)',
							borderColor: 'rgba(40, 167, 69, 1)',
							borderWidth: 1
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero: true
								}
							}]
						},
						responsive: true,
						maintainAspectRatio: false
					}
				});
			},
			error : (err) => {
				console.log(err.catch())
			}
		});
	}
	if(f('#chartComics').length) {
		let months = [];
		const data = new Date();
		const actuallyYear = (data.getFullYear());
		const actuallyMonth = (data.getMonth());
		for(let i = 0;i < 12;i++){
			if(actuallyMonth >= i) {
				data.setMonth(i);
				months.push(data.toLocaleDateString('pt-BR', {
					month : 'long'
				}));	
			}
		}
		f.ajax({
			method : "GET",
			url : "dashboard/quadrinhos",
			dataType : "JSON",
			success : ([res]) => {
				var ctx = document.getElementById('chartComics').getContext('2d');
				new Chart(ctx, {
					type: 'line',
					data: {
						labels: res.quadrinhos,
						datasets: [{
							label: 'Quadrinhos',
							data: res.visitas,
							backgroundColor: 'rgba(40, 167, 69, 0.4)',
							borderColor: 'rgba(40, 167, 69, 1)',
							borderWidth: 1
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero: true
								}
							}]
						},
						responsive: true,
						maintainAspectRatio: false
					}
				});
			},
			error : (err) => {
				console.log(err.catch())
			}
		});
	}
})($, window, document, 0, 1)