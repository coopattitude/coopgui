<?php
class IrCommander {

	var $cssVersion ;
	var $jsVersion ;

	var $boolRedoCssCache ;
	var $boolRedoJsCache ;

	var $irGlobalVar ;
	
	function __construct () {

		$this->cssVersion = '1' ;
		$this->jsVersion = '1' ;

		$this->boolRedoCssCache = false ;
		$this->boolRedoJsCache = false ;
		
		$this->irGlobalVar = new IrGlobalVar ($this) ;
		
		$GLOBALS [ 'g' ] = $this->irGlobalVar ;
		function g () {
			return $GLOBALS [ 'g' ] ;
		}
	}

	function getCssVersion () {
		return $this->cssVersion ;
	}

	function getJsVersion () {
		return $this->jsVersion ;
	}
	
	function redoCssCacheOn () {
		return $this->boolRedoCssCache ;
	}
	
	function redoJsCacheOn () {
		return $this->boolRedoJsCache ;
	}
}
?>