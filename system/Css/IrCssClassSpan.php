<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrCssClassSpan extends \IrCssClassFather {

	function __construct ($className) {
		parent::__construct ('span', $className) ;
	}
	
	function setFontNormal ($fontSize, $textAlign) {
		$this->fontFamily = '"Segoe UI", Tahoma, Arial, Verdana' ;
		$this->fontStyle = 'normal' ;
		$this->fontVariant = 'normal' ;
		$this->fontWeight = 'normal' ;
		$this->fontSize = $fontSize ;
		$this->textAlign = $textAlign ;
	}
	
	function setFontItalic ($fontSize, $textAlign) {
		$this->fontFamily = '"Segoe UI", Tahoma, Arial, Verdana' ;
		$this->fontStyle = 'italic' ;
		$this->fontVariant = 'normal' ;
		$this->fontWeight = 'normal' ;
		$this->fontSize = $fontSize ;
		$this->textAlign = $textAlign ;
	}
	
	function setFontBold ($fontSize, $textAlign) {
		$this->fontFamily = '"Segoe UI", Tahoma, Arial, Verdana' ;
		$this->fontStyle = 'normal' ;
		$this->fontVariant = 'normal' ;
		$this->fontWeight = 'bold' ;
		$this->fontSize = $fontSize ;
		$this->textAlign = $textAlign ;
	}
}
?>
