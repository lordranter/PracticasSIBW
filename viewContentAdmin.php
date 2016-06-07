<?php
class viewContentAdmin{	
	function viewContentAdmin(){
		
	}
	
	function createView($contentModelAdmin)
	{
		echo '
		<div id="formulario-Busqueda">

				<form name="formularioSearch" method="POST" enctype="multipart/form-data" action="script.php" id="fechas-Formulario">
											
											
										<p> '.$contentModelAdmin->titleSearch.':</p>
										<input type="text" name="search">

											
											
												
												
										<input id="botonAceptarFecha" class="BotonBuscar" type="submit" value="'. $contentModelAdmin->titleButton .'">

										

									</form>

				</div>

				<div class="marcoGeneral">
					<div id="cuadro">
						<h1 id="tituloAdministracion" > '.$contentModelAdmin->titleSection.' </h1>
								
								<div>
								
									<div class="cabeceraRes">
										<p class="CabeceraAd1"> '.$contentModelAdmin->cabecera1.' </p>
										<p class="CabeceraAd2"> '.$contentModelAdmin->cabecera2.' </p>
										<p class="CabeceraAd3"> '.$contentModelAdmin->cabecera3.' </p>
										<p class="CabeceraAd4"> '.$contentModelAdmin->cabecera4.' </p>
										<p class="CabeceraAd5"> '.$contentModelAdmin->cabecera5.' </p>
										<p class="CabeceraAd6"> '.$contentModelAdmin->cabecera6.' </p>
									</div>
									
								</div>
					</div>
				</div>
	</div>';
	
	}
	
}