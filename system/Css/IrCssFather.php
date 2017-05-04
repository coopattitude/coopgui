<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrCssFather {
	var $irCommander ;
	var $irGenCss ;
	
	var $tabIrCssClass ;
	var $tabMediaIrCssClass ;
	var $tabMediaInfo ;
	
	var $mediaOpen ;
	var $mediaI ;
	
	var $loadStr ;
	
	function IrCssFather ($irCommander, $irGenCss) {
		$this->irCommander = $irCommander ;
		$this->irGenCss = $irGenCss ;
		
		unset ($this->tabIrCssClass) ;
		unset ($this->tabMediaIrCssClass) ;
		unset ($this->tabMediaInfo) ;
		
		$this->mediaOpen = false ;
		$this->mediaI = -1 ;
		
		$this->loadStr = '' ;
	}
	
	function add ($irCssClass) {
		
		if ($this->mediaOpen == false) {
			$this->preLoadToString () ;
		}
		
		if ($this->mediaOpen) {
			$this->tabMediaIrCssClass [ $this->mediaI ] [] = $irCssClass ;
		}
		else {
			$this->tabIrCssClass [] = $irCssClass ;
		}
		
		return $irCssClass ;
	}
	
	function openMedia ($info) {
		++ $this->mediaI ;
		$this->mediaOpen = true ;
		
		$this->tabMediaInfo [ $this->mediaI ] = $info ;
	}
	
	function closeMedia () {
		$this->mediaOpen = false ;
	}
	
	function preLoadToString () {
		$str = '' ;
		
		$limit = count ($this->tabIrCssClass) ;
		for ($i = 0 ; $i < $limit ; ++$i) {
			$irCssClass = $this->tabIrCssClass [ $i ] ;
				
			$str .= $irCssClass->toString ($this->irGenCss->css) ;
		}
		
		unset ($this->tabIrCssClass) ;
		
		$this->loadStr .= $str ;
	}
	
	function toString () {
		
		$this->preLoadToString () ;
	
		$str = $this->loadStr ;
		
		$limit = count ($this->tabMediaIrCssClass) ;
		for ($i = 0 ; $i < $limit ; ++$i) {
		
			$limit2 = count ($this->tabMediaIrCssClass [ $i ]) ;
		
			if ($limit2 > 0) {
				$info = $this->tabMediaInfo [ $i ] ;
		
				$str .= "\n" ;
				$str .= '@media '.$info ;
				$str .= "\n" ;
				$str .= ' {' ;
		
				for ($j = 0 ; $j < $limit2 ; ++$j) {
					$irCssClass = $this->tabMediaIrCssClass [ $i ] [ $j ] ;
		
					$str .= $irCssClass->toString ($this->irGenCss->css) ;
				}
		
				$str .= '}' ;
				$str .= "\n" ;
				$str .= "\n" ;
			}
		}
		
		return $str ;
	}
	
	function setBoxMargin ($irCssClass, $divName) {
		
		/*****************************5120px************************/
		$this->openMedia ('screen and (max-width:5120px)') ;
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidth (2000) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (900) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
		
		/*****************************3840px************************/
		$this->openMedia ('screen and (max-width:3840px)') ;
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidth (1800) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (900) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
		
		/*****************************1920px************************/
		$this->openMedia ('screen and (max-width:1920px)') ;
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidth (900) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (900) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
		
		/*****************************1600px************************/
		$this->openMedia ('screen and (max-width:1600px)') ;
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidth (900) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (900) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
		
		/*****************************1440px************************/
		$this->openMedia ('screen and (max-width:1520px)') ;
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (900) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
		
		/*****************************1440px************************/
		$this->openMedia ('screen and (max-width:1440px)') ;
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (900) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
		
		/*****************************1280px************************/
		$this->openMedia ('screen and (max-width:1280px)') ;
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (900) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		///////////////////////////////////////////////////////////////
	}
	
	function setBoxMarginBigger ($irCssClass, $divName) {
		
		/*****************************5120px************************/
		$this->openMedia ('screen and (max-width:5120px)') ;
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidth (2000) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (1300) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
		
		/*****************************3840px************************/
		$this->openMedia ('screen and (max-width:3840px)') ;
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidth (1800) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (1300) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
		
		/*****************************1920px************************/
		$this->openMedia ('screen and (max-width:1920px)') ;
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidth (900) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (1300) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
		
		/*****************************1600px************************/
		$this->openMedia ('screen and (max-width:1600px)') ;
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidth (900) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (1300) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
		
		/*****************************1440px************************/
		$this->openMedia ('screen and (max-width:1520px)') ;
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (1300) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
		
		/*****************************1440px************************/
		$this->openMedia ('screen and (max-width:1440px)') ;
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (1300) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
		
		/*****************************1280px************************/
		$this->openMedia ('screen and (max-width:1280px)') ;
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (1300) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
		
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		///////////////////////////////////////////////////////////////
	}
	
	function setBoxMarginBiggerBig ($irCssClass, $divName) {
	
		/*****************************5120px************************/
		$this->openMedia ('screen and (max-width:5120px)') ;
	
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		// 		$irCssClass->setWidth (2000) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (1400) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
	
		/*****************************3840px************************/
		$this->openMedia ('screen and (max-width:3840px)') ;
	
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		// 		$irCssClass->setWidth (1800) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (1400) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
	
		/*****************************1920px************************/
		$this->openMedia ('screen and (max-width:1920px)') ;
	
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		// 		$irCssClass->setWidth (900) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (1400) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
	
		/*****************************1600px************************/
		$this->openMedia ('screen and (max-width:1600px)') ;
	
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		// 		$irCssClass->setWidth (900) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (1400) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
	
		/*****************************1440px************************/
		$this->openMedia ('screen and (max-width:1520px)') ;
	
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (1400) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
	
		/*****************************1440px************************/
		$this->openMedia ('screen and (max-width:1440px)') ;
	
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (1400) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
	
		/*****************************1280px************************/
		$this->openMedia ('screen and (max-width:1280px)') ;
	
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMaxWidth (1400) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		$this->closeMedia () ;
		/**********************************************************/
	
		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
		$irCssClass->setWidthPercent (100) ;
		$irCssClass->setMarginLeft ('auto') ;
		$irCssClass->setMarginRight ('auto') ;
		$irCssClass->setFontSize ('') ;
		
		///////////////////////////////////////////////////////////////
	}
	
	function setBoxMarginBoxGateHome ($irCssClass, $divName) {
		$this->setBoxMargin ($irCssClass, $divName) ;
		return ;
// 		/*****************************1520px************************/
// 		$this->openMedia ('screen and (max-width:1520px)') ;
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMaxWidth (900) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		$this->closeMedia () ;
// 		/**********************************************************/
	
// 		/*****************************1440px************************/
// 		$this->openMedia ('screen and (max-width:1440px)') ;
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMaxWidth (900) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		$this->closeMedia () ;
// 		/**********************************************************/
	
// 		/*****************************1280px************************/
// 		$this->openMedia ('screen and (max-width:1280px)') ;
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMaxWidth (900) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		$this->closeMedia () ;
// 		/**********************************************************/
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		///////////////////////////////////////////////////////////////
	}
	
	function setBoxMarginBoxUserDashBoardPreview ($irCssClass, $divName) {
		$this->setBoxMargin ($irCssClass, $divName) ;
		return ;
// 		/*****************************1440px************************/
// 		$this->openMedia ('screen and (max-width:1520px)') ;
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMaxWidth (900) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		$this->closeMedia () ;
// 		/**********************************************************/
	
// 		/*****************************1440px************************/
// 		$this->openMedia ('screen and (max-width:1440px)') ;
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMaxWidth (900) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		$this->closeMedia () ;
// 		/**********************************************************/
	
// 		/*****************************1280px************************/
// 		$this->openMedia ('screen and (max-width:1280px)') ;
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMaxWidth (900) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		$this->closeMedia () ;
// 		/**********************************************************/
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		///////////////////////////////////////////////////////////////
	}
	
	function setBoxMarginBoxCommonRootDashBoardPreview ($irCssClass, $divName) {
	
		$this->setBoxMargin ($irCssClass, $divName) ;
		return ;
		
// 		/*****************************1440px************************/
// 		$this->openMedia ('screen and (max-width:1520px)') ;
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMaxWidth (900) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		$this->closeMedia () ;
// 		/**********************************************************/
	
// 		/*****************************1440px************************/
// 		$this->openMedia ('screen and (max-width:1440px)') ;
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMaxWidth (900) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		$this->closeMedia () ;
// 		/**********************************************************/
	
// 		/*****************************1280px************************/
// 		$this->openMedia ('screen and (max-width:1280px)') ;
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMaxWidth (900) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		$this->closeMedia () ;
// 		/**********************************************************/
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		///////////////////////////////////////////////////////////////
	}
	
	function setBoxMarginBoxCommonRootHomePagePreview ($irCssClass, $divName) {
		$this->setBoxMargin ($irCssClass, $divName) ;
		return ;
		
// 		/*****************************1440px************************/
// 		$this->openMedia ('screen and (max-width:1520px)') ;
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMaxWidth (900) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		$this->closeMedia () ;
// 		/**********************************************************/
	
// 		/*****************************1440px************************/
// 		$this->openMedia ('screen and (max-width:1440px)') ;
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMaxWidth (900) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		$this->closeMedia () ;
// 		/**********************************************************/
	
// 		/*****************************1280px************************/
// 		$this->openMedia ('screen and (max-width:1280px)') ;
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMaxWidth (900) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		$this->closeMedia () ;
// 		/**********************************************************/
	
// 		$irCssClass = $this->add (new IrCssClassDiv ($divName)) ;
// 		$irCssClass->setWidthPercent (100) ;
// 		$irCssClass->setMarginLeft ('auto') ;
// 		$irCssClass->setMarginRight ('auto') ;
	
// 		///////////////////////////////////////////////////////////////
	}
}
?>
