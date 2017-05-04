<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



/**
 * Objet qui permet de récupérer des balises html, de leur spécifier des attributs et de leur donner du contenu
 * Ce contenu est ensuite envoyé en tant que fichier html
 *
 * A utiliser en conjonction avec IrHtmlDef qui permet la création des balises
 *
 */
class IrHtmlAtt {
	
	/**
	 *  valeurs spécifiques utilisées par les fonctions, notamment les attributs (class, id, etc.)
	 */
	var $irCommander ;
	
	var $tab ;
	var $tabInc ;
	
	/**
	 * 
	 * @param unknown_type $irCommander
	 * @param unknown_type $irGenCss
	 * @param string $tag (nom de la balise)
	 */
	function __construct ($irCommander) {
		$this->irCommander = $irCommander ;
		
		unset ($this->tab) ;
		$this->tabInc = 0 ;
	}
	
	function contains ($name) {
		$limit = count ($this->tab) ;
		for ($i = 0 ; $i < $limit ; ++$i) {
			$tmpName = $this->tab [ $i ] [ 'name' ] ;
		
			if (strtolower ($name) == strtolower ($tmpName)) {
				return true ;
			}
		}
		
		return false ;
	}
	
	function append ($irHtmlAtt) {
		if ($irHtmlAtt != null) {
			$limit = count ($irHtmlAtt->tab) ;
			for ($i = 0 ; $i < $limit ; ++$i) {
				$name = $irHtmlAtt->tab [ $i ] [ 'name' ] ;
				$value = $irHtmlAtt->tab [ $i ] [ 'value' ] ;
				
				$this->tab [ $this->tabInc ] [ 'name' ] = $name ;
				$this->tab [ $this->tabInc ] [ 'value' ] = $value ;
				
				++ $this->tabInc ;
			}
		}
	}
	
	function setAtt ($name, $value) {
		$this->tab [ $this->tabInc ] [ 'name' ] = $name ;
		$this->tab [ $this->tabInc ] [ 'value' ] = $value ;
		
		++ $this->tabInc ;
		
		
		// si onclick : on peut purifier les fonctions appelées...
	}
	
	function toHtml () {
		$att = '' ;
		
		$limit = count ($this->tab) ;
		for ($i = 0 ; $i < $limit ; ++$i) {
			if ($this->tab [ $i ] [ 'name' ] == 'data-fancybox-href' || $this->tab [ $i ] [ 'name' ] == 'src' || $this->tab [ $i ] [ 'name' ] == 'href') {
				$att .= ' '.g()->insertInHSrc ($this->tab [ $i ] [ 'name' ], $this->tab [ $i ] [ 'value' ]) ;
			}
			else {
				$att .= ' '.g()->insertInHAtt ($this->tab [ $i ] [ 'name' ], $this->tab [ $i ] [ 'value' ]) ;
			}
		}
		
		return $att ;
	}
}
?>
