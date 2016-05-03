<?php
class SocialNetworkFooterElement{
	function FooterContent(){
		
	}
	
	function SocialNetworkFooterElement($link, $imageSource){
		$this->link = $link;
		$this->imageSource = $imageSource;
	}
}

class FooterContent{
	function FooterContent(){
		$this->socialNetworkElements = array();
	}
	
	function addSocialNetworkElement($socialNetworkElement){
		array_push($this->socialNetworkElements, $socialNetworkElement);
	}
}

class ModelFooter{
	function ModelFooter(){
		
	}
	
	function getFooter(){
		$facebookElement = new SocialNetworkFooterElement("https://www.facebook.com/pages/Plaza-Nueva-Granada/296851400385623?ref=br_rs", "Imagenes/facebook-logo-new.png");
		$twitter = new SocialNetworkFooterElement("https://www.twitter.com/", "Imagenes/icono_Twitter.png");
		$footerContent = new FooterContent();
		$footerContent->addSocialNetworkElement($facebookElement);
		$footerContent->addSocialNetworkElement($twitter);
		
		return $footerContent;
	}	
}
?>