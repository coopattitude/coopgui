<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



/**
 * Champ de saisie
 *
 * Définit un bouton de validation à la fin d'un champ
 *
 */
class IrHtmlInfo extends IrHtmlFather {

	/**
	 *  valeurs spécifiques utilisées par les fonctions
	 */
	
	/**
	 * Initialise les paramètres par défaut
	 *
	 * @param unknown_type $irCommander (page)
	 * @param unknown_type $irGenCss (css)
	 *
	 * valeurs spécifiques sont également définies
	 */
	function __construct ($irCommander, $irGenCss) {
		parent::IrHtmlFather ($irCommander, $irGenCss, 'IrHtmlInfo') ;
	}
	
	function toHtml () {
		
		//////////////////////////////////////////////////////
		unset ($htmlDef) ;
		
		$htmlDef [] = '<div[htmlInfoBox]>' ;
		
			$htmlDef [] = '<div[htmlInfoBoxLeft]>' ;
				$htmlDef [] = '<div[htmlInfoBoxLeftImg]></div>' ;
			$htmlDef [] = '</div>' ;
				
			$htmlDef [] = '<div[htmlInfoBoxRight]>' ;
			
				$htmlDef [] = '<div[htmlInfoBoxRightTop]>' ;
					
					$htmlDef [] = '<div[htmlInfoBoxRightTopTitle]></div>' ;
					$htmlDef [] = '<div[htmlInfoBoxRightTopTop]></div>' ;
					$htmlDef [] = '<div[htmlInfoBoxRightTopMiddle]></div>' ;
					$htmlDef [] = '<div[htmlInfoBoxRightTopBottom]></div>' ;
					
				$htmlDef [] = '</div>' ;
			
			$htmlDef [] = '</div>' ;
			
		$htmlDef [] = '</div>' ;
	
		$irHtmlDef = new \IrHtmlDef ($this->irCommander, $this->getIrGenCss (), $htmlDef) ;
		//////////////////////////////////////////////////////
	
		$irHtmlTag = $irHtmlDef->get ('htmlInfoBox') ;
		$irHtmlTag->setClass ('htmlInfoBox') ;
		$irHtmlTag->setId ('htmlInfoBox_'.$this->getPrefixUniq ()) ;
		
		//////////////////////////////////////////////////////
		
		$irHtmlTag = $irHtmlDef->get ('htmlInfoBoxLeft') ;
		$irHtmlTag->setClass ('htmlInfoBoxLeft') ;
		
		$irHtmlTag = $irHtmlDef->get ('htmlInfoBoxLeftImg') ;
		$irHtmlTag->setClass ('htmlInfoBoxLeftImg') ;
		
		//////////////////////////////////////////////////////
		
		$irHtmlTag = $irHtmlDef->get ('htmlInfoBoxRight') ;
		$irHtmlTag->setClass ('htmlInfoBoxRight') ;
		
		$irHtmlTag = $irHtmlDef->get ('htmlInfoBoxRightTop') ;
		$irHtmlTag->setClass ('htmlInfoBoxRightTop') ;
		
		$irHtmlTag = $irHtmlDef->get ('htmlInfoBoxRightTopTitle') ;
		$irHtmlTag->setClass ('htmlInfoBoxRightTopTitle') ;
		$irHtmlTag->appendContent ('title') ;
		
		$irHtmlTag = $irHtmlDef->get ('htmlInfoBoxRightTopTop') ;
		$irHtmlTag->setClass ('htmlInfoBoxRightTopTop') ;
		
		$irHtmlTag = $irHtmlDef->get ('htmlInfoBoxRightTopMiddle') ;
		$irHtmlTag->setClass ('htmlInfoBoxRightTopMiddle') ;
		
		$irHtmlTag = $irHtmlDef->get ('htmlInfoBoxRightTopBottom') ;
		$irHtmlTag->setClass ('htmlInfoBoxRightTopBottom') ;
		
		//////////////////////////////////////////////////////
		
		return $irHtmlDef->toHtml ().$this->scriptInit ('htmlInfo', $this->getPrefixUniq (), $this->getIrGenCss ()->css) ;
	}
	
	private function getText ($ref) {
		$parentRef = 'Lang:'.$this->irCommander->irLang->lang.'::Module:IrHtml::Domain:IrHtmlInfo::Page:Default::Ref:' ;
	
		return $this->getTextFullRef ($parentRef.$ref) ;
	}
}
?>