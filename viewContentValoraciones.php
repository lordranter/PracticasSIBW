<?php
class ViewContentValoraciones{
	function ViewContentValoraciones(){
		
	}
	
	function createComment($contentComment){
		echo '	<div class="comentario">		
					<div class="comentarioContenido">
						<p class="promo_parrafo">' . $contentComment->title . '</p>
						<div class="details">' . $contentComment->details . '</div>	
			';
			
		for($i = 0; $i < count($contentComment->lines); $i++){
			echo '<p>' . $contentComment->lines[$i] . '</p>';
		}
		
		echo '<ul>';
			
		for($i = 0; $i < count($contentComment->stats); $i++){
			echo '<li>' . $contentComment->stats[$i]->statName . $contentComment->stats[$i]->statScore . '</li>';
		}		
		
		echo '
						</ul>
					</div>
					<div class="nota">' . $contentComment->finalScore . '</div>
				</div>
		';
	}
	
	function createContentValoraciones($contentValoraciones){
		
		echo '<div id="EvaluationGeneral">		
		
					<div id="EvaluationInfo">
						<h1><strong>' . $contentValoraciones->evaluationTitle . '</strong></h1>

						<p>' . $contentValoraciones->evaluationText . '</p>
						<ul>
			';
			
		for($i = 0; $i < count($contentValoraciones->stats); $i++){
			echo '<li><img src="' . $contentValoraciones->stats[$i]->icon->source . '" alt="' . $contentValoraciones->stats[$i]->icon->altText . '" />' . 
			$contentValoraciones->stats[$i]->statName . $contentValoraciones->stats[$i]->statScore . '</li>';
		}
		
		echo '			</ul>
						<div class="nota">' . $contentValoraciones->finalScore . '</div>
					</div>
						
					<div id="EvaluationStats">
						
						<img src="' . $contentValoraciones->statGraph->source . '" class="fullDiv" alt="' . $contentValoraciones->statGraph->altText . '" />
										
					</div>
				</div>
			';
			
		for($i = 0; $i < count($contentValoraciones->comments); $i++){
			$this->createComment($contentValoraciones->comments[$i]);
		}			
			
		echo '<div class="comentario"></div>';
	}
	
}
?>