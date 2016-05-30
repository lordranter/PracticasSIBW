<?php	
class DropdownItem{
	function DropdownItem($link, $imageSource, $title, $text) {
		$this->link = $link;
		$this->imageSource = $imageSource;
		$this->title = $title;
		$this->text = $text;			
	}
}
	
class Button {
	function Button($link, $text) {
		$this->link = $link;
		$this->text = $text;
		$this->hasDropdownMenu = false;
		$this->dropdownItems = array();
		$this->isReserve = false;
	}
	
	function setReserve()
	{
		$this->isReserve = true;
	}
	
	function addDropdownItem($item){
		$this->hasDropdownMenu = true;
		array_push($this->dropdownItems, $item);
	}
}
	
class headerContent{
	function headerContent($buttons){
		$this->buttons = $buttons;
	}
}
	
class ModelHeader{	
	function ModelHeader(){
		
	}
	
	function getHeader(){
	include 'lang/' . $_SESSION['lang'] . '.php';
		
		
		$buttonBienvenida = new Button("?secc=index#index_bienvenida_contenedor", $lang['bienvenida']);
		$buttonServicios = new Button("?secc=index#index_servicios", $lang['servicios']);
		$buttonPromociones = new Button("?secc=promociones", $lang['promociones']);
		$buttonPromociones->addDropdownItem(new DropdownItem("?secc=promociones", 
																"Imagenes/imagen_promo_prueba6.png", 
																$lang[' habitación doble + espectáculo de flamenco '], 
																$lang[' Incluye: -2 noches de alojamiento -Desayuno -Espectáculo Flamenco. ']));
		$buttonPromociones->addDropdownItem(new DropdownItem("?secc=promociones", 
																"Imagenes/imagen_promo_prueba7.png", 
																$lang[' habitación doble + visita guiada a la Alhambra '], 
																$lang[' Incluye: -2 noches de alojamiento -Desayuno -Visita guiada a la Alhambra. ']));
		$buttonPromociones->addDropdownItem(new DropdownItem("?secc=promociones", 
																"Imagenes/imagen_promo_prueba8.png", 
																$lang[' habitación doble + tren + espectáculo flamenco '], 
																$lang[' Incluye: -2 noches de alojamiento -Desayuno -Espectaculo Flamenco -2 tickets tren. ']));
		$buttonHabitaciones = new Button("?secc=index#index_habitaciones", $lang['habitaciones']);
		$buttonImagenes = new Button("?secc=imagenes", $lang['imágenes']);
		$buttonContacto = new Button("?secc=index#index_contacto_mapa", $lang['contacto']);
		$buttonOpiniones = new Button("?secc=valoraciones", $lang['opiniones']);
		$buttonReserva = new Button("?secc=reserva", $lang['reservar']);
		$buttonReserva->setReserve();
		$headerContent = new HeaderContent(array($buttonBienvenida, $buttonServicios, $buttonPromociones, $buttonHabitaciones, $buttonImagenes, $buttonContacto, $buttonOpiniones,$buttonReserva));
		return $headerContent;
	}
	
}
?>