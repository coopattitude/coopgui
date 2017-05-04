<?php
class IrSystemGenJs extends IrLibGenJs {

	function __construct ($irCommander, $irEnvCustom) {
		parent::__construct ($irCommander, $irEnvCustom) ;
	
		$this->prefixGenPath = '' ;
	}
	
	function loadFilePath (&$tabFilePath, &$tabFileName) {
		parent::loadFilePath ($tabFilePath, $tabFileName) ;
	
		$tab = IrGUIGenJs::getFilePath () ;
		if ($tab != null) {
			$limit = count ($tab) ;
			for ($i = 0 ; $i < $limit ; ++$i) {
				$this->getFilePath ($tabFilePath, $tabFileName, $tab [ $i ]) ;
			}
		}
	}
}
?>