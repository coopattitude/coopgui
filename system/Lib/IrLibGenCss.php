<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrLibGenCss {
	var $irCommander ;
	var $irEnvCustom ;
	
	var $css ;
	
	var $prefixGenPath ;
	
	function __construct ($irCommander, $irEnvCustom) {
		$this->irCommander = $irCommander ;
		$this->irEnvCustom = $irEnvCustom ;
		
		$this->css = '' ;
		
		$this->prefixGenPath = '' ;
	}
	
	function loadFilePath (&$tabFilePath, &$tabFileName) {
		
	}
	
	function getLinkCss () {	
		if ($this->css != '') {
			if ($this->prefixGenPath == '') {
				$filePath = 'gen/css/'.$this->css.'_all.css' ;
			}
			else {
				$filePath = $this->prefixGenPath.'/gen/css/'.$this->css.'_all.css' ;
			}
				
			if (file_exists ($filePath)) {
				return '<link rel="stylesheet" type="text/css" href="'.$filePath.'" />' ;
			}
		}
		
		return '' ;
	}
	
	function initCss () {
		
		$this->css = $this->irEnvCustom->refCss ;
		
		if ($this->css != '') {
			if ($this->prefixGenPath == '') {
				$filePath = 'gen/css/'.$this->css.'_all.css' ;
			}
			else {
				$filePath = $this->prefixGenPath.'/gen/css/'.$this->css.'_all.css' ;
			}
			
			if ($this->irCommander->redoCssCacheOn () || file_exists ($filePath) == false) {
				$this->genCss ($filePath) ;
			}
		
			if (file_exists ($filePath)) {
				if (isset ($GLOBALS [ 'doublonCss' ]) == false || is_array ($GLOBALS [ 'doublonCss' ]) == false) {
					$GLOBALS [ 'doublonCss' ] = array () ;
				}
		
				$found = false ;
		
				$limit = count ($GLOBALS [ 'doublonCss' ]) ;
				for ($i = 0 ; $i < $limit ; ++$i) {
					if ($GLOBALS [ 'doublonCss' ] [ $i ] == $filePath) {
						$found = true ;
						break ;
					}
				}
		
				if ($found == false) {
					$GLOBALS [ 'doublonCss' ] [] = $filePath ;
		
					return '<link rel="stylesheet" type="text/css" href="'.$filePath.'" />' ;
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
	
	public function genCss ($filePath) {
		unset ($tabFilePath) ;
		unset ($tabFileName) ;
		
		$this->loadFilePath ($tabFilePath, $tabFileName) ;
		
		$str = '' ;
		
// 		$str2 = '' ;
		
		$limit = count ($tabFilePath) ;
		for ($i = 0 ; $i < $limit ; ++$i) {
			$filePathTmp = $tabFilePath [ $i ] ;
			$fileNameTmp = $tabFileName [ $i ] ;
			$className = substr ($fileNameTmp, 0, (strlen ($fileNameTmp) - 4)) ;
			
			require_once ($filePathTmp) ;
			$irCss = new $className ($this->irCommander, $this) ;
				
			$str .= $irCss->toString () ;
			
			//$fp = fopen ($filePathTmp.'2', 'w') ;
			//fwrite ($fp, $irCss->toString ()) ;
			//fclose ($fp) ;
			
// 			$str2 .= 'className: '.$className."\r" ;
// 			$str2 .= 'memory: '.memory_get_usage(true)."\r" ;
// 			$str2 .= 'memory_get_usage: '.memory_get_usage()."\r" ;
// 			$str2 .= 'memory_get_peak_usage: '.memory_get_peak_usage()."\r\n" ;
			
// 			$fp = fopen ('/tmp/test.txt', 'w') ;
// 			fwrite ($fp, $str2) ;
// 			fclose ($fp) ;
		}
		
		$str = $this->compressCss ($str) ;
		
		$fp = fopen ($filePath, 'w') ;
		fwrite ($fp, $str) ;
		fclose ($fp) ;
	}
	
	public function getFilePath (&$tabFilePath, &$tabFileName, $dir) {
		if ($handle = opendir ($dir)) {
			while (false !== ($entry = readdir ($handle))) {
				
				if ($entry == '.' || $entry == '..') {					
				}
				else if (is_file ($dir.'/'.$entry)) {
					if (substr ($entry, (strlen ($entry) - 4), 4) == '.php') {
						if (substr ($entry, 0, 6) == 'IrCss_') {
							$tabFilePath [] = $dir.'/'.$entry ;
							$tabFileName [] = $entry ;
						}
					}
				}
				else if (is_dir ($dir.'/'.$entry)) {
					$this->getFilePath ($tabFilePath, $tabFileName, $dir.'/'.$entry) ;
				}
			}
				
			closedir ($handle) ;
		}
	}
		
	public function compressCss ($css) {
		$css = str_replace("\r\n", "\n", $css);
	
		// preserve empty comment after '>'
		// http://www.webdevout.net/css-hacks#in_css-selectors
		$css = preg_replace('@>/\\*\\s*\\*/@', '>/*keep*/', $css);
	
		// preserve empty comment between property and value
		// http://css-discuss.incutio.com/?page=BoxModelHack
		$css = preg_replace('@/\\*\\s*\\*/\\s*:@', '/*keep*/:', $css);
		$css = preg_replace('@:\\s*/\\*\\s*\\*/@', ':/*keep*/', $css);
		
		// remove ws around { } and last semicolon in declaration block
		$css = preg_replace('/\\s*{\\s*/', '{', $css);
		$css = preg_replace('/;?\\s*}\\s*/', '}', $css);
	
		// remove ws surrounding semicolons
		$css = preg_replace('/\\s*;\\s*/', ';', $css);
	
		// remove ws around urls
		$css = preg_replace('/
				url\\(      # url(
				\\s*
				([^\\)]+?)  # 1 = the URL (really just a bunch of non right parenthesis)
				\\s*
				\\)         # )
				/x', 'url($1)', $css);
	
		// remove ws between rules and colons
		$css = preg_replace('/
				\\s*
				([{;])              # 1 = beginning of block or rule separator
				\\s*
				([\\*_]?[\\w\\-]+)  # 2 = property (and maybe IE filter)
				\\s*
				:
				\\s*
				(\\b|[#\'"])        # 3 = first character of a value
				/x', '$1$2:$3', $css);
		
		// minimize hex colors
		$css = preg_replace('/([^=])#([a-f\\d])\\2([a-f\\d])\\3([a-f\\d])\\4([\\s;\\}])/i'
				, '$1#$2$3$4$5', $css);
		
		$css = preg_replace('/@import\\s+url/', '@import url', $css);
	
		// replace any ws involving newlines with a single newline
		$css = preg_replace('/[ \\t]*\\n+\\s*/', "\n", $css);
	
		// separate common descendent selectors w/ newlines (to limit line lengths)
		$css = preg_replace('/([\\w#\\.\\*]+)\\s+([\\w#\\.\\*]+){/', "$1\n$2{", $css);
	
		// Use newline after 1st numeric value (to limit line lengths).
		$css = preg_replace('/
				((?:padding|margin|border|outline):\\d+(?:px|em)?) # 1 = prop : 1st numeric value
				\\s+
				/x'
				,"$1\n", $css);
	
		// prevent triggering IE6 bug: http://www.crankygeek.com/ie6pebug/
		$css = preg_replace('/:first-l(etter|ine)\\{/', ':first-l$1 {', $css);
	
		return trim($css);
	}
}
?>
