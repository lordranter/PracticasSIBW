<?php
class Stat{
	function Stat($statName, $statScore, $iconSource, $iconAltText){
		$this->statName = $statName;
		$this->statScore = $statScore;
		$this->icon = new ImageData($iconSource, $iconAltText);
	}
}

class Comment{
	function Comment($title, $details, $lines, $stats, $finalScore){
		$this->title = $title;
		$this->details = $details;
		$this->lines = $lines;
		$this->stats = $stats;
		$this->finalScore = $finalScore;
	}
}

class ContentValoraciones{
	function ContentValoraciones($evaluationTitle, $evaluationText, $stats, $finalScore, $statGraphSource, $statGraphAltText, $comments){
		$this->evaluationTitle = $evaluationTitle;
		$this->evaluationText = $evaluationText;
		$this->stats = $stats;
		$this->finalScore = $finalScore;
		$this->statGraph = new ImageData($statGraphSource, $statGraphAltText);
		$this->comments = $comments;
	}
}

class ModelContentValoraciones{
	function ModelContentValoraciones(){
		
	}
	
	function getContentValoraciones(){
	include 'lang/' . $_SESSION['lang'] . '.php';
		$stats = array(new Stat($lang['Limpieza: '],
								"9.2",
								"Imagenes/IconoLimpieza.png",
								"Icono Limpieza"
								),
						new Stat($lang['Atención Personal: '],
								"9.5",
								"Imagenes/IconoAtencion.png",
								"Icono Atención"
								),
						new Stat($lang['Comfort de las habitaciones: '],
								"'9",
								"Imagenes/IconoComfort.png",
								"Icono Comfort"
								),
						new Stat($lang['Ubicacion: '],
								"9.8",
								"Imagenes/IconoUbicacion.png",
								"Icono Ubicacion"
								),
						new Stat($lang['Instalaciones del hotel: '],
								"8.7",
								"Imagenes/IconoInstalaciones.png",
								"Icono Instalaciones"
								),
						new Stat($lang['Desayuno: '],
								"8.8",
								"Imagenes/IconoDesayuno.png",
								"Icono Desayuno"
								)
						);
						
		$comments = array(new Comment($lang['Volvería'],
										$lang['Alberto 24 - Febrero - 2016'],
										array($lang['UNA SUGERENCIA EN RELACIÓN CON EL DESAYUNO. TORTILLA Y HUEVOS REVUELTOS.'],
													$lang['Repetiré. para ir al juzgado es cómodo.']
													),
										array(new Stat($lang['Limpieza: '],
													"8/10",
													"Imagenes/IconoLimpieza.png",
													"Icono Limpieza"
													),
												new Stat($lang['Atención Personal: '],
														"9/10",
														"Imagenes/IconoAtencion.png",
														"Icono Atención"
														),
												new Stat($lang['Comfort de las habitaciones: '],
														"7/10",
														"Imagenes/IconoComfort.png",
														"Icono Comfort"
														),
												new Stat($lang['Ubicacion: '],
														"10/10",
														"Imagenes/IconoUbicacion.png",
														"Icono Ubicacion"
														),
												new Stat($lang['Instalaciones del hotel: '],
														"7/10	",
														"Imagenes/IconoInstalaciones.png",
														"Icono Instalaciones"
														),
												new Stat($lang['Desayuno: '],
														"7/10",
														"Imagenes/IconoDesayuno.png",
														"Icono Desayuno"
														)
											),
										"8"
										),
										
						new Comment($lang['Volvería'],
										$lang['Eva Maria 21 - Febrero - 2016'],
										array($lang['ESTUPENDO.'],
													$lang['Todo estupendo y muy acogedor..y el desayuno super completo..lo recomiendo 100%.']
													),
										array(new Stat($lang['Limpieza: '],
													"10/10",
													"Imagenes/IconoLimpieza.png",
													"Icono Limpieza"
													),
												new Stat($lang['Atención Personal: '],
														"10/10",
														"Imagenes/IconoAtencion.png",
														"Icono Atención"
														),
												new Stat($lang['Comfort de las habitaciones: '],
														"10/10",
														"Imagenes/IconoComfort.png",
														"Icono Comfort"
														),
												new Stat($lang['Ubicacion: '],
														"10/10",
														"Imagenes/IconoUbicacion.png",
														"Icono Ubicacion"
														),
												new Stat($lang['Instalaciones del hotel: '],
														"10/10	",
														"Imagenes/IconoInstalaciones.png",
														"Icono Instalaciones"
														),
												new Stat($lang['Desayuno: '],
														"10/10",														
														"Imagenes/IconoDesayuno.png",
														"Icono Desayuno"
														)
											),
										"10"
										),
										
						new Comment($lang['Volvería'],
										$lang['Patricia Celia 29 - Enero - 2016'],
										array($lang['HERMOSO HOTEL'],
													$lang['Ubicado en un lugar excepcional. cómodo, lindo. pasé dos días lindísimos']
													),
										array(new Stat($lang['Limpieza: '],
													"9/10",
													"Imagenes/IconoLimpieza.png",
													"Icono Limpieza"
													),
												new Stat($lang['Atención Personal: '],
														"9/10",
														"Imagenes/IconoAtencion.png",
														"Icono Atención"
														),
												new Stat($lang['Comfort de las habitaciones: '],
														"9/10",
														"Imagenes/IconoComfort.png",
														"Icono Comfort"
														),
												new Stat($lang['Ubicacion: '],
														"10/10",
														"Imagenes/IconoUbicacion.png",
														"Icono Ubicacion"
														),
												new Stat($lang['Instalaciones del hotel: '],
														"9/10",
														"Imagenes/IconoInstalaciones.png",
														"Icono Instalaciones"
														),
												new Stat($lang['Desayuno: '],
														"9/10",
														"Imagenes/IconoDesayuno.png",
														"Icono Desayuno"
														)
											),
										"9.2"
										)
						);
										
		$contentValoraciones = new ContentValoraciones($lang['Valoración de los usuarios'],
														$lang['Conozca Granada desde la Plaza Nueva, muy cerca de la Alhambra y del barrio de Albaizín.'],
														$stats,
														"9.2",
														"http://placehold.it/1900x1080&text=Estadisticas",
														$lang['Estadísticas de la valoracion'],
														$comments
														);
														
		return $contentValoraciones;
	}
}
?>