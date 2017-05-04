<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrPreValid extends IrContainer {
	
	var $tabAction ;
	var $tabActionInd ;
	
	var $tabTrad ;
	
	function IrPreValid ($irCommander, $irGenCss) {
		parent::__construct ($irCommander, $irGenCss, 'prefix', 'IrPreValid') ;
		
		unset ($this->tabAction) ;
		$this->tabActionInd = 0 ;
		
		unset ($this->tabTrad) ;
	}
	
	static function staticGetSelectorInput ($idForm, $name) {
		$selector = '#'.$idForm.' input[name="'.$name.'"]' ;
		return $selector ;
	}
	
	function getSelectorInput ($idForm, $name) {
		$selector = '#'.$idForm.' input[name="'.$name.'"]' ;
		return $selector ;
	}
	
	function getSelectorTextArea ($idForm, $name) {
		$selector = '#'.$idForm.' textarea[name="'.$name.'"]' ;
		return $selector ;
	}
	
	function validInputHiddenForm ($idForm, $nameControl, $nameAff, $empty, $trad) {
		$selectorControl = $this->getSelectorInput ($idForm, $nameControl) ;
		$selectorAff = $this->getSelectorInput ($idForm, $nameAff) ;
		
		$this->validInputHidden ($selectorControl, $selectorAff, $empty, $trad) ;
	}
	
	function validInputHidden ($selectorControl, $selectorAff, $empty, $trad) {
		$this->tabAction [ $this->tabActionInd ] [ 'action' ] = 'validInputHidden' ;
		$this->tabAction [ $this->tabActionInd ] [ 'selectorControl' ] = $selectorControl ;
		$this->tabAction [ $this->tabActionInd ] [ 'selectorAff' ] = $selectorAff ;
		$this->tabAction [ $this->tabActionInd ] [ 'empty' ] = $empty ;
		$this->tabAction [ $this->tabActionInd ] [ 'trad' ] = $trad ;
		++ $this->tabActionInd ;
	}
	
	function lastValidSetNoAddEvent () {
		$tmp = $this->tabActionInd - 1 ;
		if ($tmp >= 0) {
			$this->tabAction [ $tmp ] [ 'noAddEvent' ] = 'true' ;
		}
	}
	
	function validInputTextForm ($idForm, $name, $format, $empty, $lenghtMin, $lenghtMax) {
		$selector = $this->getSelectorInput ($idForm, $name) ;
		
		$this->validInputText ($selector, $format, $empty, $lenghtMin, $lenghtMax) ;
	}
	
	function validInputText ($selector, $format, $empty, $lenghtMin, $lenghtMax) {
		$this->tabAction [ $this->tabActionInd ] [ 'action' ] = 'validInputText' ;
		$this->tabAction [ $this->tabActionInd ] [ 'selector' ] = $selector ;
		$this->tabAction [ $this->tabActionInd ] [ 'format' ] = $format ;
		$this->tabAction [ $this->tabActionInd ] [ 'empty' ] = $empty ;
		$this->tabAction [ $this->tabActionInd ] [ 'lenghtMin' ] = $lenghtMin ;
		$this->tabAction [ $this->tabActionInd ] [ 'lenghtMax' ] = $lenghtMax ;
		++ $this->tabActionInd ;
	}
	
	function validInputPasswordForm ($idForm, $name, $format, $empty, $lenghtMin, $lenghtMax) {
		$selector = $this->getSelectorInput ($idForm, $name) ;
		
		$this->validInputPassword ($selector, $format, $empty, $lenghtMin, $lenghtMax) ;
	}
	
	function validInputPassword ($selector, $format, $empty, $lenghtMin, $lenghtMax) {
		$this->tabAction [ $this->tabActionInd ] [ 'action' ] = 'validInputPassword' ;
		$this->tabAction [ $this->tabActionInd ] [ 'selector' ] = $selector ;
		$this->tabAction [ $this->tabActionInd ] [ 'format' ] = $format ;
		$this->tabAction [ $this->tabActionInd ] [ 'empty' ] = $empty ;
		$this->tabAction [ $this->tabActionInd ] [ 'lenghtMin' ] = $lenghtMin ;
		$this->tabAction [ $this->tabActionInd ] [ 'lenghtMax' ] = $lenghtMax ;
		++ $this->tabActionInd ;
	}
	
	function validInputCheckboxForm ($idForm, $name) {
		$selector = $this->getSelectorInput ($idForm, $name) ;
		
		$this->validInputCheckbox ($selector) ;
	}
	
	function validInputCheckbox ($selector) {
		$this->tabAction [ $this->tabActionInd ] [ 'action' ] = 'validInputCheckbox' ;
		$this->tabAction [ $this->tabActionInd ] [ 'selector' ] = $selector ;
		++ $this->tabActionInd ;
	}
	
	function validTextAreaForm ($idForm, $name, $format, $empty, $lenghtMin, $lenghtMax) {
		$selector = $this->getSelectorTextArea ($idForm, $name) ;
		
		$this->validTextArea ($selector, $format, $empty, $lenghtMin, $lenghtMax) ;
	}
	
	function validTextArea ($selector, $format, $empty, $lenghtMin, $lenghtMax) {
		$this->tabAction [ $this->tabActionInd ] [ 'action' ] = 'validTextArea' ;
		$this->tabAction [ $this->tabActionInd ] [ 'selector' ] = $selector ;
		$this->tabAction [ $this->tabActionInd ] [ 'format' ] = $format ;
		$this->tabAction [ $this->tabActionInd ] [ 'empty' ] = $empty ;
		$this->tabAction [ $this->tabActionInd ] [ 'lenghtMin' ] = $lenghtMin ;
		$this->tabAction [ $this->tabActionInd ] [ 'lenghtMax' ] = $lenghtMax ;
		++ $this->tabActionInd ;
	}
	
	function validEmptyAndEmptyForm ($idForm, $name1, $name2) {
		$selector1 = $this->getSelectorInput ($idForm, $name1) ;
		$selector2 = $this->getSelectorInput ($idForm, $name2) ;
		
		$this->validEmptyAndEmpty ($selector1, $selector2) ;
	}
	
	function validEmptyAndEmpty ($selector1, $selector2) {
		$this->tabAction [ $this->tabActionInd ] [ 'action' ] = 'validEmptyAndEmpty' ;
		$this->tabAction [ $this->tabActionInd ] [ 'selector1' ] = $selector1 ;
		$this->tabAction [ $this->tabActionInd ] [ 'selector2' ] = $selector2 ;
		++ $this->tabActionInd ;
	}
	
	function validDateBeginBeforeDateEnd ($nameDateBegin, $nameTimeBegin, $nameDateEnd, $nameTimeEnd) {
		$this->tabAction [ $this->tabActionInd ] [ 'action' ] = 'validDateBeginBeforeDateEnd' ;		
		$this->tabAction [ $this->tabActionInd ] [ 'nameDateBegin' ] = $nameDateBegin ;		
		$this->tabAction [ $this->tabActionInd ] [ 'nameTimeBegin' ] = $nameTimeBegin ;		
		$this->tabAction [ $this->tabActionInd ] [ 'nameDateEnd' ] = $nameDateEnd ;		
		$this->tabAction [ $this->tabActionInd ] [ 'nameTimeEnd' ] = $nameTimeEnd ;
		++ $this->tabActionInd ;
	}
	
	function toHtml () {
	
		$this->initTabTrad () ;
	
		$scriptInit = '<script type="text/javascript">$(function() {
			'.$this->getScriptTabTrad ().'
			'.$this->getScriptTabAction ().'
			preValidInit (\''.g()->insertInQuotedJs ($this->getPrefixUniq ()).'\', tabTrad, tabAction) ;
		});</script>' ;
	
		return $scriptInit ;
	}
	
	function getScriptTabTrad () {
		unset ($html) ;
	
		$html [] = '
		var tabTrad = new Array () ;' ;
	
		foreach ($this->tabTrad as $key => $value){
			$html [] = 'tabTrad [ \''.$key.'\' ] = \''.$value.'\' ;' ;
// 			$html [] = 'tabTrad [ \''.$key.'\' ] = \''.g()->insertInQuotedJs ($value).'\' ;' ;
		}
			
		$html [] = '' ;
	
		return implode ('', $html) ;
	}
	
	function getScriptTabAction () {
		unset ($html) ;
	
		$html [] = '
		var tabAction = new Array () ;' ;
	
		$limit = count ($this->tabAction) ;
		for ($i = 0 ; $i < $limit ; ++$i) {
			$html [] = 'tabAction [ '.$i.' ] = new Array () ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'action\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'action' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'selector\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'selector' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'selectorControl\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'selectorControl' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'selectorAff\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'selectorAff' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'format\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'format' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'empty\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'empty' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'lenghtMin\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'lenghtMin' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'lenghtMax\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'lenghtMax' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'selector1\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'selector1' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'selector2\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'selector2' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'nameDateBegin\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'nameDateBegin' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'nameTimeBegin\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'nameTimeBegin' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'nameDateEnd\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'nameDateEnd' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'nameTimeEnd\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'nameTimeEnd' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'trad\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'trad' ]).'\' ;' ;
			$html [] = 'tabAction [ '.$i.' ] [ \'noAddEvent\' ] = \''.g()->insertInQuotedJs ($this->tabAction [ $i ] [ 'noAddEvent' ]).'\' ;' ;
		}
	
		$html [] = '' ;
	
		return implode ('', $html) ;
	}
	
	function initTabTrad () {
		$this->tabTrad [ 'formatTitle' ] = $this->getTextInJs ('formatTitle') ;
		$this->tabTrad [ 'formatAlbumName' ] = $this->getTextInJs ('formatAlbumName') ;
		$this->tabTrad [ 'formatImgName' ] = $this->getTextInJs ('formatImgName') ;
		$this->tabTrad [ 'formatDocName' ] = $this->getTextInJs ('formatDocName') ;
		$this->tabTrad [ 'formatLastName' ] = $this->getTextInJs ('formatLastName') ;
		$this->tabTrad [ 'formatFirstName' ] = $this->getTextInJs ('formatFirstName') ;
		$this->tabTrad [ 'formatSubDomainName' ] = $this->getTextInJs ('formatSubDomainName') ;
		$this->tabTrad [ 'formatJob' ] = $this->getTextInJs ('formatJob') ;
		$this->tabTrad [ 'formatAlias' ] = $this->getTextInJs ('formatAlias') ;
		$this->tabTrad [ 'formatLogin' ] = $this->getTextInJs ('formatLogin') ;
		$this->tabTrad [ 'formatMail' ] = $this->getTextInJs ('formatMail') ;
		$this->tabTrad [ 'formatPhoneNumber' ] = $this->getTextInJs ('formatPhoneNumber') ;
		$this->tabTrad [ 'formatText' ] = $this->getTextInJs ('formatText') ;
		$this->tabTrad [ 'formatLinkVideo' ] = $this->getTextInJs ('formatLinkVideo') ;
		$this->tabTrad [ 'formatTag' ] = $this->getTextInJs ('formatTag') ;
		$this->tabTrad [ 'formatPassword' ] = $this->getTextInJs ('formatPassword') ;
		$this->tabTrad [ 'formatTextArea' ] = $this->getTextInJs ('formatTextArea') ;
		$this->tabTrad [ 'formatAlphaNumeric' ] = $this->getTextInJs ('formatAlphaNumeric') ;
		$this->tabTrad [ 'formatAlphaNumericUser' ] = $this->getTextInJs ('formatAlphaNumericUser') ;
		$this->tabTrad [ 'formatNumeric' ] = $this->getTextInJs ('formatNumeric') ;
		$this->tabTrad [ 'formatKeywords' ] = $this->getTextInJs ('formatKeywords') ;
		$this->tabTrad [ 'formatAnswer' ] = $this->getTextInJs ('formatAnswer') ;
		$this->tabTrad [ 'formatExtLink' ] = $this->getTextInJs ('formatExtLink') ;
		$this->tabTrad [ 'formatSearchText' ] = $this->getTextInJs ('formatSearchText') ;
	
		$this->tabTrad [ 'lenghtMin' ] = $this->getTextInJs ('lenghtMin') ;
		$this->tabTrad [ 'lenghtMax' ] = $this->getTextInJs ('lenghtMax') ;
		$this->tabTrad [ 'empty' ] = $this->getTextInJs ('empty') ;
		$this->tabTrad [ 'emptyAndEmpty' ] = $this->getTextInJs ('emptyAndEmpty') ;
		$this->tabTrad [ 'dateBeginBeforeDateEnd' ] = $this->getTextInJs ('dateBeginBeforeDateEnd') ;
		$this->tabTrad [ 'isChecked' ] = $this->getTextInJs ('isChecked') ;
	}
	
	function getTextInJs ($ref) {
		$parentRef = "Lang:".$this->irCommander->irLang->lang."::Module:IrPreValid::Domain:Default::Page:Default::Ref:" ;
		
		$filter = 'secure_html | sans image...' ;
		
		$text = $this->irCommander->irData->getData ($parentRef.$ref, $filter) ;
		if ($text == '') {
			$text = $ref ;
		}
		
		$text = str_replace (chr(10), '', $text) ;
		$text = str_replace (chr(13), '', $text) ;
	
		return g()->insertInQuotedJs ($text) ;		
	}
}
?>
