<?php
class ControllerContent{
	function ControllerContent(){
			include 'imageData.php';
	}
	
	function createContent($section){		
		if($section=="valoraciones"){
			include 'viewContentValoraciones.php';
			include 'modelContentValoraciones.php';
			$modelContentValoraciones = new ModelContentValoraciones();
			$viewContentValoraciones = new ViewContentValoraciones();
			$viewContentValoraciones->createContentValoraciones($modelContentValoraciones->getContentValoraciones());
		}elseif($section=="imagenes"){
			include 'viewContentImagenes.php';
			include 'modelContentImagenes.php';
			$modelContentImagenes = new ModelContentImagenes();
			$viewContentImagenes = new ViewContentImagenes();
			$viewContentImagenes->createContentImagenes($modelContentImagenes->getContentImagenes());
		}elseif($section=="promociones"){
			include 'viewContentPromociones.php';
			include 'modelContentPromociones.php';
			$modelContentPromociones = new ModelContentPromociones();
			$viewContentPromociones = new ViewContentPromociones();
			$viewContentPromociones->createContentPromociones($modelContentPromociones->getContentPromociones());
		}else{
			include 'viewContentIndex.php';
			include 'modelContentIndex.php';
			$modelContentIndex = new ModelContentIndex();
			$viewContentIndex = new ViewContentIndex();
			$viewContentIndex->createContentIndex($modelContentIndex->getContentIndex());
		}
	}
}
?>