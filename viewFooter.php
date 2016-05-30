<?php
class ViewFooter{
	function ViewFooter(){
		
	}
	
	function createSocialNetworkElement($socialNetworkElement){
		echo '<li class="index_elemento_lista_redes_sociales"> <a target="_blank" href="' . $socialNetworkElement->link . '"> <img class="index_img_redes" src="' . $socialNetworkElement->imageSource . '"> </a> </li>';
	}
	
	function createFooter($footerContent){		
		echo'
			<footer>
				<div id="index_redes_sociales">
					<ul class="index_lista_redes_sociales">
			';
			
		for($i = 0; $i < count($footerContent->socialNetworkElements); $i++){
			$this->createSocialNetworkElement($footerContent->socialNetworkElements[$i]);
		}
		
		echo'
					</ul>					
				</div>
			</footer>
			';
	}	
}
?>