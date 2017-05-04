<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrCssRecipePolice extends IrCssRecipe {
	
	var $color1 ;
	var $color2 ;
	var $color3 ;
	var $color4 ;
	var $colorAlert ;
	
	var $colorGray ;
	
	var $colorFocus ;
	
	var $fontSizeBodyText ;
	
	function __construct ($irCommander, $irGenCss) {
		parent::IrCssRecipe ($irCommander, $irGenCss) ;
		
		$this->color1 = $this->irGenCss->irEnvCustom->color1 ;
		$this->color2 = $this->irGenCss->irEnvCustom->color2 ;
		$this->color3 = $this->irGenCss->irEnvCustom->color3 ;
		$this->color4 = '#212b3d' ;
		$this->colorAlert = '#ed3830' ;
		
		$this->colorGray = '#505050' ;
		
		$this->colorFocus = '#F0A40C' ;
		
		$this->fontSizeBodyText = 1.4 ;
	}
	
	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////
	
	function setServiceTitle ($irCssClass) {
		$irCssClass->setColor ('#323232') ;
		
		$fontFamily = 'robotolight, "Segoe UI", Tahoma, Arial, Verdana' ;
		$fontStyle = 'normal' ;
		$fontVariant = 'normal' ;
		$fontWeight = 'normal' ;
		$fontSize = 3.5 ;
		
		$irCssClass->setFontMini ($fontFamily, $fontStyle, $fontVariant, $fontWeight, $fontSize) ;
	}
	
	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////
}
?>
