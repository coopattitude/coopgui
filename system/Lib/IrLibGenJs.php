<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrLibGenJs {
	var $irCommander ;
	var $irEnvCustom ;
	
	var $js ;
	
	var $prefixGenPath ;
	
	function IrLibGenJs ($irCommander, $irEnvCustom) {
		$this->irCommander = $irCommander ;
		$this->irEnvCustom = $irEnvCustom ;
		
		$this->js = '' ;
		
		$this->prefixGenPath = '' ;
	}
	
	function loadFilePath (&$tabFilePath, &$tabFileName) {
	
	}
	
	function getLinkJs () {	
		if ($this->js != '') {
			if ($this->prefixGenPath == '') {
				$filePath = 'gen/js/'.$this->js.'_all.js' ;
			}
			else {
				$filePath = $this->prefixGenPath.'/gen/js/'.$this->js.'_all.js' ;
			}
				
			if (file_exists ($filePath)) {
				return '<script type="text/javascript" src="'.$filePath.'"></script>' ;
			}
		}
		
		return '' ;
	}
	
	function initOneJs ($filePathOneJs) {
		$this->js = $this->irEnvCustom->refJs ;
		
		if ($this->js != '') {
			$fileNameOneJs = str_replace ('/', '_', $filePathOneJs) ;
			if (substr ($fileNameOneJs, (strlen ($fileNameOneJs) - 3), 3) == '.js') {
				$fileNameOneJs = substr ($fileNameOneJs, 0, (strlen ($fileNameOneJs) - 3)) ;
			}
			
			if ($this->prefixGenPath == '') {
				$filePath = 'gen/js/'.$this->js.'_'.$fileNameOneJs.'.js' ;
			}
			else {
				$filePath = $this->prefixGenPath.'/gen/js/'.$this->js.'_'.$fileNameOneJs.'.js' ;
			}
			
			if ($this->irCommander->redoJsCacheOn () || file_exists ($filePath) == false) {
				$this->genOneJs ($filePath, $filePathOneJs) ;
			}
			
			if (file_exists ($filePath)) {
				
				$nameDoublon = 'doublonJs_'.$fileNameOneJs ;
				
				if (isset ($GLOBALS [ $nameDoublon ]) == false || is_array ($GLOBALS [ $nameDoublon ]) == false) {
					$GLOBALS [ $nameDoublon ] = array () ;
				}
		
				$found = false ;
		
				$limit = count ($GLOBALS [ $nameDoublon ]) ;
				for ($i = 0 ; $i < $limit ; ++$i) {
					if ($GLOBALS [ $nameDoublon ] [ $i ] == $filePath) {
						$found = true ;
						break ;
					}
				}
		
				if ($found == false) {
					$GLOBALS [ $nameDoublon ] [] = $filePath ;
		
					return '<script type="text/javascript" src="'.$filePath.'"></script>' ;
				}
				else {
					return '' ;
				}
			}
			else {
				return '' ;
			}
		}
	}
	
	function initOneJsForced ($filePathOneJs) {
		$this->js = $this->irEnvCustom->refJs ;
		
		if ($this->js != '') {
			$fileNameOneJs = str_replace ('/', '_', $filePathOneJs) ;
			if (substr ($fileNameOneJs, (strlen ($fileNameOneJs) - 3), 3) == '.js') {
				$fileNameOneJs = substr ($fileNameOneJs, 0, (strlen ($fileNameOneJs) - 3)) ;
			}
			
			if ($this->prefixGenPath == '') {
				$filePath = 'gen/js/'.$this->js.'_'.$fileNameOneJs.'.js' ;
			}
			else {
				$filePath = $this->prefixGenPath.'/gen/js/'.$this->js.'_'.$fileNameOneJs.'.js' ;
			}
			
			if ($this->irCommander->redoJsCacheOn () || file_exists ($filePath) == false) {
				$this->genOneJs ($filePath, $filePathOneJs) ;
			}
			
			if (file_exists ($filePath)) {
				
				$nameDoublon = 'doublonJs_'.$fileNameOneJs ;
				
				if (isset ($GLOBALS [ $nameDoublon ]) == false || is_array ($GLOBALS [ $nameDoublon ]) == false) {
					$GLOBALS [ $nameDoublon ] = array () ;
				}
		
				$found = false ;
		
				$limit = count ($GLOBALS [ $nameDoublon ]) ;
				for ($i = 0 ; $i < $limit ; ++$i) {
					if ($GLOBALS [ $nameDoublon ] [ $i ] == $filePath) {
						$found = true ;
						break ;
					}
				}
		
				if ($found == false) {
					$GLOBALS [ $nameDoublon ] [] = $filePath ;
		
					return '<script type="text/javascript" src="'.$filePath.'"></script>' ;
				}
				else {
					return '<script type="text/javascript" src="'.$filePath.'"></script>' ; // forced
				}
			}
			else {
				return '' ;
			}
		}
	}
	
	function initJs () {
		$this->js = $this->irEnvCustom->refJs ;
		
		if ($this->js != '') {
			if ($this->prefixGenPath == '') {
				$filePath = 'gen/js/'.$this->js.'_all.js' ;
			}
			else {
				$filePath = $this->prefixGenPath.'/gen/js/'.$this->js.'_all.js' ;
			}
			
			if (false && t()->isLocal ()) {
				$this->genJs ($filePath) ;
			}
			else {
				if ($this->irCommander->redoJsCacheOn () || file_exists ($filePath) == false) {
					$this->genJs ($filePath) ;
				}
			}
		
			if (file_exists ($filePath)) {
				if (isset ($GLOBALS [ 'doublonJs' ]) == false || is_array ($GLOBALS [ 'doublonJs' ]) == false) {
					$GLOBALS [ 'doublonJs' ] = array () ;
				}
		
				$found = false ;
		
				$limit = count ($GLOBALS [ 'doublonJs' ]) ;
				for ($i = 0 ; $i < $limit ; ++$i) {
					if ($GLOBALS [ 'doublonJs' ] [ $i ] == $filePath) {
						$found = true ;
						break ;
					}
				}
		
				if ($found == false) {
					$GLOBALS [ 'doublonJs' ] [] = $filePath ;
		
					return '<script type="text/javascript" src="'.$filePath.'"></script>' ;
				}
				else {
					return '' ;
				}
			}
			else {
				return '' ;
			}
		}
	}
		
	public function genJs ($filePath) {
		unset ($tabFilePath) ;
		unset ($tabFileName) ;
		
		$this->loadFilePath ($tabFilePath, $tabFileName) ;
		
		$str = '' ;
		
		$limit = count ($tabFilePath) ;
		for ($i = 0 ; $i < $limit ; ++$i) {
			$filePathTmp = $tabFilePath [ $i ] ;
			$fileNameTmp = $tabFileName [ $i ] ;
			
			$fileSize = filesize ($filePathTmp) ;
			
			if ($fileSize > 0) {
				$fp = fopen ($filePathTmp, 'r') ;
				$content = fread ($fp, $fileSize) ;
				fclose ($fp) ;
				
				$str .= "\n" ;
	// 			$str .= '//////////'.$fileNameTmp.'///////////' ;
	// 			$str .= "\n" ;
				$str .= $content ;
				$str .= "\n" ;
			}
			
			//$fp = fopen ($filePathTmp.'2', 'w') ;
			//fwrite ($fp, $irJs->toString ()) ;
			//fclose ($fp) ;
		}
		
		$fp = fopen ($filePath, 'w') ;
		fwrite ($fp, $str) ;
		fclose ($fp) ;
	}
	
	public function genOneJs ($filePath, $filePathSrc) {
		
		$str = '' ;
		
		if (filesize ($filePathSrc) > 0) {
			$fp = fopen ($filePathSrc, 'r') ;
			$content = fread ($fp, filesize ($filePathSrc)) ;
			fclose ($fp) ;
				
			$str .= "\n" ;
	// 		$str .= '//////////'.$filePathSrc.'///////////' ;
	// 		$str .= "\n" ;
			$str .= $content ;
			$str .= "\n" ;
			
			$fp = fopen ($filePath, 'w') ;
			fwrite ($fp, $str) ;
			fclose ($fp) ;
		}
	}
	
	public function getFilePath (&$tabFilePath, &$tabFileName, $dir) {
		if ($handle = opendir ($dir)) {
			while (false !== ($entry = readdir ($handle))) {
				
				if ($entry == '.' || $entry == '..') {					
				}
				else if (is_file ($dir.'/'.$entry)) {
					if (substr ($entry, (strlen ($entry) - 3), 3) == '.js') {
						$tabFilePath [] = $dir.'/'.$entry ;
						$tabFileName [] = $entry ;
					}
				}
				else if (is_dir ($dir.'/'.$entry)) {
					$this->getFilePath ($tabFilePath, $tabFileName, $dir.'/'.$entry) ;
				}
			}
				
			closedir ($handle) ;
		}
	}
}
?>
