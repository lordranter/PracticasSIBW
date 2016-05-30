<?php



class WelcomeSection{
	function WelcomeSection($title, $introduction, $hotelPresentation, $imageSource){
		$this->title = $title;
		$this->introduction = $introduction;
		$this->hotelPresentation = $hotelPresentation;
		$this->imageSource = $imageSource;
	}
}

class RoomContent{
	public $cantidad;
	function RoomContent($title, $text, $imageSource){
		$this->title = $title;
		$this->text = $text;
		$this->imageSource = $imageSource;
	}
}

class ContactFormData{
	function ContactFormData($title, $nameField, $phoneField, $mailField, $messageField, $sendButtonText){
		$this->title = $title;
		$this->nameField = $nameField;
		$this->phoneField = $phoneField;
		$this->mailField = $mailField;
		$this->messageField = $messageField;
		$this->sendButtonText = $sendButtonText;
	}
}

class ContactContent{
	function ContactContent($title, $text, $mapSource, $contactDataTitle, $contactData, $contactFormData){
		$this->title = $title;
		$this->text = $text;
		$this->mapSource = $mapSource;
		$this->contactDataTitle = $contactDataTitle;
		$this->contactData = $contactData;
		$this->contactFormData = $contactFormData;		
	}
}

class IndexSection{
	function IndexSection($title, $text, $elements){
		$this->title = $title;
		$this->text = $text;
		$this->elements = $elements;
	}
}

class ContentIndex{
	function ContentIndex($welcomeContent, $servicesContent, $promotionsContent, $roomsContent, $contactContent){
		$this->welcomeContent = $welcomeContent;
		$this->servicesContent = $servicesContent;
		$this->promotionsContent = $promotionsContent;
		$this->roomsContent = $roomsContent;
		$this->contactContent = $contactContent;
	}
}

class ModelContentIndex{

	function ModelContentIndex(){
		
	}
	
	function getContentIndex(){
	require 'core/init.php';
	

	
		$contentIndex = new ContentIndex(new WelcomeSection($lang['Bienvenido al Hotel Plaza Nueva Granada'], 
															$lang['El Hotel Plaza Nueva está situado en el pleno centro monumental, comercial y administrativo de Granada, a 10 minutos de la Alhambra.'], 
															$lang[' Cada planta del hotel y cada habitación poseen un nombre y encanto propio. Este nombre es una representación de un evento importante en la vida e historia de Granada. No tienen tarjetas magnéticas para abrir las puertas de las habitaciones, preferimos la originalidad que proporciona una tradicional llave. '], 
															$lang['Imagenes/hotel-plaza-nueva-granada-20-fachada.jpg']),
										new IndexSection($lang['Servicios'],
														$lang['Estos son los servicios de los que disfrutará durante su estancia en el Hotel Plaza Nueva, entre los que destacamos el servicio de cuna gratuito (según disponibilidad) y servicio de reserva de entradas para la Alhambra y para espectáculos de flamenco.'],
														array($lang['Imagenes/serv1.png'],
																$lang['Imagenes/serv2.png'],
																$lang['Imagenes/serv3.png'],
																$lang['Imagenes/serv4.png'],
																$lang['Imagenes/serv5.png'],
																$lang['Imagenes/serv6.png'],
																$lang['Imagenes/serv7.png'],
																$lang['Imagenes/serv8.png']
															)
														),
										new IndexSection($lang['Promociones'],
														$lang['Algunas de las promociones que ofrecemos.'],
														array($lang['Imagenes/PromocionAlhambra.jpg'],
																$lang['Imagenes/PromocionTrenYFlamencof.jpg'],
																$lang['Imagenes/PromocionFlamencof.jpg']
															)
														),
										new IndexSection($lang['Habitaciones'],
														$lang['Disponemos de habitaciones para todas las necesidades.'],
														array(new RoomContent($lang[' Habitación doble o twin '],
																				$lang[' En nuestras habitaciones standard disfrutará de todo el equipamiento y comodidades que su estancia en Granada merece. '],
																				$lang['Imagenes/habitacion1.jpg']
																				),
															new RoomContent($lang[' Habitación superior '],
																				$lang[' Disfrute de una magnifica vista de Plaza Nueva y el centro de Granada desde nuestras habitaciones superiores. '],
																				$lang['Imagenes/habitacion2.jpg']
																				),
															new RoomContent($lang[' Habitación triple '],
																				$lang[' En nuestras habitaciones triples podrá disfrutar de sus vacaciones en familia o con amigos en el centro de Granada. '],
																				$lang['Imagenes/habitacion3.jpg']
																				)
															)
														),
										new ContactContent($lang['Contacto'],
															$lang[' Si necesita cualquier pongase en contacto con nosotros. '],
															$lang['Imagenes/mapa.jpg'],
															$lang['Contacto'],
															array($lang['Dirección: Imprenta, nº 2 '],
																	$lang['Localidad:'] . " Granada" ,
																	$lang['Provincia:'] . "Granada" ,
																	$lang['País: España '],
																	$lang['Teléfono:'] . " +34 958 215 273 ",
																	$lang['Fax:'] . " +34 958 225 765 ",
																	$lang['E-mail:'] . " info@hotel-plazanueva.com "
																	),
															new ContactFormData($lang[' Mándanos un mensaje: '],
																				$lang['Nombre y apellidos:'],
																				$lang['Teléfono de contacto:'],
																				$lang['E-mail:'],
																				$lang['Contenido:'],
																				$lang['Enviar']
																				)
															)														
										);
		
		return $contentIndex;
	}
}
?>