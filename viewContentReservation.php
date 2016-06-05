<?php
class viewContentReservation{	
	function viewContentReservation(){
		
	}
	function noRooms($dateContent)
	{
		$this->createDateSection($dateContent);
		
		require 'core/init.php';
		echo '
			<div class="marcoGeneral" id="marcoPrincipal">
			
				<p>'.$lang['Seleccione una fecha para consultar disponibilidad.'] .' </p>
			
			</div>
			';
	}
	
	function createDateSection($dateContent){
	
	require 'core/init.php';
	
		echo '
			<div id="formulario-Reserva">

				<form name="formularioContacto" method="POST" enctype="multipart/form-data" onsubmit="guardarDatos();" action="pickDate.php" id="fechas-Formulario">
							
							
					<p>' . $dateContent->dateIn . ':</p>
					<input type="date" name="fechaIn" id="fechaIn">
					<p>' . $dateContent->dateOut . ':</p>
					<input type="date" name="fechaOut" id="fechaOut">
					
					
					<input id="botonAceptarFecha"  type="submit" onclick = "guardarDatos();" value="' .$lang['Aceptar'] .'">

								

				</form>

			</div>
		';
	}
	
	function createRoomSection($roomContent,$prices,$cantidades,$ids)
	{
		require 'core/init.php';
		echo '
			<div class="marcoGeneral" id="marcoPrincipal">
		
		
		
		';
		
		for($i = 0; $i < count($roomContent); $i++){
			$this->createRoom($roomContent[$i],$prices[$i],$cantidades[$i],$ids[$i]);
		}
		echo '
		<div class="cuadroHabitacionF cuadroBotones">
			<a class="botonPasos botonContinuar" rel="nextStep" href="?secc=reserva2" >
				<span>'. $lang['Continuar'].'</span>
			</a>
		</div>
		</div>
		';
		
	}
	
	function createRoom($roomContent,$price, $cantidad,$id)
	{
		require 'core/init.php';
		
		echo '
		<div class="cuadroHabitacion">

	
		<div class="habitacionImg">
			
			<img src="' . $roomContent->imageSource . '" class="fullDiv" " />
							
		</div>
		
		<div class="infoHabitacion">
			<h2><strong>' . $roomContent->title .'</strong></h2>

			<p>' . $roomContent->text . '</p>
			
			
		</div>
		
		<div class="infoPrecio">
				<div class="precio">
					<p> ' . $lang['Precio'] .' </p>
					<p id="habitacionPrecio">'. $price . $lang['€'].' </p>
				</div>
				
				<p class="cantidad">'. $lang['Cantidad'].'</p>
				<select class="selectNumRooms" id="cantidadhab'.$id.'">
					';
					
					if($cantidad > 6)
					{
						$cantidad = 6;
					}
					
					echo '<option value="0" selected>0</option>';
					for($i = 0; $i < $cantidad; $i++){
						if($i != 0){
							echo '<option value="'.$i.'">'. $i .'</option>';
						}
						}
					echo '
				</select>
				<button type="button" onclick="addCarrito'. $id .'();" class="botonAnadir">' . $lang['Añadir'].'</button>
		
		</div>
			
		
		

	
	</div>
		
		';
	}
	
	
	function createPromotionSection($promotionContent)
	{
		require 'core/init.php';
		echo '
			<div class="marcoGeneral" id="marcoPrincipal">
		
		
		
		';
		
		for($i = 0; $i < count($promotionContent); $i++){
			$this->createPromotion($promotionContent[$i],$i);
		}
		echo '
		<div class="cuadroHabitacionF cuadroBotones">
			<a class="botonPasos" rel="backStep" href="?secc=reserva" >
				<span>'. $lang['Retroceder'].'</span>
			</a>
		
			<a class="botonPasos botonContinuar" rel="nextStep" href="?secc=reserva3" >
				<span>'. $lang['Continuar'].'</span>
			</a>
		</div>
		</div>
		';
		
	}
	
	function createPromotion($promotionContent,$id)
	{

		require 'core/init.php';
		
		
		echo '
		<div class="cuadroHabitacion">

	
		<div class="habitacionImg">
			
			<img src="' . $promotionContent->imageSource . '" class="fullDiv" " />
							
		</div>
		
		<div class="infoHabitacion">
			<h2><strong>' . $promotionContent->title .'</strong></h2>

			<p>' . $promotionContent->description . '</p>
			
			
		</div>
		
		<div class="infoPrecio">
				
				<button type="button" onclick="escogerPromocion'.$id.'();" class="botonAnadir">'.$lang['Seleccionar'].'</button>
		
		</div>
			
		
		

	
	</div>
		
		';
	}
	
	function createFormSection()
	{
		require 'core/init.php';
		
		echo'
			<div class="marcoGeneral">
					<div id="cuadro">
							<p id="DescripcionForm"> '.$lang['Será obligatorio rellenar todos los campos a excepción de los opcionales marcados como (opcional).'].' </p>
								<form id="bookingForm" method="post" onsubmit="" >
									
									<div class="columna1">
										<p>'.$lang['Nombre'].':</p>
										<input type="text" id="name" />
										
										<p>'.$lang['Apellidos'].':</p>
										<input type="text" id="apellidos" />
										
										<p>'.$lang['E-mail'].':</p>
										<input type="email" id="email" />
										
										<p>'.$lang['Teléfono'].':</p>
										<input type="tel" id="telefono" />
									</div>
									
									<div class="columna2">
										<p>'.$lang['Dirección'].':</p>
										<input type="text" id="direccion" />
										
										<p>'.$lang['DNI'].':</p>
										<input type="text" id="dni" />
										
									</div>
									
									
									<div id="cuadro2">
							<p id="DescripcionForm"> '.$lang['Es obligatorio rellenar todos los siguientes campos.'].' </p>
								<form id="bookingForm" method="post" onsubmit="" >
									
									   <div class="demo-container">
									<div class="card-wrapper"></div>

									<div class="form-container active">
										<form action="">
											<div id="numeroTar" >
												<input class="inputA elem1" id="numTar"  placeholder="'.$lang['Número de la tarjeta'].'" type="text" name="number">
											</div>
											<div id="nomTar">
												<input class="inputA elem2" id="nombTitu" placeholder="'.$lang['Nombre del titular'].'" type="text" name="name">
											</div>
											<div id="fila">
												<input class="inputA elem3" id="caducidad" placeholder="'.$lang['MM/AA'].'" type="text" name="expiry">
												<input class="inputA elem4" id="Cseguridad" placeholder="'.$lang['CVC'].'" type="text" name="cvc">
											</div>
										</form>
									</div>
								</div>

								<script src="./lib/js/card.js"></script>

									
									
								</form>
							</div>
									
								</form>
								<div id="cuadroTerm"><input id="termns" type="checkbox" name="terminos" value="terminos"> <a id="termnsLink"href="https://www.google.es/intl/es/policies/terms/regional.html" target="_blank">'.$lang['Aceptas los términos y condiciones del hotel.'].'</a><br> </div>
								
							</div>
							<div class="cuadroHabitacionF cuadroBotones">
							<a class="botonPasos" rel="backStep" href="?secc=reserva2" >
								<span>'. $lang['Retroceder'].'</span>
							</a>
						
							<a class="botonPasos botonContinuar" onclick="loadForm()" rel="nextStep"  >
								<span>'. $lang['Continuar'].'</span>
							</a>
						</div>
		';
	}
	
	function createResumen()
	{
				require 'core/init.php';
		echo'
		<div class="marcoGeneral">
		<div  id="marcoGeneralR">
						
		</div>
		<div class="cuadroHabitacionF cuadroBotones">
							<a class="botonPasos" rel="backStep" href="?secc=reserva3" >
								<span>'. $lang['Retroceder'].'</span>
							</a>
						</div>
		</div>
					';
	}
	
	function createReservation1($dateContent,$roomContent,$prices,$cantidades,$ids)
	{
		$this->createDateSection($dateContent);
		$this->createRoomSection($roomContent,$prices,$cantidades,$ids);
		
	}
	
	function createReservation2($dateContent,$promotionContent)
	{
		$this->createDateSection($dateContent);
		$this->createPromotionSection($promotionContent);
		
	}
	
}