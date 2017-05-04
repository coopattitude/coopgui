<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */


require ('system/ClassLoader/IrGUIClassLoader.php') ;

class ClassLoader {
	
	function __construct () {
		
	}
	
	static function loaderLocal ($className) {
		$filePath = '' ;
		
		switch ($className) {
			case 'IrGlobalVar' :
			case 'IrSystemEnvCustom' :
			case 'IrSystemGenCss' :
			case 'IrSystemGenJs' :
			case 'IrCommander' :
				$filePath = 'site/'.$className.'.php' ;
			break ;
			
			default :
			break ;
		}
		
		if ($filePath != '') {
			if (file_exists($filePath)) {
				require ($filePath) ;
				
				return true ;
			}
		}
		
		return false ;
	}
	
	static public function loader ($className) {
		$find = false ;
		
		
		$find = ClassLoader::loaderLocal ($className) ;
		
		if ($find == false) {
			$find = IrGUIClassLoader::loader ($className) ;
		}
		
		if ($find == false) {
			echo ('error 101 class not found: '.$className."<br />\n") ;
			exit (1) ;
		}
	}
}

spl_autoload_register(__NAMESPACE__.'\ClassLoader::loader') ;

?>
