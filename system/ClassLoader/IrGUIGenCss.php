<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrGUIGenCss {
	
	static function getFilePath () {
		
		$tab = array () ;
		$j = 0 ;
		
		$j = IrGUIGenCss::addToTab ($tab, $j, 'plugins') ;
		
		return $tab ;
	}
	
	function addToTab (&$tab, $j, $basePath) {
		
		$tabPlugins = array () ;
		$i = 0 ;
		
		if ($handle = opendir ($basePath)) {
			while (false !== ($entry = readdir ($handle))) {
		
				if ($entry == '.' || $entry == '..') {
				}
				else if (is_dir ($basePath.'/'.$entry)) {
					$tabPlugins [ $i ] = $entry ; ++$i ;
				}
			}
		
			closedir ($handle) ;
		}
		
		$limit = count ($tabPlugins) ;
		for ($i = 0 ; $i < $limit ; ++$i) {
			
			$tmp = $basePath.'/'.$tabPlugins [ $i ] ;
			
			if (is_dir ($tmp)) {
				$tab [ $j ] = $tmp ; ++$j ;
			}
		}
		
		return $j ;
	}
}
?>
