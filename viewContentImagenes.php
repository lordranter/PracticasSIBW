<?php
class ViewContentImagenes{
	function ViewContentImagenes(){
		
	}
	
	function createContentImagenes($contentImagenes){
		echo '<div id="Galeria">';		
		for($i = 0; $i < count($contentImagenes); $i++){
			echo '<img src="' . $contentImagenes[$i]->source . '" alt="' . $contentImagenes[$i]->altText . '" />';
		}
		echo '</div>';
	}
	
}
?>