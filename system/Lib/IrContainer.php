<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrContainer {
	var $irCommander ;
	var $irGenCss ;
	var $prefix ;
	var $classType ;
	
	var $instanceId ;
	var $prefixUniq ;
	
	function IrContainer ($irCommander, $irGenCss, $prefix, $classType) {
		$this->irCommander = $irCommander ;
		$this->irGenCss = $irGenCss ;
		$this->prefix = $prefix ;
		$this->classType = $classType ;
		
		if ($GLOBALS [ 'instanceId_'.$this->classType ] == '' || $GLOBALS [ 'instanceId_'.$this->classType ] == 0) {
			$GLOBALS [ 'instanceId_'.$this->classType ] = 1 ;
		}
		else if (is_numeric($GLOBALS [ 'instanceId_'.$this->classType ])) {
			++$GLOBALS [ 'instanceId_'.$this->classType ] ;
		}
		
		$this->instanceId = $GLOBALS [ 'instanceId_'.$this->classType ] ;
		
		$this->prefixUniq = $this->prefix.'_'.$this->classType.'_'.$this->instanceId.'_r_'.mt_rand (0, 1000000) ;
	}
	
	function getIrGenCss () {
		return $this->irGenCss ;
	}
	
	function getPrefix () {
		return $this->prefix ;
	}
	
	function getPrefixUniq () {
		return $this->prefixUniq ;
	}
	
	function getClassType () {
		return $this->classType ;
	}
	
	function getTextFullRef ($fullRef) {
		$filter = 'secure_html | sans image...' ;
	
		return $this->irCommander->irData->getData ($fullRef, $filter) ;
	}
	
	function scriptPreInit () {
		$args = func_get_args () ;
		$limit = count ($args) ;
		
		if ($limit <= 0) {
			return '' ;
		}
		
		$name = $args [ 0 ].'PreInit' ;
		$name = str_replace ('"', '', $name) ;
		$name = str_replace ("'", '', $name) ;
		$name = str_replace (' ', '', $name) ;
		
		if ($limit > 1) {
			$prefixUniq = $args [ 1 ] ;
		}
		
		$scriptInitPreFunction = '' ;
		$scriptInitFunction = '' ;
		
		for ($i = 2 ; $i < $limit ; $i = $i + 2) {
			if ($i > 1) {
				$scriptInitPreFunction .= "\n" ;
				$scriptInitFunction .= ', ' ;
			}
			$scriptInitPreFunction .= ''.$args [ $i ].'' ;
			$scriptInitFunction .= ''.$args [ ($i+1) ].'' ;
		}
		
		$scriptInit = '<script type="text/javascript">$(function() {' ;
		
		$scriptInit .= $scriptInitPreFunction."\n" ;
		
		$scriptInit .= ''.$name.' (' ;
		
		$scriptInit .= '\''.g()->insertInQuotedJs ($prefixUniq).'\'' ;
		$scriptInit .= $scriptInitFunction ;
		
		$scriptInit .= ') ;});</script>' ;
		
		return $scriptInit ;
	}
	
	function scriptInit () {
		$args = func_get_args () ;
		$limit = count ($args) ;
		
		if ($limit <= 0) {
			return '' ;
		}
		
		$name = $args [ 0 ].'Init' ;
		$name = str_replace ('"', '', $name) ;
		$name = str_replace ("'", '', $name) ;
		$name = str_replace (' ', '', $name) ;
		
		$scriptInit = '<script type="text/javascript">$(function() {
		'.$name.' (' ;
		
		for ($i = 1 ; $i < $limit ; ++$i) {
			if ($i > 1) {
				$scriptInit .= ', ' ;
			}
			$scriptInit .= '\''.g()->insertInQuotedJs ($args [ $i ]).'\'' ;
		}
		
		$scriptInit .= ') ;});</script>' ;
		
		return $scriptInit ;
	}
	
	function scriptInitLoad () {
		
		$args = func_get_args () ;
		
		$limit = count ($args) ;
		
		if ($limit > 0) {
			
			unset ($tab) ;
			$tab [] = $args [ 0 ] ;
			$tab [] = $this->getPrefixUniq () ;
			$tab [] = $this->getIrGenCss ()->css ;
// 			$tab [] = 'http://localhost/n/site/indexQuery.php' ;
			$tab [] = $this->irCommander->irTransportVar->siteUrl.'/indexQuery.php' ;
			$tab [] = $this->loadPrefixUniq ;
			$tab [] = $this->fatherPrefixUniq ;
			
			for ($i = 1 ; $i < $limit ; ++$i) {
				$tab [] = $args [ $i ] ;
			}
			
			$args = $tab ;
		}
		
		$limit = count ($args) ;
		
		if ($limit <= 0) {
			return '' ;
		}
		
		$name = $args [ 0 ].'Init' ;
		$name = str_replace ('"', '', $name) ;
		$name = str_replace ("'", '', $name) ;
		$name = str_replace (' ', '', $name) ;
		
		$scriptInit = '<script type="text/javascript">$(function() {
		'.$name.' (' ;
		
		for ($i = 1 ; $i < $limit ; ++$i) {
			if ($i > 1) {
				$scriptInit .= ', ' ;
			}
			$scriptInit .= '\''.g()->insertInQuotedJs ($args [ $i ]).'\'' ;
		}
		
		$scriptInit .= ') ;});</script>' ;
		
		return $scriptInit ;
	}
	
	function funcToJs () {
		$args = func_get_args () ;
		$limit = count ($args) ;
	
		if ($limit <= 0) {
			return '' ;
		}
	
		$name = $args [ 0 ] ;
	
		$func = '
		'.$name.' (' ;
	
		for ($i = 1 ; $i < $limit ; ++$i) {
			if ($i > 1) {
				$func .= ', ' ;
			}
			$func .= '\''.g()->insertInQuotedJs ($args [ $i ]).'\'' ;
		}
	
		$func .= ') ;' ;
	
		return $func ;
	}
	
	function tabToJs ($tab, $tabVarName) {
		unset ($html) ;
		$html [] = '' ;
		
		$html [] = 'var '.$tabVarName.' = new Array () ;' ;
		
		$limit = count ($tab) ;
		for ($i = 0 ; $i < $limit ; ++$i) {
			$html [] = $tabVarName.' [ '.$i.' ] = new Array () ;' ;
			
			$tabKey = array_keys ($tab [ $i ]) ;
			$limit2 = count ($tabKey) ;
			for ($j = 0 ; $j < $limit2 ; ++$j) {
				$html [] = $tabVarName.' [ '.$i.' ] [ \''.$tabKey [ $j ].'\' ] = \''.g()->insertInQuotedJs ($tab [ $i ] [ $tabKey [ $j ] ]).'\' ;' ;
			}
		}
		
		return implode ('', $html) ;
	}
}
?>
