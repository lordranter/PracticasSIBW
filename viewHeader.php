<?php
class ViewHeader{	
	function ViewHeader(){
		
	}
	
	function createButton($button){
		if($button->hasDropdownMenu == true){
			$this->createButtonWithDropdown($button);
		}else{
			if($button->isReserve == true)
			{
				echo '<li class="index_elemento_menu" id="botonReserva"><a href="' . $button->link . '" class="">' . $button->text . '</a></li>';
			}else{
				echo '<li class="index_elemento_menu"><a href="' . $button->link . '" class="">' . $button->text . '</a></li>';
			}
		}		
	}
	
	function createButtonWithDropdown($button){
		echo '	<li id="menu_promociones_desplegable" class="index_elemento_menu" > 					
				<div class="dropdown">						
					<a href="' . $button->link . '"> <button class="dropText">' . $button->text . '</button></a>
					<div id="caja" >
			';
		
		for($i = 0; $i < count($button->dropdownItems); $i++){
			echo '		<a href="' . $button->dropdownItems[$i]->link . '">
							<div class="menu_desplegable_promo">									
								<img class="imagen_promo_desplegable" src="' . $button->dropdownItems[$i]->imageSource . '"/>
								<p class="parrafo_promo_desplegable_titulillo">' . $button->dropdownItems[$i]->title . '</p>
								<p class="parrafo_promo_desplegable_contenido">' . $button->dropdownItems[$i]->text . '</p>									
							</div>
						</a>
				';
		}
		
		echo '		</div>						
				</div>
			';
	}
	
	function createHeader($headerContent){		
		echo'
			<div class="index_menu_marco" id="index_menu_mgeneral1" >
				<div id="index_cuadro_navegacion"> 					
					<nav class="index_menu_navegacion">					
						<ul id="index_menu-principal" class="index_menu">
			';
			
		for($i = 0; $i < count($headerContent->buttons); $i++){
			$this->createButton($headerContent->buttons[$i]);
		}
		
		echo'			</ul>		
					</nav>                    				
				</div>				
			</div>
			';
	}
}
?>