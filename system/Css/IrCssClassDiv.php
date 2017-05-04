<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrCssClassDiv extends \IrCssClassFather {

	function __construct ($className) {
		parent::__construct ('div', $className) ;
		
		$this->setMargin (0, 0, 0, 0) ;
		$this->setPadding (0, 0, 0, 0) ;
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
