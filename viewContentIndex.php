<?php
class ViewContentIndex{	
	function ViewContentIndex(){
		
	}
	
	function createWelcomeSection($welcomeContent){
		echo '	<div id="index_bienvenida_contenedor">
					<img id="index_imagen_bienvenida1" class="" src="' . $welcomeContent->imageSource . '"/>			

					<div id="index_cuadro_info_precios" class="index_info_precios">
						<header id="index_cabecera_bienvenida" class="index_cabecera1"> 
							<h2 class="index_titulo_seccion" id="index_cabecera_bienvenida">' . $welcomeContent->title . '</h2>
							
							<div class="index_resto">
								<p>' . $welcomeContent->introduction . '</p>
							</div>
						</header>
						
						<div id="index_cuadro_info1" class="index_cuadro_info">
							<p>' . $welcomeContent->hotelPresentation . '</p>
						</div>
					</div>
				</div>
			';
	}
	
	function createServicesSection($servicesContent){
		echo'<div id="index_servicios" class="index_servicios_h">
				<header id="index_cabecera_servicios" class="index_cabecera1"> 				
					<h2 class="index_titulo_seccion" id="index_titulo_servicios">' . $servicesContent->title . '</h2>
				</header>
				
				<div class="index_resto">
					<p id="index_parrafo_servicios">' . $servicesContent->text . '</p>
					<figure id="index_lista_servicios">
						<ul id="index_lista_figura_servicios" class="index_lista_figura_serviciosC">
			';
			
		for($i = 0; $i < count($servicesContent->elements); $i++){
			echo '<li class="index_elemento_lista_servicios" > <img class="index_figura_servicio" src="' . $servicesContent->elements[$i] . '"> </li>';
		}
							
		echo'			</ul>
					</figure>
				</div>
			</div>
			';
	}
	
	function createPromotionsSection($promotionsContent){
		echo '<div id="index_promociones" class="index_promocionesC">
				<header id="index_cabecera_promociones" class="index_cabecera1"> 		
					<h2 class="index_titulo_seccion" id="index_titulo_promociones">' . $promotionsContent->title . '</h2>
				</header>
				
				<p id="index_parrafo_promociones" >' . $promotionsContent->text . '</p>
				
				<div class="container">
					<div class="image-slider-wrapper">
						<ul id="image_slider">
			';
			
		for($i = 0; $i < count($promotionsContent->elements); $i++){
			echo '<li><img src="' . $promotionsContent->elements[$i] . '"> </li>';
		}
		
		echo '			</ul>
						<div class="pager">
						</div>
					</div>
				</div>
			</div>		
			';
	}
	
	function createRoomElement($room, $id){
		echo '<div class="index_cuadro_habitacion" id="' . $id . '" >
					<img class="index_img_habitacion" src="' . $room->imageSource . '">
					
					<p class="index_titulo_habitacion">' . $room->title . '</p>
					
					<p>' . $room->text . '</p>
				</div>
			';
	}
	
	function createRoomsSection($roomsContent){
		echo '<div id="index_habitaciones" class="index_habitacionesC">

				<header id="index_cabecera_habitaciones" class="index_cabecera1"> 		
					<h2 class="index_titulo_seccion">' . $roomsContent->title . '</h2>
				</header>
				
				<p id="index_parrafo_descripcion_habitaciones">' . $roomsContent->text . '</p>
				
				<div id="index_cuadro_habitaciones">
			';
			
		$this->createRoomElement($roomsContent->elements[0],"index_cuadro_habitacion1");
		
		echo '		<div class="index_div_separador"></div>
					
					<div id="index_contenedor_habitaciones_2">
			';
			
		$this->createRoomElement($roomsContent->elements[1], "index_cuadro_habitacion2");
		
		echo '			<div id="div_habitaciones_vacio"> </div>';
		
		$this->createRoomElement($roomsContent->elements[2], "index_cuadro_habitacion3");
		
		echo '		</div>
				</div>
			</div>				
			';
	}
	
	function createContactSection($contactContent){
		include 'script.php';
	
	
		echo '<div id="index_contacto_mapa" class="index_contacto_mapaC">
				<header id="index_cabecera_Contacto" class="index_cabecera1">
					<h2 class="index_titulo_seccion">' . $contactContent->title . '</h2>
				</header>
				
				<p id="index_parrafo_contacto">' . $contactContent->text . '</p>
				<div id="index_cuadro_mapa">
					<img id="index_mapa_provisional" src="' . $contactContent->mapSource . '">
					
					<div id="index_contacto_info">
						<p class="index_titulo_contacto">' . $contactContent->contactDataTitle . '</p>

						<ul id="index_contacto_lista"> 
			';
		
		for($i = 0; $i < count($contactContent->contactData); $i++){
			echo '<li>' . $contactContent->contactData[$i] . '</li>';
		}
		
		echo '		   </ul>						
					</div>
				</div>
				
				<div id="index_titulo_contacto2"> 
					<p class="index_titulo_contacto">' . $contactContent->contactFormData->title . '</p>
					
					
					<form name="formularioContacto" method="POST" enctype="multipart/form-data" onsubmit="return comprobarFormulario()" action="script.php">
								<p>'. $contactContent->contactFormData->nameField .'</p>
								<input type="text" name="nombreContacto">
								
							
							
								
								
							
						
								<p>'. $contactContent->contactFormData->phoneField .'</p>
								<input type="text" name="telefonoContacto">
								
								
								<p>'. $contactContent->contactFormData->mailField .'</p>
								<input type="text" name="emailContacto">
							
							
								<p>'. $contactContent->contactFormData->messageField .'</p>
								<textarea id="contenidoContacto" name="mensaje" cols="30" rows"10"> </textarea>
								
							
							
						
						
						<input type="hidden" name="phpmailer">
						<input id="enviarMensaje"  type="submit" value="'. $contactContent->contactFormData->sendButtonText .'">
						<p id="confirmacionEnvio"></p>

					</form>
				
				
					
				
				
				
				
				</div>
			</div>
		';
	}
	
	function createContentIndex($contentIndex){
		$this->createWelcomeSection($contentIndex->welcomeContent);
		$this->createServicesSection($contentIndex->servicesContent);
		$this->createPromotionsSection($contentIndex->promotionsContent);
		$this->createRoomsSection($contentIndex->roomsContent);
		$this->createContactSection($contentIndex->contactContent);
	}
}
?>