<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */




class IrGUIClassLoader {
	
	function __construct () {
		
	}	
	
	static public function loader ($className) {
// 		echo ($className."\n") ;
		
		$filePath = '' ;
		
		switch ($className) {
			
			case 'IrContainer' :
			case 'IrHtmlAtt' :
			case 'IrHtmlDef' :
			case 'IrHtmlTag' :
			case 'IrLibEnvCustom' :
			case 'IrLibGenCss' :
			case 'IrLibGenJs' :
				$filePath = 'system/Lib/'.$className.'.php' ;
				break ;
				
			case 'IrPreValid' :
				$filePath = 'system/Validator/'.$className.'.php' ;
			break ;
			
			case 'IrGUIGenCss' :
			case 'IrGUIGenJs' :
				$filePath = 'system/ClassLoader/'.$className.'.php' ;
			break ;
			
			case 'IrCssRecipe' :
			case 'IrCssRecipeBox' :
			case 'IrCssRecipePolice' :
				$filePath = 'system/CssRecipe/'.$className.'.php' ;
			break ;
			
			case 'IrCssClassA' :
			case 'IrCssClassBody' :
			case 'IrCssClassCanvas' :
			case 'IrCssClassDiv' :
			case 'IrCssClassFather' :
			case 'IrCssClassHr' :
			case 'IrCssClassIFrame' :
			case 'IrCssClassImg' :
			case 'IrCssClassInput' :
			case 'IrCssClassLi' :
			case 'IrCssClassOption' :
			case 'IrCssClassPlaceHolder' :
			case 'IrCssClassSelect' :
			case 'IrCssClassSpan' :
			case 'IrCssClassSvg' :
			case 'IrCssClassTable' :
			case 'IrCssClassTbody' :
			case 'IrCssClassTd' :
			case 'IrCssClassTextArea' :
			case 'IrCssClassTh' :
			case 'IrCssClassThead' :
			case 'IrCssClassTr' :
			case 'IrCssClassUl' :
			case 'IrCssFather' :
				$filePath = 'system/Css/'.$className.'.php' ;
			break ;
			
			case 'IrHtmlFather' :
				$filePath = 'system/Html/'.$className.'.php' ;
			break ;
			
			case 'IrHtmlInfo' :
				$filePath = 'plugins/Info/'.$className.'.php' ;
			break ;
			
			
			
			default :
// 				{
// 					echo ('error 100 class not found: '.$className) ;
// 					exit (1) ;					
// 				}
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
}
?>
