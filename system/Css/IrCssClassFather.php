<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrCssClassFather {
	var $tagName ;
	var $className ;

	var $boxSizing ;
	var $display ;
	var $width ;
	var $widthCalcPercent ;
	var $widthCalcPixel ;
	var $widthPercent ;
	var $widthAuto ;
	var $minWidth ;
	var $minWidthPercent ;
	var $maxWidth ;
	var $maxWidthPercent ;
	var $height ;
	var $heightCalcPercent ;
	var $heightCalcPixel ;
	var $heightPercent ;
	var $heightAuto ;
	var $minHeight ;
	var $minHeightPercent ;
	var $maxHeight ;
	var $maxHeightCalcPercent ;
	var $maxHeightCalcPixel ;
	var $maxHeightPercent ;
	
	var $marginTop ;
	var $marginRight ;
	var $marginBottom ;
	var $marginLeft ;
	var $marginTopPercent ;
	var $marginRightPercent ;
	var $marginBottomPercent ;
	var $marginLeftPercent ;
	
	var $paddingTop ;
	var $paddingRight ;
	var $paddingBottom ;
	var $paddingLeft ;
	
	var $overflow ;
	
	var $border ;
	var $borderFull ;
	var $borderTop ;
	var $borderTopFull ;
	var $borderLeft ;
	var $borderLeftFull ;
	var $borderRight ;
	var $borderRightFull ;
	var $borderBottom ;
	var $borderBottomFull ;
	var $borderType ;
	var $borderCollapse ;
	
	var $backgroundColor ;
	var $backgroundColorRgba ;
	
	var $fontFamily ;
	var $fontStyle ;
	var $fontVariant ;
	var $fontWeight ;
	var $fontSize ;
	var $fontStretch ;
	
	var $textAlign ;
	var $cursor ;
	var $color ;
	var $lineHeight ;
	var $outline ;
	var $background ;
	var $backgroundMask ;
	var $backgroundPosition ;
	var $backgroundSize ;
	var $backgroundGradient ;
	var $backgroundRepeatLinearGradient ;
	var $position ;
	var $top ;
	var $topPercent ;
	var $left ;
	var $leftPercent ;
	var $right ;
	var $rightPercent ;
	var $bottom ;
	var $bottomPercent ;
	
	var $listStyle ;
	var $textDecoration ;
	var $textUnderlinePosition ;
	var $wordWrap ;
	var $wordBreak ;
	var $overflowX ;
	var $overflowY ;
	var $verticalAlign ;
	var $float ;
	var $borderColor ;
	var $zIndex ;
	var $borderRadius ;
	var $borderRadiusFull ;
	var $appearance ;
	var $boxShadowX ;
	var $boxShadowY ;
	var $boxShadowBlur ;
	var $boxShadowSpread ;
	var $boxShadowColor ;
	var $boxShadowFull ;
	var $filter ;
	var $opacity ;
	var $scaleX ;
	var $scaleY ;
	var $uppercase ;
	var $textIndent ;
	var $clear ;
	var $content ;
	var $viewport ;
	var $visibility ;
	var $resize ;
	var $zoom ;

	var $placeHolderColor ;
	
	var $autofill ;
	
	var $tabFont ;
	var $tabFontLimit ;
	
	function IrCssClassFather ($tagName, $className) {
		$this->tagName = $tagName ;
		$this->className = $className ;
		
		$this->boxSizing = '' ;
		$this->display = '' ;
		$this->width = '' ;
		$this->widthCalcPercent = '' ;
		$this->widthCalcPixel = '' ;
		$this->widthPercent = '' ;
		$this->widthAuto = '' ;
		$this->minWidth = '' ;
		$this->minWidthPercent = '' ;
		$this->maxWidth = '' ;
		$this->maxWidthPercent = '' ;
		$this->height = '' ;
		$this->heightCalcPercent = '' ;
		$this->heightCalcPixel = '' ;
		$this->heightPercent = '' ;
		$this->heightAuto = '' ;
		$this->minHeight = '' ;
		$this->minHeightPercent = '' ;
		$this->maxHeight = '' ;
		$this->maxHeightCalcPercent = '' ;
		$this->maxHeightCalcPixel = '' ;
		$this->maxHeightPercent = '' ;
		
		$this->marginTop = '' ;
		$this->marginRight = '' ;
		$this->marginBottom = '' ;
		$this->marginLeft = '' ;
		$this->marginTopPercent = '' ;
		$this->marginRightPercent = '' ;
		$this->marginBottomPercent = '' ;
		$this->marginLeftPercent = '' ;
		
		$this->paddingTop = '' ;
		$this->paddingRight = '' ;
		$this->paddingBottom = '' ;
		$this->paddingLeft = '' ;
		$this->paddingTopPercent = '' ;
		$this->paddingRightPercent = '' ;
		$this->paddingBottomPercent = '' ;
		$this->paddingLeftPercent = '' ;
		
		$this->overflow = '' ;
		
		$this->border = '' ;
		$this->borderFull = '' ;
		$this->borderTop = '' ;
		$this->borderTopFull = '' ;
		$this->borderLeft = '' ;
		$this->borderLeftFull = '' ;
		$this->borderRight = '' ;
		$this->borderRightFull = '' ;
		$this->borderBottom = '' ;
		$this->borderBottomFull = '' ;
		$this->borderType = '' ;
		$this->borderCollapse = '' ;
		
		$this->backgroundColor = '' ;
		$this->backgroundColorRgba = '' ;
		
		$this->fontFamily = '' ;
		$this->fontStyle = '' ;
		$this->fontVariant = '' ;
		$this->fontWeight = '' ;
		$this->fontSize = '' ;
		
		$this->textAlign = '' ;
		$this->cursor = '' ;
		$this->color = '' ;
		$this->lineHeight = '' ;
		$this->outline = '' ;
		$this->background = '' ;
		$this->backgroundMask = '' ;
		$this->backgroundPosition = '' ;
		$this->backgroundSize = '' ;
		$this->backgroundGradient = '' ;
		$this->backgroundRepeatLinearGradient = '' ;
		$this->position = '' ;
		$this->top = '' ;
		$this->topPercent = '' ;
		$this->left = '' ;
		$this->leftPercent = '' ;
		$this->resize = '' ;
		
		$this->listStyle = '' ;
		$this->textDecoration = '' ;
		$this->textUnderlinePosition = '' ;
		$this->wordWrap = '' ;
		$this->wordBreak = '' ;
		$this->overflowX = '' ;
		$this->overflowY = '' ;
		$this->verticalAlign = '' ;
		$this->float = '' ;
		$this->borderColor = '' ;
		$this->zIndex = '' ;
		$this->borderRadius = '' ;
		$this->borderRadiusFull ;
		$this->appearance = '' ;
		$this->boxShadowX = '' ;
		$this->boxShadowY = '' ;
		$this->boxShadowBlur = '' ;
		$this->boxShadowSpread = '' ;
		$this->boxShadowColor = '' ;
		$this->boxShadowFull = '' ;
		$this->filter = '' ;
		$this->opacity = '' ;
		$this->scaleX = '' ;
		$this->scaleY = '' ;
		$this->uppercase = '' ;
		$this->textIndent = '' ;
		$this->clear = '' ;
		$this->content = '' ;
		$this->viewport = '' ;
		$this->visibility = '' ;
		$this->zoom = '' ;

		$this->placeHolderColor = '' ;
		
		$this->autofill = '' ;
		
		$this->fontSize = 1.44 ;
		
		
		$this->tabFont = array () ;
		$this->tabFontLimit = 37 ;
		
		$i = 4 ;
		$this->tabFont [ $i ] = 0.55 ; $i = $i + 1 ; //0.4
		$this->tabFont [ $i ] = 0.7 ; $i = $i + 1 ; //0.5
		$this->tabFont [ $i ] = 0.8 ; $i = $i + 1 ; //0.6
		$this->tabFont [ $i ] = 1.15 ; $i = $i + 1 ; //0.7
		$this->tabFont [ $i ] = 1.39 ; $i = $i + 1 ; //0.8
		$this->tabFont [ $i ] = 1.35 ; $i = $i + 1 ; //0.9
		$this->tabFont [ $i ] = 1.3 ; $i = $i + 1 ; //1
		$this->tabFont [ $i ] = 1.38 ; $i = $i + 1 ; //1.1
		$this->tabFont [ $i ] = 1.5 ; $i = $i + 1 ; //1.2
		$this->tabFont [ $i ] = 1.47 ; $i = $i + 1 ; //1.3
		$this->tabFont [ $i ] = 1.5 ; $i = $i + 1 ; //1.4
		$this->tabFont [ $i ] = 1.5 ; $i = $i + 1 ; //1.5
		$this->tabFont [ $i ] = 1.4 ; $i = $i + 1 ; //1.6
		$this->tabFont [ $i ] = 1.38 ; $i = $i + 1 ; //1.7
		$this->tabFont [ $i ] = 1.4 ; $i = $i + 1 ; //1.8
		$this->tabFont [ $i ] = 1.38 ; $i = $i + 1 ; //1.9
		$this->tabFont [ $i ] = 1.3 ; $i = $i + 1 ; //2.0
		$this->tabFont [ $i ] = 1.3 ; $i = $i + 1 ; //2.1
		$this->tabFont [ $i ] = 1.37 ; $i = $i + 1 ; //2.2
		$this->tabFont [ $i ] = 1.35 ; $i = $i + 1 ; //2.3
		$this->tabFont [ $i ] = 1.3 ; $i = $i + 1 ; //2.4
		$this->tabFont [ $i ] = 1.3 ; $i = $i + 1 ; //2.5
		$this->tabFont [ $i ] = 1.21 ; $i = $i + 1 ; //2.6
		$this->tabFont [ $i ] = 1.35 ; $i = $i + 1 ; //2.7
		$this->tabFont [ $i ] = 1.27 ; $i = $i + 1 ; //2.8
		$this->tabFont [ $i ] = 1.33 ; $i = $i + 1 ; //2.9
		$this->tabFont [ $i ] = 1.3 ; $i = $i + 1 ; //3
		$this->tabFont [ $i ] = 1.3 ; $i = $i + 1 ; //3.1
		$this->tabFont [ $i ] = 1.3 ; $i = $i + 1 ; //3.2
		$this->tabFont [ $i ] = 1.28 ; $i = $i + 1 ; //3.3
		$this->tabFont [ $i ] = 1.3 ; $i = $i + 1 ; //3.4
		$this->tabFont [ $i ] = 1.3 ; $i = $i + 1 ; //3.5
		$this->tabFont [ $i ] = 1.3 ; $i = $i + 1 ; //3.6
	}
	
	private function getCteFromFontSize () {
		
		$tmp = 0 ;
		
		//if (g()->contains ($this->fontFamily, 'roboto ') >= 0 || g()->contains ($this->fontFamily, 'roboto,') >= 0) {
		//if (g()->contains (strtolower ($this->fontFamily), 'robotolight') >= 0) {
		//if (g()->contains (strtolower ($this->fontFamily), 'robotomedium') >= 0) {
		// $this->fontStyle = 'italic' ;
		// $this->fontWeight = 'bold' ;
			
		//lineHeight = font*1.375
		
		
		if ($this->fontSize == '' || $this->fontSize == 0) {
			$this->fontSize = 1.44 ;
		}
		
// 		$this->uppercase = true ;
		$cteUppercase = 0 ;
		if ($this->uppercase == true) {
			$cteUppercase = -0.1 ;
		}
		
		{
			$limit = $this->tabFontLimit ;
			
			for ($i = 4 ; $i < $limit ; $i = $i + 1) {
				
				if ($this->fontSize >= ($i/10) && $this->fontSize < ($i+1)/10) {
					$tmp = $this->fontSize * 10 * ($this->tabFont [ $i ] + $cteUppercase) ;
					break ;
				}
			}

			if ($tmp == 0) {
				
				if ($this->fontSize > 3.6) {
					$tmp = $this->fontSize * 10 * (1.3 + $cteUppercase) ;
				}
				else {
					$tmp = $this->fontSize * 10 * (1.45 + $cteUppercase) ;
				}
			}
		}
		
		return $tmp ;
	}
	
	function setLimitedForNbLine ($nbLine) {
		$this->setLimitedForNbOfLineMoreGen ($nbLine, 0, '') ;
	}
	
	function setLimitedForNbLineWithLineHeightParam ($nbLine, $lineHeightParam) {
		$this->setLimitedForNbOfLineMoreGen ($nbLine, 0, $lineHeightParam) ;
	}
	
	function setLimitedForNbOfLineMore ($nbLine, $more) {
		$this->setLimitedForNbOfLineMoreGen ($nbLine, $more, '') ;
	}
	
	function setLimitedForNbOfLineMoreGen ($nbLine, $more, $lineHeightParam) {
		// 		$this->boxSizing = 'border-box' ;
		// 		$this->paddingTop = 20 ;
		// 		$this->paddingBottom = 20 ;
		// 		$this->marginBottom = 20 ;
		
		if ($this->paddingBottom != '') {
			$this->paddingBottom = 0 ; // no padding-bottom, overflow hidden don't run if any !
		}
		
		// ATTENTION : si boxsizing : border-box, je dois prendre en compte les padding top et bottom
		if ($this->boxSizing == 'border-box') {
			$paddingTop = 0 ;
			$paddingBottom = 0 ;
			if ($this->paddingTop != '') {
				$paddingTop = $this->paddingTop ;
			}
			if ($this->paddingBottom != '') {
				$paddingBottom = $this->paddingBottom ;
			}
			
			if ($this->borderTop != '') {
				if (is_numeric ($this->borderTop)) {
					$borderTop = $this->borderTop ;
				}
			}
			else if ($this->border != '') {
				if (is_numeric ($this->border)) {
					$borderTop = $this->border ;
				}
			}
			
			$more = $more + $paddingTop + $paddingBottom + $borderTop ;
		}
		
		$cte = $this->getCteFromFontSize () ;
		
		$this->lineHeight = $cte/10 ; // in rem
		
		if ($lineHeightParam == 'mini') { // mini lineHeight
			$this->lineHeight = $this->lineHeight - 0.1 ;
		}
		else if ($lineHeightParam == 'up') { // up lineHeight
			$this->lineHeight = $this->lineHeight + 0.2 ;
		}
		else if ($lineHeightParam == 'upup') { // up up lineHeight
			$this->lineHeight = $this->lineHeight + 0.4 ;
		}
		
		$maxHeight = ($this->lineHeight*10) * $nbLine + $more ; // in px
		
		$this->maxHeight = $maxHeight ;
		$this->wordWrap = 'break-word' ;
		$this->overflow = 'hidden' ;
	}
	
	function setLimitedForHeight ($height) {
		$cte = $this->getCteFromFontSize () ;
		
		$nb = $height / $cte ;
		
		$nb = floor ($nb) ;
		
		$this->setLimitedForNbOfLineMore ($nb, 0) ;
	}
	
	function setGenericBoxBodyBorder () {
		$this->setBoxSizing ('border-box') ;
		$this->setPadding (10, 10, 10, 10) ;
		$this->setBorder (1) ;
		$this->setBorderType ('solid') ;
		$this->setBorderColor ('#e6e6e6') ;
		$this->setBorderRadius (2) ;
	}
	
	function setBoxSizing ($boxSizing) {
		$this->boxSizing = $boxSizing ;
	}
	
	function setDisplay ($display) {
		$this->display = $display ;
	}
	
	function setWidth ($width) {
		$this->width = $width ;
	}
	
	function setWidthCalc ($widthCalcPercent, $widthCalcPixel) {
		$this->widthCalcPercent = $widthCalcPercent ;
		$this->widthCalcPixel = $widthCalcPixel ;
	}
	
	function setWidthPercent ($width) {
		$this->widthPercent = $width ;
	}
	
	function setWidthAuto ($width) {
		$this->widthAuto = $width ;
	}
	
	function setMinWidth ($minWidth) {
		$this->minWidth = $minWidth ;
	}
	
	function setMinWidthPercent ($minWidth) {
		$this->minWidthPercent = $minWidth ;
	}
	
	function setMaxWidth ($maxWidth) {
		$this->maxWidth = $maxWidth ;
	}
	
	function setMaxWidthPercent ($maxWidth) {
		$this->maxWidthPercent = $maxWidth ;
	}
	
	function setHeight ($height) {
		$this->height = $height ;
	}
	
	function setHeightCalc ($heightCalcPercent, $heightCalcPixel) {
		$this->heightCalcPercent = $heightCalcPercent ;
		$this->heightCalcPixel = $heightCalcPixel ;
	}
	
	function setHeightPercent ($height) {
		$this->heightPercent = $height ;
	}
	
	function setHeightAuto ($height) {
		$this->heightAuto = $height ;
	}
	
	function setMinHeight ($minHeight) {
		$this->minHeight = $minHeight ;
	}
	
	function setMinHeightPercent ($minHeight) {
		$this->minHeightPercent = $minHeight ;
	}
	
	function setMaxHeight ($maxHeight) {
		$this->maxHeight = $maxHeight ;
	}
	
	function setMaxHeightCalc ($maxHeightCalcPercent, $maxHeightCalcPixel) {
		$this->maxHeightCalcPercent = $maxHeightCalcPercent ;
		$this->maxHeightCalcPixel = $maxHeightCalcPixel ;
	}
	
	function setMaxHeightPercent ($maxHeight) {
		$this->maxHeightPercent = $maxHeight ;
	}
	
	function setMarginTop ($marginTop) {
		$this->marginTop = $marginTop ;
	}
	
	function setMarginRight ($marginRight) {
		$this->marginRight = $marginRight ;
	}
	
	function setMarginBottom ($marginBottom) {
		$this->marginBottom = $marginBottom ;
	}
	
	function setMarginLeft ($marginLeft) {
		$this->marginLeft = $marginLeft ;
	}
	
	function setMarginTopPercent ($marginTopPercent) {
		$this->marginTopPercent = $marginTopPercent ;
	}
	
	function setMarginRightPercent ($marginRightPercent) {
		$this->marginRightPercent = $marginRightPercent ;
	}
	
	function setMarginBottomPercent ($marginBottom) {
		$this->marginBottomPercent = $marginBottomPercent ;
	}
	
	function setMarginLeftPercent ($marginLeftPercent) {
		$this->marginLeftPercent = $marginLeftPercent ;
	}
	

	
	function setMargin ($marginTop, $marginRight, $marginBottom, $marginLeft) {
		$this->marginTop = $marginTop ;
		$this->marginRight = $marginRight ;
		$this->marginBottom = $marginBottom ;
		$this->marginLeft = $marginLeft ;
	}
	
	function setPaddingTop ($paddingTop) {
		$this->paddingTop = $paddingTop ;
	}
	
	function setPaddingRight ($paddingRight) {
		$this->paddingRight = $paddingRight ;
	}
	
	function setPaddingBottom ($paddingBottom) {
		$this->paddingBottom = $paddingBottom ;
	}
	
	function setPaddingLeft ($paddingLeft) {
		$this->paddingLeft = $paddingLeft ;
	}
	
	function setPaddingTopPercent ($paddingTopPercent) {
		$this->paddingTopPercent = $paddingTopPercent ;
	}
	
	function setPaddingRightPercent ($paddingRightPercent) {
		$this->paddingRightPercent = $paddingRightPercent ;
	}
	
	function setPaddingBottomPercent ($paddingBottomPercent) {
		$this->paddingBottomPercent = $paddingBottomPercent ;
	}
	
	function setPaddingLeftPercent ($paddingLeftPercent) {
		$this->paddingLeftPercent = $paddingLeftPercent ;
	}
	
	
	function setPadding ($paddingTop, $paddingRight, $paddingBottom, $paddingLeft) {
		$this->paddingTop = $paddingTop ;
		$this->paddingRight = $paddingRight ;
		$this->paddingBottom = $paddingBottom ;
		$this->paddingLeft = $paddingLeft ;
	}
	
	function setOverflow ($overflow) {
		$this->overflow = $overflow ;
	}
	
	function setResize ($limit) {
		$this->resize=$limit;
	}
	
	function setBorder ($border) {
		$this->border = $border ;
	}
	
	function setBorderFull ($borderFull) {
		$this->borderFull = $borderFull ;
	}
	
	function setBorderTop ($border) {
		$this->borderTop = $border ;
	}
	
	function setBorderTopFull ($borderFull) {
		$this->borderTopFull = $borderFull ;
	}
	
	function setBorderLeft ($border) {
		$this->borderLeft = $border ;
	}
	
	function setBorderLeftFull ($borderFull) {
		$this->borderLeftFull = $borderFull ;
	}
	
	function setBorderRight ($border) {
		$this->borderRight = $border ;
	}
	
	function setBorderRightFull ($borderFull) {
		$this->borderRightFull = $borderFull ;
	}
	
	function setBorderBottom ($border) {
		$this->borderBottom = $border ;
	}
	
	function setBorderBottomFull ($borderFull) {
		$this->borderBottomFull = $borderFull ;
	}
	
	function setBorderType ($borderType) {
		$this->borderType = $borderType ;
	}
	
	function setBorderCollapse ($borderCollapse) {
		$this->borderCollapse = $borderCollapse ;
	}
	
	function setFont ($fontFamily, $fontStyle, $fontVariant, $fontWeight, $fontSize, $fontStretch) {
		$this->fontFamily = $fontFamily ;
		$this->fontStyle = $fontStyle ;
		$this->fontVariant = $fontVariant ;
		$this->fontWeight = $fontWeight ;
		$this->fontSize = $fontSize ;
		$this->fontStretch = $fontStretch ;
	}
	
	function setFontMini ($fontFamily, $fontStyle, $fontVariant, $fontWeight, $fontSize) {
		$this->fontFamily = $fontFamily ;
		$this->fontStyle = $fontStyle ;
		$this->fontVariant = $fontVariant ;
		$this->fontWeight = $fontWeight ;
		$this->fontSize = $fontSize ;
		$this->fontStretch = '' ;
	}
	
	function setFontSize ($fontSize) {
		$this->fontSize = $fontSize ;
	}
	
	function setFontFamily ($fontFamily) {
		$this->fontFamily = $fontFamily ;
	}
	
	function setFontWeight ($fontWeight) {
		$this->fontWeight = $fontWeight ;
	}
	
	function setTextAlign ($textAlign) {
		$this->textAlign = $textAlign ;
	}
	
	function setCursor ($cursor) {
		$this->cursor = $cursor ;
	}
	
	function setColor ($color) {
		$this->color = $color ;
	}
	
	function setLineHeight ($lineHeight) {
		$this->lineHeight = $lineHeight ;
	}
	
	function setOutline ($outline) {
		$this->outline = $outline ;
	}
	
	function setBackground ($background) {
		$this->background = $background ;
	}
	
	function setBackgroundMask ($backgroundMask) {
		$this->backgroundMask = $backgroundMask ;
	}
	
	function setBackgroundPosition ($backgroundPosition) {
		$this->backgroundPosition = $backgroundPosition ;
	}
	
	function setBackgroundColor ($backgroundColor) {
		$this->backgroundColor = $backgroundColor ;
	}
	
	function setBackgroundColorRgba ($backgroundColorRgba) {
		$this->backgroundColorRgba = $backgroundColorRgba ;
	}
	
	function setBackgroundSize ($backgroundSize) {
		$this->backgroundSize = $backgroundSize ;
	}
	
	function setBackgroundGradient ($backgroundGradient) {
		$this->backgroundGradient = $backgroundGradient ;
	}
	
// 	setBackgroundRepeatLinearGradient ('45deg, rgba(255,255,255,0) , rgba(255,255,255,0) 10px, rgba(255,255,255,1) 10px, rgba(255,255,255,1) 20px') ;
	function setBackgroundRepeatLinearGradient ($backgroundRepeatLinearGradient) {
		$this->backgroundRepeatLinearGradient = $backgroundRepeatLinearGradient ;
	}
	
	function setPosition ($position) {
		$this->position = $position ;
	}
	
	function setTop ($top) {
		$this->top = $top ;
	}
	
	function setTopPercent ($topPercent) {
		$this->topPercent = $topPercent ;
	}
	
	function setLeft ($left) {
		$this->left = $left ;
	}
	
	function setLeftPercent ($leftPercent) {
		$this->leftPercent = $leftPercent ;
	}
	
	function setRight ($right) {
		$this->right = $right ;
	}
	
	function setRightPercent ($rightPercent) {
		$this->rightPercent = $rightPercent ;
	}
	
	function setBottom ($bottom) {
		$this->bottom = $bottom ;
	}
	
	function setBottomPercent ($bottomPercent) {
		$this->bottomPercent = $bottomPercent ;
	}
	
	function setListStyle ($listStyle) {
		$this->listStyle = $listStyle ;
	}
	
	function setTextDecoration ($textDecoration) {
		$this->textDecoration = $textDecoration ;
	}
	
	function setTextUnderlinePosition ($textUnderlinePosition) {
		$this->textUnderlinePosition = $textUnderlinePosition ;
	}
	
	function setWordWrap ($wordWrap) {
		$this->wordWrap = $wordWrap ;
	}
	
	function setWordBreak ($wordBreak) {
		$this->wordBreak = $wordBreak ;
	}
	
	function setOverflowX ($overflowX) {
		$this->overflowX = $overflowX ;
	}
	
	function setOverflowY ($overflowY) {
		$this->overflowY = $overflowY ;
	}
	
	function setVerticalAlign ($verticalAlign) {
		$this->verticalAlign = $verticalAlign ;
	}
	
	function setFloat ($float) {
		$this->float = $float ;
	}
	
	function setBorderColor ($borderColor) {
		$this->borderColor = $borderColor ;
	}
	
	function setZIndex ($zIndex) {
		$this->zIndex = $zIndex ;
	}
	
	function setBorderRadius ($borderRadius) {
		$this->borderRadius = $borderRadius ;
	}
	
	function setBorderRadiusFull ($borderRadiusFull) {
		$this->borderRadiusFull = $borderRadiusFull ;
	}
	
	function setAppearance ($appearance) {
		$this->appearance = $appearance ;
	}
	
	function setBoxShadow ($boxShadowX, $boxShadowY, $boxShadowBlur, $boxShadowSpread, $boxShadowColor) {
		$this->boxShadowX = $boxShadowX ;
		$this->boxShadowY = $boxShadowY ;
		$this->boxShadowBlur = $boxShadowBlur ;
		$this->boxShadowSpread = $boxShadowSpread ;
		$this->boxShadowColor = $boxShadowColor ;
	}
	
	function setBoxShadowFull ($boxShadowFull) {
		$this->boxShadowFull = $boxShadowFull ;
	}
	
	function setFilter ($filter) {
		$this->filter = $filter ;
	}
	
	function setOpacity ($opacity) {
		$this->opacity = $opacity ;
	}
	
	function setScale ($scaleX, $scaleY) {
		$this->scaleX = $scaleX ;
		$this->scaleY = $scaleY ;
	}
	
	function setUppercase ($uppercase) {
		$this->uppercase = $uppercase ;
	}
	
	function setTextIndent ($textIndent) {
		$this->textIndent = $textIndent ;
	}
	
	function setClear ($clear) {
		$this->clear = $clear ;
	}
	
	function setContent ($content) {
		$this->content = $content ;
	}
	
	function setViewport ($viewport) {
		$this->viewport = $viewport ;
	}
	
	function setVisibility ($visibility) {
		$this->visibility = $visibility ;
	}
	
	function setPlaceholderColor ($placeholderColor) {
		$this->placeholderColor = $placeholderColor ;
	}
	
	function setAutofill ($autofill) {
		$this->autofill = $autofill ;
	}
	
	function setZoomPercent ($zoom)
	{
		$this->zoom = $zoom ;
	}
	
	function repairBugFireFoxMargeMerge () {
		
		if ((is_numeric ($this->marginTop) && $this->marginTop != 0)
			|| (is_numeric ($this->marginBottom) && $this->marginBottom != 0)) {
			
			if (is_numeric ($this->paddingTop) && $this->paddingTop == 0) {
				$this->paddingTop = 0.1 ;
			}
			
			if (is_numeric ($this->paddingBottom) && $this->paddingBottom == 0) {
				$this->paddingBottom = 0.1 ;
			}
			
			if ($this->paddingTop == '') {
				$this->paddingTop = 0.1 ;
			}
			
			if ($this->paddingBottom == '') {
				$this->paddingBottom = 0.1 ;
			}
		}
	}
	
	function toString ($css) {
		$this->repairBugFireFoxMargeMerge () ;
		
		$str = '' ;
		
		if ($this->tagName != '' && $this->className == '') {
			if ($css == '') {
				$str .= $this->tagName.' {' ;
				$str .= "\n" ;
			}
			else {
				$str .= $this->tagName.'.'.$css.'_ {' ;
				$str .= "\n" ;
			}
		}
		
		if ($this->className != '' && $this->className != '') {
			
			if ($css == '') {
				$str .= $this->tagName.'.'.$this->className.' {' ;
				$str .= "\n" ;
			}
			else {
				$str .= $this->tagName.'.'.$css.'_'.$this->className.' {' ;
				$str .= "\n" ;
			}
		}
		
		if ($this->autofill != '') {
			$str .= "\t" ;
			$str .= '-webkit-box-shadow: 0 0 0px 1000px white inset;-webkit-text-fill-color: #a9a9a9 !important;' ;
			$str .= "\n" ;
		}
		
		if ($this->boxSizing != '') {
			$str .= "\t" ;
			$str .= 'box-sizing : '.$this->boxSizing.' ;' ;
			$str .= '-webkit-box-sizing : '.$this->boxSizing.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->display != '') {
			$str .= "\t" ;
			$str .= 'display : '.$this->display.' ;' ;
			$str .= "\n" ;
		}
		if ($this->resize != '') {
			$str .= "\t" ;
			$str .= 'resize : '.$this->resize.' ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->width)) {
			$str .= "\t" ;
			$str .= 'width : '.$this->width.'px ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->widthCalcPercent) && is_numeric ($this->widthCalcPixel)) {
			$str .= "\t" ;
			$str .= 'width : calc('.$this->widthCalcPercent.'% - '.$this->widthCalcPixel.'px) ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->widthPercent)) {
			$str .= "\t" ;
			$str .= 'width : '.$this->widthPercent.'% ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->widthAuto)) {
			$str .= "\t" ;
			$str .= 'width : '.$this->widthAuto.' ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->minWidth)) {
			$str .= "\t" ;
			$str .= 'min-width : '.$this->minWidth.'px ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->minWidthPercent)) {
			$str .= "\t" ;
			$str .= 'min-width : '.$this->minWidthPercent.'% ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->maxWidth)) {
			$str .= "\t" ;
			$str .= 'max-width : '.$this->maxWidth.'px ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->maxWidthPercent)) {
			$str .= "\t" ;
			$str .= 'max-width : '.$this->maxWidthPercent.'% ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->height)) {
			$str .= "\t" ;
			$str .= 'height : '.$this->height.'px ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->heightCalcPercent) && is_numeric ($this->heightCalcPixel)) {
			$str .= "\t" ;
			$str .= 'height : calc('.$this->heightCalcPercent.'% - '.$this->heightCalcPixel.'px) ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->heightPercent)) {
			$str .= "\t" ;
			$str .= 'height : '.$this->heightPercent.'% ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->heightAuto)) {
			$str .= "\t" ;
			$str .= 'height : '.$this->heightAuto.' ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->minHeight)) {
			$str .= "\t" ;
			$str .= 'min-height : '.$this->minHeight.'px ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->minHeightPercent)) {
			$str .= "\t" ;
			$str .= 'min-height : '.$this->minHeightPercent.'% ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->maxHeight)) {
			$str .= "\t" ;
			$str .= 'max-height : '.$this->maxHeight.'px ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->maxHeightCalcPercent) && is_numeric ($this->maxHeightCalcPixel)) {
			$str .= "\t" ;
			$str .= 'max-height : calc('.$this->maxHeightCalcPercent.'% - '.$this->maxHeightCalcPixel.'px) ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->maxHeightPercent)) {
			$str .= "\t" ;
			$str .= 'max-height : '.$this->maxHeightPercent.'% ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->marginTop) && is_numeric ($this->marginRight) && is_numeric ($this->marginBottom) && is_numeric ($this->marginLeft)) {
			$str .= "\t" ;
			$str .= 'margin : '.$this->marginTop.'px '.$this->marginRight.'px '.$this->marginBottom.'px '.$this->marginLeft.'px ;' ;
			$str .= "\n" ;
		}
		else {
			if (is_numeric ($this->marginTop)) {
				$str .= "\t" ;
				$str .= 'margin-top : '.$this->marginTop.'px ;' ;
				$str .= "\n" ;
			}
			if (is_numeric ($this->marginRight)) {
				$str .= "\t" ;
				$str .= 'margin-right : '.$this->marginRight.'px ;' ;
				$str .= "\n" ;
			}
			if (is_numeric ($this->marginBottom)) {
				$str .= "\t" ;
				$str .= 'margin-bottom : '.$this->marginBottom.'px ;' ;
				$str .= "\n" ;
			}
			if (is_numeric ($this->marginLeft)) {
				$str .= "\t" ;
				$str .= 'margin-left : '.$this->marginLeft.'px ;' ;
				$str .= "\n" ;
			}
		}
		
		if (is_numeric ($this->marginTopPercent)) {
			$str .= "\t" ;
			$str .= 'margin-top : '.$this->marginTopPercent.'% ;' ;
			$str .= "\n" ;
		}
		if (is_numeric ($this->marginRightPercent)) {
			$str .= "\t" ;
			$str .= 'margin-right : '.$this->marginRightPercent.'% ;' ;
			$str .= "\n" ;
		}
		if (is_numeric ($this->marginBottomPercent)) {
			$str .= "\t" ;
			$str .= 'margin-bottom : '.$this->marginBottomPercent.'% ;' ;
			$str .= "\n" ;
		}
		if (is_numeric ($this->marginLeftPercent)) {
			$str .= "\t" ;
			$str .= 'margin-left : '.$this->marginLeftPercent.'% ;' ;
			$str .= "\n" ;
		}
		
		if ((string) $this->marginTop == 'auto') {
			$str .= "\t" ;
			$str .= 'margin-top : '.$this->marginTop.' ;' ;
			$str .= "\n" ;
		}
		if ((string) $this->marginRight == 'auto') {
			$str .= "\t" ;
			$str .= 'margin-right : '.$this->marginRight.' ;' ;
			$str .= "\n" ;
		}
		if ((string) $this->marginBottom == 'auto') {
			$str .= "\t" ;
			$str .= 'margin-bottom : '.$this->marginBottom.' ;' ;
			$str .= "\n" ;
		}
		if ((string) $this->marginLeft == 'auto') {
			$str .= "\t" ;
			$str .= 'margin-left : '.$this->marginLeft.' ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->paddingTop) && is_numeric ($this->paddingRight) && is_numeric ($this->paddingBottom) && is_numeric ($this->paddingLeft)) {
			$str .= "\t" ;
			$str .= 'padding : '.$this->paddingTop.'px '.$this->paddingRight.'px '.$this->paddingBottom.'px '.$this->paddingLeft.'px ;' ;
			$str .= "\n" ;
		}
		else {
			if (is_numeric ($this->paddingTop)) {
				$str .= "\t" ;
				$str .= 'padding-top : '.$this->paddingTop.'px ;' ;
				$str .= "\n" ;
			}
			if (is_numeric ($this->paddingRight)) {
				$str .= "\t" ;
				$str .= 'padding-right : '.$this->paddingRight.'px ;' ;
				$str .= "\n" ;
			}
			if (is_numeric ($this->paddingBottom)) {
				$str .= "\t" ;
				$str .= 'padding-bottom : '.$this->paddingBottom.'px ;' ;
				$str .= "\n" ;
			}
			if (is_numeric ($this->paddingLeft)) {
				$str .= "\t" ;
				$str .= 'padding-left : '.$this->paddingLeft.'px ;' ;
				$str .= "\n" ;
			}
		}
		
		if ((string) $this->paddingTop == 'auto') {
			$str .= "\t" ;
			$str .= 'padding-top : '.$this->paddingTop.' ;' ;
			$str .= "\n" ;
		}
		if ((string) $this->paddingRight == 'auto') {
			$str .= "\t" ;
			$str .= 'padding-right : '.$this->paddingRight.' ;' ;
			$str .= "\n" ;
		}
		if ((string) $this->paddingBottom == 'auto') {
			$str .= "\t" ;
			$str .= 'padding-bottom : '.$this->paddingBottom.' ;' ;
			$str .= "\n" ;
		}
		if ((string) $this->paddingLeft == 'auto') {
			$str .= "\t" ;
			$str .= 'padding-left : '.$this->paddingLeft.' ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->paddingTopPercent)) {
			$str .= "\t" ;
			$str .= 'padding-top : '.$this->paddingTopPercent.'% ;' ;
			$str .= "\n" ;
		}
		if (is_numeric ($this->paddingRightPercent)) {
			$str .= "\t" ;
			$str .= 'padding-right : '.$this->paddingRightPercent.'% ;' ;
			$str .= "\n" ;
		}
		if (is_numeric ($this->paddingBottomPercent)) {
			$str .= "\t" ;
			$str .= 'padding-bottom : '.$this->paddingBottomPercent.'% ;' ;
			$str .= "\n" ;
		}
		if (is_numeric ($this->paddingLeftPercent)) {
			$str .= "\t" ;
			$str .= 'padding-left : '.$this->paddingLeftPercent.'% ;' ;
			$str .= "\n" ;
		}
		
		if ($this->overflow != '') {
			$str .= "\t" ;
			$str .= 'overflow : '.$this->overflow.' ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->border)) {
			$str .= "\t" ;
			
			if ($this->borderType == '') {
				$str .= 'border : '.$this->border.'px ;' ;
			}
			else {
				$str .= 'border : '.$this->borderType.' '.$this->border.'px ;' ;
			}
			$str .= "\n" ;
		}
		else {
			if ($this->borderType != '') {
				$str .= "\t" ;
				$str .= 'border : '.$this->borderType.' 0px ;' ;
				$str .= "\n" ;
			}
		}
		
		if ($this->borderFull != '') {
			$str .= "\t" ;
			$str .= 'border : '.$this->borderFull.' ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->borderTop)) {
			$str .= "\t" ;			
			$str .= 'border-top : '.$this->borderType.' '.$this->borderTop.'px ;' ;
			$str .= "\n" ;
		}
		if ($this->borderTopFull != '') {
			$str .= "\t" ;
			$str .= 'border-top : '.$this->borderTopFull.' ;' ;
			$str .= "\n" ;
		}
		if (is_numeric ($this->borderLeft)) {
			$str .= "\t" ;			
			$str .= 'border-left : '.$this->borderType.' '.$this->borderLeft.'px ;' ;
			$str .= "\n" ;
		}
		if ($this->borderLeftFull != '') {
			$str .= "\t" ;
			$str .= 'border-left : '.$this->borderLeftFull.' ;' ;
			$str .= "\n" ;
		}
		if (is_numeric ($this->borderRight)) {
			$str .= "\t" ;			
			$str .= 'border-right : '.$this->borderType.' '.$this->borderRight.'px ;' ;
			$str .= "\n" ;
		}
		if ($this->borderRightFull != '') {
			$str .= "\t" ;
			$str .= 'border-right : '.$this->borderRightFull.' ;' ;
			$str .= "\n" ;
		}
		if (is_numeric ($this->borderBottom)) {
			$str .= "\t" ;			
			$str .= 'border-bottom : '.$this->borderType.' '.$this->borderBottom.'px ;' ;
			$str .= "\n" ;
		}
		if ($this->borderBottomFull != '') {
			$str .= "\t" ;
			$str .= 'border-bottom : '.$this->borderBottomFull.' ;' ;
			$str .= "\n" ;
		}
		if (is_numeric ($this->borderCollapse)) {
			$str .= "\t" ;			
			$str .= 'border-collapse : '.$this->borderCollapse.' ;' ;
			$str .= "\n" ;
		}
		
// 		if ($this->lineHeight != '') {
// 			$str .= "\t" ;
// 			$str .= 'line-height : '.$this->lineHeight.' ;' ;
// // 			$str .= 'line-height : '.($this->fontSize*1.375).' ;' ;
// 			$str .= "\n" ;
// 		}
		
		if ($this->fontFamily != '') {
			$str .= "\t" ;
			$str .= 'font-family : '.$this->fontFamily.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->fontStyle != '') {
			$str .= "\t" ;
			$str .= 'font-style : '.$this->fontStyle.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->fontVariant != '') {
			$str .= "\t" ;
			$str .= 'font-variant : '.$this->fontVariant.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->fontWeight != '') {
			$str .= "\t" ;
			$str .= 'font-weight : '.$this->fontWeight.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->fontStretch != '') {
			$str .= "\t" ;
			$str .= 'font-stretch : '.$this->fontStretch.' ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->fontSize) && $this->fontSize > 0) {
			$str .= "\t" ;
			$str .= 'font-size : '.($this->fontSize*10).'px ;' ;
			$str .= 'font-size : '.$this->fontSize.'rem ;' ;
			$str .= "\n" ;
		
			$str .= "\t" ;
			if ($this->lineHeight != '') {
				$str .= 'line-height : '.($this->lineHeight).'rem ;' ;
			}
			else {
				$str .= 'line-height : '.($this->fontSize*1.375).'rem ;' ;
			}
			$str .= "\n" ;
		}
		else {
// 			if ($this->lineHeight != '') {
// 				$str .= 'line-height : '.($this->lineHeight).'rem ;' ;
// 			}
// 			else {
// 				$str .= 'line-height : '.($this->fontSize*1.375).'rem ;' ;
// 			}
		}
		
		if ($this->fontFamily != '') {
			$str .= "\t" ;
			$str .= 'font-family : '.$this->fontFamily.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->fontWeight != '') {
			$str .= "\t" ;
			$str .= 'font-weight : '.$this->fontWeight.' ;' ;
			$str .= "\n" ;
		}
				
		if ($this->textAlign != '') {
			$str .= "\t" ;
			$str .= 'text-align : '.$this->textAlign.' ;' ;
			$str .= "\n" ;
		}
				
		if ($this->cursor != '') {
			$str .= "\t" ;
			$str .= 'cursor : '.$this->cursor.' ;' ;
			$str .= 'cursor : -webkit-'.$this->cursor.' ;' ;
			$str .= 'cursor : -moz-'.$this->cursor.' ;' ;
			$str .= "\n" ;
		}
				
		if ($this->color != '') {
			$str .= "\t" ;
			$str .= 'color : '.$this->color.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->outline != '') {
			$str .= "\t" ;
			$str .= 'outline : '.$this->outline.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->background != '') {
			$str .= "\t" ;
			$str .= 'background : '.$this->background.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->backgroundMask != '') {
			$str .= "\t" ;
			$str .= '-webkit-mask: '.$this->backgroundMask.' ;' ;
			$str .= "\n" ;
			$str .= "\t" ;
			$str .= 'mask: '.$this->backgroundMask.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->backgroundPosition != '') {
			$str .= "\t" ;
			$str .= 'background-position : '.$this->backgroundPosition.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->backgroundColor != '') {
			$str .= "\t" ;
			$str .= 'background-color : '.$this->backgroundColor.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->backgroundColorRgba != '') {
			$str .= "\t" ;
			$str .= 'background-color : rgba('.$this->backgroundColorRgba.') ;' ;
			$str .= "\n" ;
		}
		
		if ($this->backgroundSize != '') {
			$str .= "\t" ;
			$str .= 'background-size : '.$this->backgroundSize.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->backgroundGradient != '') {
			// lien pour générer : http://www.colorzilla.com/gradient-editor/
			$str .= "\t" ;
			$str .= 'background : -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,0) 5%, rgba(255,255,255,1) 95%, rgba(255,255,255,1) 100%);' ;
			$str .= "\n" ;
			$str .= "\t" ;
			$str .= 'background : -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0)), color-stop(5%,rgba(255,255,255,0)), color-stop(95%,rgba(255,255,255,1)), color-stop(100%,rgba(255,255,255,1)));' ;
			$str .= "\n" ;
			$str .= "\t" ;
			$str .= 'background : -webkit-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,0) 5%,rgba(255,255,255,1) 95%,rgba(255,255,255,1) 100%);' ;
			$str .= "\n" ;
			$str .= "\t" ;
			$str .= 'background : -o-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,0) 5%,rgba(255,255,255,1) 95%,rgba(255,255,255,1) 100%);' ;
			$str .= "\n" ;
			$str .= "\t" ;
			$str .= 'background : -ms-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,0) 5%,rgba(255,255,255,1) 95%,rgba(255,255,255,1) 100%);' ;
			$str .= "\n" ;
			$str .= "\t" ;
			$str .= 'background : linear-gradient(to bottom, rgba(255,255,255,0) 0%,rgba(255,255,255,0) 5%,rgba(255,255,255,1) 95%,rgba(255,255,255,1) 100%);' ;
			$str .= "\n" ;
			$str .= "\t" ;
			$str .= 'filter : progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#00ffffff\', endColorstr=\'#ffffff\',GradientType=0 );' ;
			$str .= "\n" ;
		}
		
		if ($this->backgroundRepeatLinearGradient != '') {
			// lien pour générer : http://www.colorzilla.com/gradient-editor/
			$str .= "\t" ;
			$str .= 'background : repeating-linear-gradient('.$this->backgroundRepeatLinearGradient.');' ;
			$str .= "\n" ;
		}
		
		if ($this->position != '') {
			$str .= "\t" ;
			$str .= 'position : '.$this->position.' ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->top)) {
			$str .= "\t" ;
			$str .= 'top : '.$this->top.'px ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->topPercent)) {
			$str .= "\t" ;
			$str .= 'top : '.$this->topPercent.'% ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->left)) {
			$str .= "\t" ;
			$str .= 'left : '.$this->left.'px ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->leftPercent)) {
			$str .= "\t" ;
			$str .= 'left : '.$this->leftPercent.'% ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->right)) {
			$str .= "\t" ;
			$str .= 'right : '.$this->right.'px ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->rightPercent)) {
			$str .= "\t" ;
			$str .= 'right : '.$this->rightPercent.'% ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->bottom)) {
			$str .= "\t" ;
			$str .= 'bottom : '.$this->bottom.'px ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->bottomPercent)) {
			$str .= "\t" ;
			$str .= 'bottom : '.$this->bottomPercent.'% ;' ;
			$str .= "\n" ;
		}
		
		if ($this->listStyle != '') {
			$str .= "\t" ;
			$str .= 'list-style : '.$this->listStyle.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->textDecoration != '') {
			$str .= "\t" ;
			$str .= 'text-decoration : '.$this->textDecoration.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->textUnderlinePosition != '') {
			$str .= "\t" ;
			$str .= 'text-underline-position : '.$this->textUnderlinePosition.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->wordWrap != '') {
			$str .= "\t" ;
			$str .= 'word-wrap : '.$this->wordWrap.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->wordBreak != '') {
			$str .= "\t" ;
			$str .= 'word-break : '.$this->wordBreak.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->overflowX != '') {
			$str .= "\t" ;
			$str .= 'overflow-x : '.$this->overflowX.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->overflowY != '') {
			$str .= "\t" ;
			$str .= 'overflow-y : '.$this->overflowY.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->verticalAlign != '') {
			$str .= "\t" ;
			$str .= 'vertical-align : '.$this->verticalAlign.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->float != '') {
			$str .= "\t" ;
			$str .= 'float : '.$this->float.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->borderColor != '') {
			$str .= "\t" ;
			$str .= 'border-color : '.$this->borderColor.' ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->zIndex)) {
			$str .= "\t" ;
			$str .= 'z-index : '.$this->zIndex.' ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->borderRadius)) {
			$str .= "\t" ;
			$str .= '-moz-border-radius : '.$this->borderRadius.'px ;' ;
			$str .= "\n" ;
			$str .= "\t" ;
			$str .= '-webkit-border-radius : '.$this->borderRadius.'px ;' ;
			$str .= "\n" ;
			$str .= "\t" ;
			$str .= 'border-radius : '.$this->borderRadius.'px ;' ;
			$str .= "\n" ;
		}
		
		if ($this->borderRadiusFull != '') {
			$str .= "\t" ;
			$str .= '-moz-border-radius : '.$this->borderRadiusFull.' ;' ;
			$str .= "\n" ;
			$str .= "\t" ;
			$str .= '-webkit-border-radius : '.$this->borderRadiusFull.' ;' ;
			$str .= "\n" ;
			$str .= "\t" ;
			$str .= 'border-radius : '.$this->borderRadiusFull.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->appearance != '') {
			$str .= "\t" ;
			$str .= '-moz-appearance : none ;' ;
			$str .= "\n" ;
			$str .= "\t" ;
			$str .= '-webkit-appearance : none ;' ;
			$str .= "\n" ;
			$str .= "\t" ;
			$str .= 'appearance : none ;' ;
			$str .= "\n" ;
			$str .= "\t" ;
			$str .= 'outline : none ;' ;
			$str .= "\n" ;
		}
		
// 		if ($this->placeholderColor != '') {
// 			$str .= "\t" ;
// 			$str .= '*::-webkit-input-placeholder: '.$this->placeholderColor.' ;' ;
// 			$str .= "\n" ;
// 			$str .= "\t" ;
// 			$str .= '*:-moz-placeholder: '.$this->placeholderColor.' ;' ;
// 			$str .= "\n" ;
// 			$str .= "\t" ;
// 			$str .= '*::-moz-placeholder: '.$this->placeholderColor.' ;' ;
// 			$str .= "\n" ;
// 			$str .= "\t" ;
// 			$str .= '*:-ms-input-placeholder: '.$this->placeholderColor.' ;' ;
// 			$str .= "\n" ;
// 		}
		
		if ($this->boxShadowColor != '') {
			$str .= "\t" ;
 			$str .= 'box-shadow : '.$this->boxShadowX.'px '.$this->boxShadowY.'px '.$this->boxShadowBlur.'px '.$this->boxShadowSpread.'px '.$this->boxShadowColor.' ;' ;
			$str .= '-moz-box-shadow : '.$this->boxShadowX.'px '.$this->boxShadowY.'px '.$this->boxShadowBlur.'px '.$this->boxShadowSpread.'px '.$this->boxShadowColor.' ;' ;
			$str .= '-webkit-box-shadow : '.$this->boxShadowX.'px '.$this->boxShadowY.'px '.$this->boxShadowBlur.'px '.$this->boxShadowSpread.'px '.$this->boxShadowColor.' ;' ;
			$str .= '-o-box-shadow : '.$this->boxShadowX.'px '.$this->boxShadowY.'px '.$this->boxShadowBlur.'px '.$this->boxShadowSpread.'px '.$this->boxShadowColor.' ;' ;
			$str .= 'filter : progid:DXImageTransform.Microsoft.Shadow(color='.$this->boxShadowColor.', Direction=180, Strength=5) ;' ;
			$str .= "\n" ;
		}
		
		if ($this->boxShadowFull != '') {
			$str .= "\t" ;
 			$str .= 'box-shadow : '.$this->boxShadowFull.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->filter != '') {
			$str .= "\t" ;
			$str .= 'filter : '.$this->filter.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->opacity != '') {
			$str .= "\t" ;
			$str .= 'opacity : '.$this->opacity.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->scaleX != '' && $this->scaleY != '') {
			$str .= "\t" ;
			$str .= '-ms-transform : scale ('.$this->scaleX.','.$this->scaleY.') ;' ;
			$str .= '-webkit-transform : scale ('.$this->scaleX.','.$this->scaleY.') ;' ;
			$str .= 'transform : scale ('.$this->scaleX.','.$this->scaleY.') ;' ;
			$str .= "\n" ;
		}
		
		if ($this->uppercase == true) {
			$str .= "\t" ;
			$str .= 'text-transform : uppercase ;' ;
			$str .= "\n" ;
		}
		
		if (is_numeric ($this->textIndent)) {
			$str .= "\t" ;
			$str .= 'text-indent : '.$this->textIndent.'px ;' ;
			$str .= "\n" ;
		}
		
		if ($this->clear != '') {
			$str .= "\t" ;
			$str .= 'clear : '.$this->clear.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->content != '') {
			$str .= "\t" ;
			$str .= 'content : '.$this->content.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->viewport != '') {
			$str .= "\t" ;
			$str .= '@-webkit-viewport : {'.$this->viewport.'}' ;
			$str .= '@-moz-viewport : {'.$this->viewport.'}' ;
			$str .= '@-ms-viewport : {'.$this->viewport.'}' ;
			$str .= '@-o-viewport : {'.$this->viewport.'}' ;
			$str .= '@viewport : {'.$this->viewport.'}' ;
			$str .= "\n" ;
		}
		
		if ($this->visibility != '') {
			$str .= "\t" ;
			$str .= 'visibility : '.$this->visibility.' ;' ;
			$str .= "\n" ;
		}
		
		if ($this->zoom != '') {
			$str .= "\t" ;
			$str .= 'zoom : '. $this->zoom .'%;' ;
			$str .= "\n" ;
		}
		
		if ($this->tagName != '') {
			$str .= '}' ;
			$str .= "\n" ;
			$str .= "\n" ;
		}
		
		
		
		return $str ;
	}
}
?>
