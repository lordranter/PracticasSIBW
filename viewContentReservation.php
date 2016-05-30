<?php
class viewContentReservation{	
	function viewContentReservation(){
		
	}
	
	function createDateSection($dateContent){
	
	require 'core/init.php';
	
		echo '
			<script type=text/javascript">
			function escogerFecha(){
				$.ajax({
					type:"POST",
					url:"pickDate.php",
					data: {"fechaIn="+ document.getElementById("fechaIn").value, "fechaOut="+document.getElementById("fechaOut").value},
					dataType:"html",
					sucess: function(respuesta){
						document.getElementById("marcoPrincipal").innerHTML = respuesta;
					}
				
				
				
				})


				}
			</script>
			<div id="formulario-Reserva">

				<form name="formularioContacto" method="POST" enctype="multipart/form-data" action="pickDate.php" id="fechas-Formulario">
							
							
					<p>' . $dateContent->dateIn . ':</p>
					<input type="date" name="fechaIn" id="fechaIn">
					<p>' . $dateContent->dateOut . ':</p>
					<input type="date" name="fechaOut" id="fechaOut">
					
					
					<input id="botonAceptarFecha"  onclick="escogerFecha();" value="' .$lang['Aceptar'] .'">

								

				</form>

			</div>
		';
	}
	
	function createRoomSection($roomContent,$prices,$cantidades)
	{
		require 'core/init.php';
		echo '
			<div class="marcoGeneral" id="marcoPrincipal">
		
		
		
		';
		
		for($i = 0; $i < count($roomContent); $i++){
			$this->createRoom($roomContent[$i],$prices[$i],$cantidades[$i]);
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
	
	function createRoom($roomContent,$price, $cantidad)
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
				<select class="selectNumRooms">
					';
					
					if($cantidad > 6)
					{
						$cantidad = 6;
					}
					
					for($i = 0; $i < $cantidad; $i++){
							echo '<option>'. $i .'</option>';
						}
					echo '
				</select>
				<button type="button" class="botonAnadir">' . $lang['Añadir'].'</button>
		
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
			$this->createPromotion($promotionContent[$i]);
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
	
	function createPromotion($promotionContent)
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
				
				<button type="button" class="botonAnadir">'.$lang['Seleccionar'].'</button>
		
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
										<input type="tel" id="email" />
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
												<input class="inputA elem1"  placeholder="'.$lang['Número de la tarjeta'].'" type="text" name="number">
											</div>
											<div id="nomTar">
												<input class="inputA elem2" placeholder="'.$lang['Nombre del titular'].'" type="text" name="name">
											</div>
											<div id="fila">
												<input class="inputA elem3" placeholder="'.$lang['MM/AA'].'" type="text" name="expiry">
												<input class="inputA elem4" placeholder="'.$lang['CVC'].'" type="text" name="cvc">
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
						
							<a class="botonPasos botonContinuar" rel="nextStep" href="?secc=reserva4" >
								<span>'. $lang['Continuar'].'</span>
							</a>
						</div>
		';
	}
	
	function createReservation1($dateContent,$roomContent,$prices,$cantidades)
	{
		$this->createDateSection($dateContent);
		$this->createRoomSection($roomContent,$prices,$cantidades);
		
	}
	
	function createReservation2($dateContent,$promotionContent)
	{
		$this->createDateSection($dateContent);
		$this->createPromotionSection($promotionContent);
		
	}
	
}