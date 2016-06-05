//Inicializacion del slider durante la carga de la pagina
function init(sliderId){	
	var imageSlider = new Object();
	imageSlider.slider_width = 0;
	imageSlider.current = 0;
	//Toma los elementos dentro del ul asignado como las imagenes del slider
	imageSlider.ul = document.getElementById(sliderId);
	imageSlider.li_items = imageSlider.ul.children;
	imageSlider.li_number = imageSlider.li_items.length;
	//Calcula el ancho resultado de sumar todas las imagenes del slider
	for (i = 0; i < imageSlider.li_number; i++){
			imageSlider.image_width = imageSlider.li_items[i].childNodes[0].clientWidth;
			imageSlider.slider_width += imageSlider.image_width;
	}
	
	imageSlider.ul.style.width = parseInt(imageSlider.slider_width) + 'px';
	slider(imageSlider);
}

//Parametros de la animacion del slider
function slider(imageSlider){		
		animate({
			delay:17,
			duration: 3000,
			delta:function(p){return Math.max(0, -1 + 2 * p)},
			step:function(delta, sliderObject){
					sliderObject.ul.style.left = '-' + parseInt(sliderObject.current * sliderObject.image_width + delta * sliderObject.image_width) + 'px';
				},
			callback:function(sliderObject){
				sliderObject.current++;
				if(sliderObject.current < sliderObject.li_number-1){
					slider(sliderObject);
				}
				else{
					var left = (sliderObject.li_number - 1) * sliderObject.image_width;					
					setTimeout(function(){goBack(left, sliderObject)},1000); 				
					setTimeout(slider(sliderObject), 4000);
				}
			}
		}, imageSlider);
}

//Funcion para la vuelta atras una vez se ha llegado a la ultima imagen del slider
function goBack(left_limits, imageSlider){
	imageSlider.current = 0;	
	setInterval(function(){
		if(left_limits >= 0){
			imageSlider.ul.style.left = '-' + parseInt(left_limits) + 'px';
			left_limits -= imageSlider.image_width / 10;
		}	
	}, 17);
}

//Animación de las imñagenes en el slider
function animate(opts,imageSlider){
	var start = new Date;
	var id = setInterval(function(){
		var timePassed = new Date - start;
		var progress = timePassed / opts.duration;
		if(progress > 1){
			progress = 1;
		}
		var delta = opts.delta(progress);
		opts.step(delta, imageSlider);
		if (progress == 1){
			clearInterval(id);
			opts.callback(imageSlider);
		}
	}, opts.delay);
}