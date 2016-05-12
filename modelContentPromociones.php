<?php
class MajorPromotion{
	function MajorPromotion($title, $benefitsListTitle, $benefits, $descriptionTitle, $descriptionLines, $imageSource, $imageAltText){
		$this->title = $title;
		$this->benefitsListTitle = $benefitsListTitle;
		$this->benefits = $benefits;
		$this->descriptionTitle = $descriptionTitle;
		$this->descriptionLines = $descriptionLines;
		$this->promotionImage = new ImageData($imageSource, $imageAltText);		
	}
}

class MinorPromotion{
	function MinorPromotion($title, $description, $imageSource, $imageAltText){
		$this->title = $title;
		$this->description = $description;
		$this->promotionImage = new ImageData($imageSource, $imageAltText);
	}
}

class ContentPromociones{
	function ContentPromociones($majorPromotions, $minorPromotions){
		$this->majorPromotions = $majorPromotions;
		$this->minorPromotions = $minorPromotions;
	}
}

class ModelContentPromociones{
	function ModelContentPromociones(){
		
	}
	
	function getContentPromociones(){
		include 'lang/' . $_SESSION['lang'] . '.php';
	
		$contentPromociones = new ContentPromociones(array(new MajorPromotion($lang['Habitacion doble + visita guiada al Alhambra'],
																				$lang['Incluye:'],
																				array($lang['2 noches de alojamiento en habitaciones estandar'],
																							$lang['Desayuno continental'],
																							$lang['Visita guiada a la Alhambra']
																							),
																				$lang['La Alhambra'],																				
																				array($lang['Descubrirá con nostros la única Ciudad Medieval Musulmana mejor conservada del mundo, la Alhambra; visitando sus palacios, Mexuar, Comares, Leones, Generalife; paseando por sus patios, de los Arrayenes, la Reja, la Acequia, la Sultana; y disfrutando de sus jardines, de Partal, de la Medina y por suspuesto del Generalife con sus gracioso juegos de agua, y su laberintico diseño.'],
																							$lang['Incluye: Recogida, ida y vuelta, en bus en el hotel, azafata acompañante, entradas al monumento y guía oficial.'],
																							$lang['Duración:aproximadamente 3 h.'],
																							$lang['Horario: Según disponibilidad a la hora de la reserva.'],
																							$lang['De domingo a jueves 204 €'],
																							$lang['Viernes y sábado 224 €'],
																							$lang['Release 48 h'],
																							$lang['Política de cancelación 72 h']
																							),
																				$lang['Imagenes/PromocionAlhambraj.jpg'],
																				"Imagen promocion Alhambra"
																			),
															new MajorPromotion($lang['Habitación doble + espectáculo de flamenco'],
																				$lang['Incluye:'],
																				array($lang['2 noches de alojamiento en habitaciones estandar'],
																							$lang['Desayuno continental'],
																							$lang['Espectaculo flamenco']
																							),
																				$lang['El templo del flamenco:'],																				
																				array($lang['El Flamenco más puro nacido del corazón del monte Albayzín, vive un recuerdo de vida en la cueva flamenca más bonita de Andalucía de la que cuenta la leyenda que fue templo clandestino de cultos religiosos y donde ahora rendimos culto a nuestro arte.'],
																							$lang['Lugar: Cerca de la parada del tren en Plaza San Miguel Bajo'],
																							$lang['Incluye: Espectáculo y una consumición.'],
																							$lang['Duración: 1 hora aproximadamente de cuadro flamenco.'],
																							$lang['Incluye: Espectáculo y una consumición.'],
																							$lang['Horario: Comienzo: 21:30 h, durante todos los días del año, excepto el 24 y 31 de diciembre.'],
																							$lang['De domingo a jueves 154 €'],
																							$lang['Viernes y sábado 174 €'],
																							$lang['Release 48 h'],
																							$lang['Política de cancelación 72 h']
																							),
																				$lang['Imagenes/PromocionFlamenco.jpg'],
																				"Imagen promocion flamenco"
																			),
															new MajorPromotion($lang['Habitación doble + tren turístico + espectáculo flamenco'],
																				$lang['Incluye:'],
																				array($lang['2 noches de alojamiento en habitaciones estandar'],
																							$lang['Desayuno continental'],
																							$lang['Espectaculo flamenco'],
																							$lang['2 Tickets para uso del tren durante todo el día. Hop on - Hop off.']
																							),
																				"",																				
																				array(),
																				$lang['Imagenes/PromocionTrenYFlamenco.jpg'],
																				"Imagen promocion tren y flamenco"
																			)															
															),
													array(new MinorPromotion($lang['OFERTA DOS NOCHES'],
																			$lang['Disfrute de un 10% de descuento en estancias de un mínimo de dos noches.'],
																			$lang['Imagenes/PromocionDosNoches.jpg'],
																			"Imagen promocion dos noches"
																			),
															new MinorPromotion($lang['Oferta 10% de descuento'],
																			$lang['Disfrute de un 10% de descuento con esta tarifa no reembolsable.'],
																			$lang['Imagenes/PromocionDescuento.jpg'],
																			"Imagen promocion 10% descuento"
																			),
															new MinorPromotion($lang['Oferta reserva anticipada'],
																			$lang['Disfruta de un 10% de descuento reservando con 21 días de antelación.'],
																			$lang['Imagenes/PromocionReserva.jpg'],
																			"Imagen promocion reserva"
																			)
															)
													);
		return $contentPromociones;
	}
}
?>