<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrCssRecipeBox extends IrCssRecipe {

	var $color1 ;
	var $color2 ;
	var $color3 ;
	var $colorAlert ;

	var $colorGray ;
	
	function __construct ($irCommander, $irGenCss) {
		parent::IrCssRecipe ($irCommander, $irGenCss) ;

		$this->color1 = $this->irGenCss->irEnvCustom->color1 ;
		$this->color2 = $this->irGenCss->irEnvCustom->color2 ;
		$this->color3 = '#04143a' ;
		$this->colorAlert = $this->irGenCss->irEnvCustom->colorAlert ;
		$this->colorAlert = '#ff3838' ;
		
		$this->colorGray = '#505050' ;
	}

	function setLinkBig ($irCssClass) {
		$irCssClass->setCursor ('pointer') ;
		$irCssClass->setTextDecoration ('underline') ;
	}
}
?>
