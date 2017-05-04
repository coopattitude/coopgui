<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrLibEnvCustom {
	var $irCommander ;
	
	var $xmlIntern ;
	
	var $color1 ;
	var $color2 ;
	var $color3 ;
	var $colorAlert ;
	
	var $bg ;
	var $ref ;
	
	var $refCss ;
	var $refJs ;
	
	var $cssVersion ;
	var $jsVersion ;
	
	function __construct ($irCommander) {
		$this->irCommander = $irCommander ;
		
		$this->xmlIntern = '' ;
		
		$this->color1 = '#474385' ;
		$this->color2 = '#6460a0' ;
		$this->color3 = '#5c9da1' ;
		$this->colorAlert = '#d32d00' ;
		
		$this->bg = '' ;
		$this->ref = '' ;
		
		$this->refCss = 'css1' ;
		$this->refJs = 'js1' ;
		
		$this->cssVersion = $this->irCommander->getCssVersion () ;
		$this->jsVersion = $this->irCommander->getJsVersion () ;
	}
	
	function load ($xmlIntern) {
	}
}
?>
