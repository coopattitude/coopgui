<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



class IrCssClassHr extends \IrCssClassFather {

	function __construct ($className) {
		parent::__construct ('hr', $className) ;
		
		$this->setMargin (0, 0, 0, 0) ;
		$this->setPadding (0, 0, 0, 0) ;
	}
}
?>
