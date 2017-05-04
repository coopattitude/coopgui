<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrCssClassPlaceHolder extends \IrCssClassFather {

	function __construct ($className) {
		parent::__construct ('span', $className) ;
	}
	
	function toString ($css) {
		$str .= "\n" ;
		
		$str = '/* all */
			::-webkit-input-placeholder { color:#ffffff; }
			::-moz-placeholder { color:#ffffff; } /* firefox 19+ */
			:-ms-input-placeholder { color:#ffffff; } /* ie */
			input:-moz-placeholder { color:#ffffff; }
			
			/* individual: webkit */
			#field2::-webkit-input-placeholder { color:#ffffff; }
			#field3::-webkit-input-placeholder { color:#ffffff; background:lightgreen; text-transform:uppercase; }
			#field4::-webkit-input-placeholder { font-style:normal; text-decoration:overline; letter-spacing:5px; color:#ffffff; }
			
			/* individual: mozilla */
			#field2::-moz-placeholder { color:#ffffff; }
			#field3::-moz-placeholder { color:#ffffff; background:lightgreen; text-transform:uppercase; }
			#field4::-moz-placeholder { font-style:normal; text-decoration:overline; letter-spacing:5px; color:#ffffff; }' ;
		
		$str .= "\n" ;
		$str .= "\n" ;
		return $str ;
	}
}
?>
