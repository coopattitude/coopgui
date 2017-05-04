<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrHtmlFather extends IrContainer {
	var $id ;
	var $name ;
	var $irHtmlAtt ;
	
	var $loadPrefixUniq ;
	var $fatherPrefixUniq ;
	
	function IrHtmlFather ($irCommander, $irGenCss, $classType='IrHtmlFather') {
		parent::__construct ($irCommander, $irGenCss, 'prefix', $classType) ;
		
		$this->id = '' ;
		$this->name = '' ;
		$this->irHtmlAtt = null ;
		
		$this->loadPrefixUniq = '' ;
		$this->fatherPrefixUniq = '' ;
	}
	
	function setLoadPrefixUniq ($loadPrefixUniq) {
		$this->loadPrefixUniq = $loadPrefixUniq ;
	}
	
	function setFatherPrefixUniq ($fatherPrefixUniq) {
		$this->fatherPrefixUniq = $fatherPrefixUniq ;
	}
	
	function setId ($id) {
		$this->id = $id ;
	}
	
	function setName ($name) {
		$this->name = $name ;
	}
	
	function appendIrHtmlAtt ($irHtmlAtt) {
		if ($irHtmlAtt != null) {
			if ($this->irHtmlAtt == null) {
				$this->irHtmlAtt = $irHtmlAtt ;
			}
			else {
				$this->irHtmlAtt->append ($irHtmlAtt) ;
			}
		}
	}
	
	function appendIrHtmlAttNew ($name, $value) {
		$irHtmlAtt = new \IrHtmlAtt ($this->irCommander) ;
		$irHtmlAtt->setAtt ($name, $value) ;
		
		if ($irHtmlAtt != null) {
			if ($this->irHtmlAtt == null) {
				$this->irHtmlAtt = $irHtmlAtt ;
			}
			else {
				$this->irHtmlAtt->append ($irHtmlAtt) ;
			}
		}
	}
	
	function getId () {
		return $this->id ;
	}
	
	function getTextFullRef ($fullRef) {
	
		$filter = 'secure_html | sans image...' ;
	
		return ($fullRef) ;
// 		return $this->irCommander->irData->getData ($fullRef, $filter) ;
	}
}
?>
