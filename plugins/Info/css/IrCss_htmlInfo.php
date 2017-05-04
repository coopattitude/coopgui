<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
*
*
* @author	COOPATTITUDE
* @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
*/



class IrCss_htmlInfo extends \IrCssFather {

	function __construct ($irCommander, $irGenCss) {
		parent::__construct ($irCommander, $irGenCss) ;

		$this->init () ;
	}

	function init () {

		$this->responsive (0) ;

		unset ($tabWidth) ;
		$i = 0 ;

		$tabWidth [ $i ] = 480 ; ++$i ; // width >= 480 else if width = 0 = ''
		$tabWidth [ $i ] = 600 ; ++$i ;
		$tabWidth [ $i ] = 840 ; ++$i ;
		$tabWidth [ $i ] = 960 ; ++$i ;
		$tabWidth [ $i ] = 1280 ; ++$i ;
		$tabWidth [ $i ] = 1440 ; ++$i ; // width >= 1440

		$limit = count ($tabWidth) ;
		for ($i = 0 ; $i < $limit ; ++$i) {
			$this->responsive ($tabWidth [ $i ]) ;
		}

		$irCssClass = $this->add (new IrCssClassDiv ('htmlInfoBox')) ;
		$irCssClass->setDisplay ('block') ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setTextAlign ('center') ;
		$irCssClass->setBoxSizing ('border-box') ;

		$irCssClass->setBackgroundColor ('#f5f9fc') ;
		
// 		$irCssClass->setMarginBottom (20) ;
	}

	function responsive ($totalWidth) {
		$responsivePrefix = '_r_'.$totalWidth ;
		if ($totalWidth == 0) {
			$responsivePrefix = '' ;
		}

		//////////////////////////////////////////////////////

		$irCssRecipePolice = new IrCssRecipePolice ($this->irCommander, $this->irGenCss) ;
		$irCssRecipeBox = new IrCssRecipeBox ($this->irCommander, $this->irGenCss) ;

		//////////////////////////////////////////////////////
		
		$imgWidth = 450 ;
		$imgHeight = 250 ;
		
		$irCssClass = $this->add (new IrCssClassDiv ('htmlInfoBoxLeft'.$responsivePrefix)) ;
		
		if ($totalWidth >= 840) {
			$irCssClass->setDisplay ('inline-block') ;
			$irCssClass->setMargin (20, 20, 0, 30) ;
		}
		else {
			$irCssClass->setDisplay ('block') ;
			$irCssClass->setMargin (20, 'auto', 0, 'auto') ;
		}
		
		$irCssClass->setBoxSizing ('border-box') ;
		
		
		$irCssClass->setWidth ($imgWidth) ;
		$irCssClass->setHeight ($imgHeight) ;
		
		$irCssClass = $this->add (new IrCssClassDiv ('htmlInfoBoxLeftImg'.$responsivePrefix)) ;
		$irCssClass->setDisplay ('inline-block') ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setHeightPercent (100) ;
		
		//////////////////////////////////////////////////////
		
		$irCssClass = $this->add (new IrCssClassDiv ('htmlInfoBoxRight'.$responsivePrefix)) ;
		$irCssClass->setDisplay ('inline-block') ;
		
		if ($totalWidth >= 840) {
			$irCssClass->setWidthCalc (100, $imgWidth+30+20+20) ;
		}
		else {
			$irCssClass->setWidthCalc (100, 20) ;
		}
		
		$irCssClass->setMargin (20, 20, 0, 0) ;
		
		$irCssClass = $this->add (new IrCssClassDiv ('htmlInfoBoxRightTop'.$responsivePrefix)) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setBoxSizing ('border-box') ;
		
		//////////////////
		
		$irCssClass = $this->add (new IrCssClassDiv ('htmlInfoBoxRightTopTitle'.$responsivePrefix)) ;
		$irCssClass->setDisplay ('block') ;
		
		$irCssClass->setBoxSizing ('border-box') ;
		$irCssClass->setPadding (0, 0, 0, 0) ;
		$this->setTextTop ($irCssClass) ;
		$irCssClass->setLimitedForNbLine (1) ;
		
		//////////
		
		$irCssClass = $this->add (new IrCssClassDiv ('htmlInfoBoxRightTopTop'.$responsivePrefix)) ;
		$irCssClass->setDisplay ('block') ;
		
		$irCssClass->setBoxSizing ('border-box') ;
		$irCssClass->setPadding (0, 0, 0, 0) ;
		$this->setTextTop ($irCssClass) ;
		$irCssClass->setLimitedForNbLine (1) ;
		
		//////////////////////////////////////////////////////
		
		$irCssClass = $this->add (new IrCssClassDiv ('htmlInfoBoxRightTopMiddle'.$responsivePrefix)) ;
		$irCssClass->setDisplay ('block') ;
		$irCssClass->setBoxSizing ('border-box') ;
		$irCssClass->setPadding (0, 0, 0, 0) ;
		$this->setTextMiddle ($irCssClass) ;
		$irCssClass->setLimitedForNbLine (1) ;
		
		//////////////////
		
		$irCssClass = $this->add (new IrCssClassDiv ('htmlInfoBoxRightTopBottom'.$responsivePrefix)) ;
		$irCssClass->setDisplay ('block') ;
		$irCssClass->setBoxSizing ('border-box') ;
		$irCssClass->setPadding (0, 0, 0, 0) ;
		$this->setTextOwner ($irCssClass) ;
		$irCssClass->setLimitedForNbLine (1) ;
		$irCssClass->setCursor ('pointer') ;
		
		//////////////////////////////////////////////////////
	}
	
	function setTextTop ($irCssClass) {
		{
			$irCssClass->setColor ($this->colorTitle) ;
				
			$fontFamily = 'roboto, "Segoe UI", Tahoma, Arial, Verdana' ;
			$fontStyle = 'normal' ;
			$fontVariant = 'normal' ;
			$fontWeight = 'normal' ;
			$fontSize = 1.5 ;
	
			$irCssClass->setUpperCase (true) ;
	
			$irCssClass->setFontMini ($fontFamily, $fontStyle, $fontVariant, $fontWeight, $fontSize) ;
		}
	}
	
	function setTextMiddle ($irCssClass) {
		{
			$irCssClass->setColor ($this->colorTitle) ;
				
			$fontFamily = 'roboto, "Segoe UI", Tahoma, Arial, Verdana' ;
			$fontStyle = 'normal' ;
			$fontVariant = 'normal' ;
			$fontWeight = 'normal' ;
			$fontSize = 1.5 ;
	
			$irCssClass->setUpperCase (true) ;
	
			$irCssClass->setFontMini ($fontFamily, $fontStyle, $fontVariant, $fontWeight, $fontSize) ;
		}
	}
	
	function setTextOwner ($irCssClass) {
		$irCssClass->setColor ('#526168') ;
	
		$fontFamily = 'roboto, "Segoe UI", Arial, Tahoma, Verdana' ;
		$fontStyle = 'italic' ;
		$fontVariant = 'normal' ;
		$fontWeight = 'normal' ;
		$fontSize = 1.2 ;
	
		$irCssClass->setFontMini ($fontFamily, $fontStyle, $fontVariant, $fontWeight, $fontSize) ;
	}
}
?>
