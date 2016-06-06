<?php
class SidebarText{
	function SidebarText($link, $text){
		$this->link = $link;
		$this->text = $text;
	}
}

class SidebarContent{
	function SidebarContent($sidebarIconSource, $sidebarSliderImages, $sidebarText, $sidebarDividerSource){
		$this->sidebarIconSource = $sidebarIconSource;
		//Array con los enlaces a las imagenes del slider de la barra lateral
		$this->sidebarSliderImages = $sidebarSliderImages;
		//Array con parejas de enlaces y texto
		$this->sidebarText = $sidebarText;
		//Puede tomar un valor nulo si hay menos de dos elementos en el texto
		$this->sidebarDividerSource = $sidebarDividerSource;
	}
}

class ModelSidebar{
	function ModelSidebar(){
		
	}
		
	function getSidebar($section){
	include 'lang/' . $_SESSION['lang'] . '.php';
		$sidebarIconSource = "Imagenes/flecha-despliegue.png";
		$sidebarSliderImages = array($lang['Imagenes/PromocionAlhambraSlider2.jpg'], $lang['Imagenes/PromocionTrenYFlamencofSlider2.jpg'], $lang['Imagenes/PromocionFlamencofSlider2.jpg']);
		$sidebarDividerSource = "Imagenes/linea.png";
		$sidebarText = array();
		if($section=="valoraciones"){
			array_push($sidebarText, new SidebarText("?secc=valoraciones#EvaluationStats", $lang['Estadisticas']));
			array_push($sidebarText, new SidebarText("?secc=valoraciones#comentario1", $lang['Valoraciones']));
			array_push($sidebarText, new SidebarText("?secc=index#index_cabecera_Contacto", $lang['Contacto']));
		}elseif($section=="promociones"){
			array_push($sidebarText, new SidebarText("?secc=promociones#promotion1", $lang[' Habitacion doble + visita guiada al Alhambra ']));
			array_push($sidebarText, new SidebarText("?secc=promociones#promotion2", $lang[' Habitacion doble + espectaculo de flamenco ']));
			array_push($sidebarText, new SidebarText("?secc=promociones#promotion3", $lang[' Habitacion doble + tren turistico + espectaculo flamenco ']));
			array_push($sidebarText, new SidebarText("?secc=promociones#promotion4", $lang[' Oferta dos noches ']));
			array_push($sidebarText, new SidebarText("?secc=promociones#promotion5", $lang[' Oferta 10% de descuento ']));
			array_push($sidebarText, new SidebarText("?secc=promociones#promotion6", $lang[' Oferta reserva anticipada ']));
		}elseif($section=="reserva" || $section=="reservaS" || $section=="reserva2" || $section=="reserva3"|| $section=="reserva4"){
			array_push($sidebarText, new SidebarText("", $lang[' Habitaciones dobles: ']));
			array_push($sidebarText, new SidebarText("", $lang[' Habitaciones triples: ']));
			array_push($sidebarText, new SidebarText("", $lang[' Habitacion superiores: ']));
			array_push($sidebarText, new SidebarText("", $lang[' Promoción escogida: ']));
		}else{
			array_push($sidebarText, new SidebarText("?secc=index#index_cabecera_Contacto", $lang['Contacto']));			
		}
		
		$sidebarContent = new SidebarContent($sidebarIconSource, 
							$sidebarSliderImages, 
							$sidebarText,
							$sidebarDividerSource);
							
		return $sidebarContent;
	}	
}
?>