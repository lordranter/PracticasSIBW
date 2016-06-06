<<<<<<< HEAD
<?php
class Controller{
	private $section;
	
	function Controller($secc){
		include 'modelTitle.php';
		include 'viewTitle.php';
		include 'modelHeader.php';
		include 'viewHeader.php';
		include 'modelFooter.php';
		include 'viewFooter.php';
		include 'modelSidebar.php';
		include 'viewSidebar.php';
		include 'controllerContent.php';
		include 'lang/es_ES.php';
		
		$this->section = $secc;
		if($this->section!="valoraciones" && $this->section!="imagenes" && $this->section!="promociones" && $this->section!="reserva" && $this->section!="reservaS" && $this->section!="reserva2" && $this->section!="reserva3"&& $this->section!="reserva4"){
			$this->section = "index";
		}
	}
	
	function createTitle(){
		$modelTitle = new ModelTitle();
		$viewTitle = new ViewTitle();
		if($this->section=="valoraciones"){
			$titleContent = $modelTitle->getValoracionesTitle();
		}elseif($this->section=="imagenes"){
			$titleContent = $modelTitle->getImagenesTitle();
		}elseif($this->section=="promociones"){
			$titleContent = $modelTitle->getPromocionesTitle();
		}else{
			$titleContent = $modelTitle->getIndexTitle();	
		}
		$viewTitle->createTitle($titleContent);
	}
	
	function openMainContainer(){			
		if($this->section == "index"){
			echo'<div id="index_contenedor">';
		}else{
			echo'<div class="contenedor">';
		}
	}
	
	function createHeader(){
		$modelHeader = new ModelHeader();
		$viewHeader = new ViewHeader();
		$viewHeader->createHeader($modelHeader->getHeader());
	}
	
	function createSidebar(){
		$modelSidebar = new ModelSidebar();
		$viewSidebar = new ViewSidebar();
		$viewSidebar->createSidebar($modelSidebar->getSidebar($this->section), $this->section);	
	}

	function createContent(){
		$controllerContent = new ControllerContent();
		$controllerContent->createContent($this->section);
	}
	
	function createFooter(){
		$modelFooter = new ModelFooter();
		$viewFooter = new ViewFooter();
		$viewFooter->createFooter($modelFooter->getFooter());
	}
	
	
	function closeMainContainer(){			
		echo'</div>
			<script src="scripts/slider.js" type="text/javascript"></script>
			<script>
				window.onload = init("sidebarSlider");
			</script>
			';
		if($this->section == "index"){
			echo'<script src="scripts/formulario.js" type="text/javascript"></script>
				<script>
					window.onload = init("image_slider");
				</script>
				';
		}
		if($this->section == "reserva" || $this->section == "reservaS" || $this->section == "reserva2"){
			echo'<script src="scripts/pickDate.js" type="text/javascript"></script>
				<script>
					window.onload = setDatosFecha();
				</script>
				<script>
					window.onload = actualizarPromo();
				</script>
				';
		}
		if($this->section == "reserva2" || $this->section == "reserva3" || $this->section == "reserva4"){
			echo'<script src="scripts/pickDate.js" type="text/javascript"></script>
				<script>
					window.onload = actualizarItemsTodos();
				</script>
				<script>
					window.onload = actualizarPromo();
				</script>
				';
		}
		if($this->section == "reserva"){
			echo'<script src="scripts/pickDate.js" type="text/javascript"></script>
				<script>
					window.onload = limpiarItems();
				</script>
				';
		}
		if($this->section == "reserva4"){
			echo'<script src="scripts/pickDate.js" type="text/javascript"></script>
				<script>
					createResumen();
				</script>
				';
		}
	}
	
}
=======
<?php
class Controller{
	private $section;
	
	function Controller($secc){
		include 'modelTitle.php';
		include 'viewTitle.php';
		include 'modelHeader.php';
		include 'viewHeader.php';
		include 'modelFooter.php';
		include 'viewFooter.php';
		include 'modelSidebar.php';
		include 'viewSidebar.php';
		include 'controllerContent.php';
		include 'lang/es_ES.php';
		
		$this->section = $secc;
		if($this->section!="valoraciones" && $this->section!="imagenes" && $this->section!="promociones" && $this->section!="reserva" && $this->section!="reservaS" && $this->section!="reserva2" && $this->section!="reserva3"&& $this->section!="reserva4"){
			$this->section = "index";
		}
	}
	
	function createTitle(){
		$modelTitle = new ModelTitle();
		$viewTitle = new ViewTitle();
		if($this->section=="valoraciones"){
			$titleContent = $modelTitle->getValoracionesTitle();
		}elseif($this->section=="imagenes"){
			$titleContent = $modelTitle->getImagenesTitle();
		}elseif($this->section=="promociones"){
			$titleContent = $modelTitle->getPromocionesTitle();
		}else{
			$titleContent = $modelTitle->getIndexTitle();	
		}
		$viewTitle->createTitle($titleContent);
	}
	
	function openMainContainer(){			
		if($this->section == "index"){
			echo'<div id="index_contenedor">';
		}else{
			echo'<div class="contenedor">';
		}
	}
	
	function createHeader(){
		$modelHeader = new ModelHeader();
		$viewHeader = new ViewHeader();
		$viewHeader->createHeader($modelHeader->getHeader());
	}
	
	function createSidebar(){
		$modelSidebar = new ModelSidebar();
		$viewSidebar = new ViewSidebar();
		$viewSidebar->createSidebar($modelSidebar->getSidebar($this->section), $this->section);	
	}

	function createContent(){
		$controllerContent = new ControllerContent();
		$controllerContent->createContent($this->section);
	}
	
	function createFooter(){
		$modelFooter = new ModelFooter();
		$viewFooter = new ViewFooter();
		$viewFooter->createFooter($modelFooter->getFooter());
	}
	
	
	function closeMainContainer(){			
		echo'</div>
			<script src="scripts/slider.js" type="text/javascript"></script>
			<script>
				window.onload = init("sidebarSlider");
			</script>
			';
		if($this->section == "index"){
			echo'<script src="scripts/formulario.js" type="text/javascript"></script>
				<script>
					window.onload = init("image_slider");
				</script>
				';
		}
		if($this->section == "reserva" || $this->section == "reservaS" || $this->section == "reserva2"){
			echo'<script src="scripts/pickDate.js" type="text/javascript"></script>
				<script>
					window.onload = setDatosFecha();
				</script>
				<script>
					window.onload = actualizarPromo();
				</script>
				';
		}
		if($this->section == "reserva2" || $this->section == "reserva3" || $this->section == "reserva4"){
			echo'<script src="scripts/pickDate.js" type="text/javascript"></script>
				<script>
					window.onload = actualizarItemsTodos();
				</script>
				<script>
					window.onload = actualizarPromo();
				</script>
				';
		}
		if($this->section == "reserva"){
			echo'<script src="scripts/pickDate.js" type="text/javascript"></script>
				<script>
					window.onload = limpiarItems();
				</script>
				';
		}
		if($this->section == "reserva4"){
			echo'<script src="scripts/pickDate.js" type="text/javascript"></script>
				<script>
					createResumen();
				</script>
				';
		}
	}
	
}
>>>>>>> origin/master
?>