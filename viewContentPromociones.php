<?php
class ViewContentPromociones{
	function ViewContentPromociones(){
		
	}
	
	function createMajorPromotion($contentPromotion){
		echo '<div class="promotion">
				<div class="promotioninfo">
					<h2><strong>' . $contentPromotion->title . '</strong></h2>

					<p>' . $contentPromotion->benefitsListTitle . '
					<ul>
			';
			
		for($i = 0; $i < count($contentPromotion->benefits); $i++){
			echo '<li>' . $contentPromotion->benefits[$i] . '</li>';
		}
		
		echo '		</ul>
					</p>
					<p class="promo_parrafo">' . $contentPromotion->descriptionTitle . '</p>
			';
			
		for($i = 0; $i < count($contentPromotion->descriptionLines); $i++){
			echo '<p>' . $contentPromotion->descriptionLines[$i] . '</p>';
		}
		
		echo '	</div>
					
				<div class="promotionimg">
						
					<img src="' . $contentPromotion->promotionImage->source . '" class="fullDiv" alt="' . $contentPromotion->promotionImage->altText . '" />
										
				</div>
			</div>
			';
		
	}
	
	function createMinorPromotion($contentPromotion){
		echo '<div class="promotion">

				<div class="fullpromotion">
					<h2><strong>' . $contentPromotion->title . '</strong></h2>
					<p>' . $contentPromotion->description . '</p>
					
					<img src="' . $contentPromotion->promotionImage->source . '" alt="' . $contentPromotion->promotionImage->altText . '" />
									
				</div>

			
			</div>
			';
	}
	
	function createContentPromociones($contentPromociones){
		for($i = 0; $i < count($contentPromociones->majorPromotions); $i++){
			$this->createMajorPromotion($contentPromociones->majorPromotions[$i]);
		}
		
		for($i = 0; $i < count($contentPromociones->minorPromotions); $i++){
			$this->createMinorPromotion($contentPromociones->minorPromotions[$i]);
		}
	}	
}
?>