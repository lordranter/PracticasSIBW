<?php
class ViewSidebar{
	function ViewSidebar(){
		
	}
	
	function addSidebarSliderImage($sidebarSliderImage){
		echo '<li><img src="' . $sidebarSliderImage . '"></li>';
	}
	
	function addDivider($sidebarDividerSource){
		echo '<li id="imagen_separadora"> <img id="imagen_separadora_img" src="' . $sidebarDividerSource . '"> </li>';
	}
	
	function createSidebarElementValoraciones($sidebarElement){
		echo '<li class="text-side-bar text-side-bar2" > <a href="' . $sidebarElement->link . '">'  . $sidebarElement->text .  '</a> </li>';
	}
	
	function createSidebarElementPromociones($sidebarElement){
		echo '<li class="items-submenu-sidebar" > <a href="' . $sidebarElement->link . '">'  . $sidebarElement->text .  '</a> </li>';
	}

	
	function createSidebar($sidebarContent, $section){
		echo'<div id="sideBarBoton"> 			
				<img id="flechaSide"src="' . $sidebarContent->sidebarIconSource . '" /> 			
				<div id="sideBar"> 

					<div class="sidebarContainer">
						<div class="sidebarSliderWrapper">
							<ul id="sidebarSlider">
			';
			
		for($i = 0; $i < count($sidebarContent->sidebarSliderImages); $i++){
			$this->addSidebarSliderImage($sidebarContent->sidebarSliderImages[$i]);
		}
		
				echo '		</ul>							
							<div class="pager2">
							</div>
						</div>							
							
						<div id="textoSideBar" >							
							<ul>
			';
			
		if($section=="valoraciones"){
			for($i = 0; $i < count($sidebarContent->sidebarText); $i++){
				$this->createSidebarElementValoraciones($sidebarContent->sidebarText[$i]);
				$this->addDivider($sidebarContent->sidebarDividerSource);
			}
		}elseif($section=="promociones"){
			for($i = 0; $i < count($sidebarContent->sidebarText); $i++){
				$this->createSidebarElementPromociones($sidebarContent->sidebarText[$i]);
				$this->addDivider($sidebarContent->sidebarDividerSource);
			}
		}else{
			echo '<li class="text-side-bar" > <a href="' . $sidebarContent->sidebarText[0]->link . '">' . $sidebarContent->sidebarText[0]->text . '</a> </li>';
		}
		
		echo'				</ul>							
						</div>							
					</div>
				</div>
			</div>
			';
	}
}
?>