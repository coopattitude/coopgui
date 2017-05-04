<?php
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



/**
 * Objet permettant de créer des balises html
 *
 * Un tableau htmlDef est créé qui donne toutes les balises html.
 * Ce tableau est récupéré et traité grace à IrHtmlDef.
 * IrHtmlTag permet de traiter (donner attributs et contenu) les balises qui ont besoin de l'être.
 *
 */
class IrHtmlDef {
	
	/**
	 *  valeurs spécifiques utilisées par les fonctions
	 */
	var $irCommander ;
	var $irGenCss ;
	var $htmlDef ;
	
	var $tabFlag ;
	
	/**
	 * Initialise les paramètres par défaut
	 *
	 * @param unknown_type $irCommander (page)
	 * @param unknown_type $irGenCss (css)
	 *
	 * valeurs spécifiques sont également définies
	 */
	function IrHtmlDef ($irCommander, $irGenCss, $htmlDef) {
		$this->irCommander = $irCommander ;
		$this->irGenCss = $irGenCss ;
		$this->htmlDef = $htmlDef ;

		unset ($this->tabFlag) ;
		
		$this->parse () ;
	}
	
	/**
	 * Analyse le tableau et crée les htmlTag qui permettront d'injecter les balises proprement dite
	 */
	private function parse () {
		$str = '' ;
		if (isset ($this->htmlDef) && count ($this->htmlDef) > 0) {
			$str = implode ('', $this->htmlDef) ;
		}
		
		while (true) {
			$pos = strpos ($str, '[') ;
			if ($pos !== false) {
				
				$pos2 = strpos ($str, ']', ($pos+1)) ;
				if ($pos2 !== false) {
					
					$tmp = '' ;
					$i = $pos-1 ;
					do {
						if ($i < 0) {
							break ;
						}
						$char = $str [ $i ] ;
						if ($char != '<') {
							$tmp = $char.$tmp ;
						}
						--$i ;
						
						if ($char == '<') {
							break ;
						}
					}
					while (true) ;
					
					$tag = $tmp ;
					$tag = trim ($tag) ;
					$flag = substr ($str, ($pos+1), ($pos2-($pos+1))) ;
					$flag = trim ($flag) ;
					
					$this->tabFlag [ $flag ] = new \IrHtmlTag ($this->irCommander, $this->irGenCss, $tag) ;
					$this->tabFlag [ $flag ]->initFlag ($flag) ;
					
					$str = substr ($str, ($pos2+1), (strlen ($str) - ($pos2+1))) ;
				}
				else {
					break ;
				}
			}
			else {
				break ;
			}
		}
			
	}
	
	/**
	 * Permet de récupérer le texte entre crochet
	 * @param string $flag
	 */
	function get ($flag) {
		return $this->tabFlag [ $flag ] ;
	}
	
	/**
	 * Crée le fichier html à partir des balises spécifiées dans le tableau htmlDef
	 * @return string
	 */
	function toHtml () {
		$html = '' ;
		
		$str = '' ;
		if (isset ($this->htmlDef) && count ($this->htmlDef) > 0) {
			$str = implode ('', $this->htmlDef) ;
		}
		
		while (true) {
			$pos = strpos ($str, '<') ;
			if ($pos !== false) {
		
				$pos2 = strpos ($str, '>', ($pos+1)) ;
				if ($pos2 !== false) {
					
					$tmp = '' ;
					$i = $pos2-1 ;
					do {
						if ($i < 0) {
							break ;
						}
						$char = $str [ $i ] ;
						if ($char != '<') {
							$tmp = $char.$tmp ;
						}
						--$i ;
							
						if ($char == '<') {
							break ;
						}
					}
					while (true) ;
					
					$str2 = $tmp ;
					
					$boolEndTag = false ;
					
					if (count ($str2) > 0 && $str2 [ 0 ] == '/') {
						$boolEndTag = true ;
					}
					
					if ($boolEndTag == false) {
						$boolFlag = false ;
						
						$pos3 = strpos ($str2, '[') ;
						if ($pos3 !== false) {
							$pos4 = strpos ($str2, ']', ($pos3+1)) ;
							if ($pos4 !== false) {
								$boolFlag = true ;
							}
						}
						
						if ($boolFlag) {
							$tag = substr ($str2, 0, $pos3) ;
							$tag = trim ($tag) ;
							$flag = substr ($str2, ($pos3+1), ($pos4-($pos3+1))) ;
							$flag = trim ($flag) ;
							
							$irHtmlTag = $this->tabFlag [ $flag ] ;
							
							$html .= $irHtmlTag->openTagAndContentToHtml () ;
						}
						else {
							$tag = $tmp ;
							$tag = trim ($tag) ;
							
							$html .= '<'.$tag.'>' ;
						}
					}
					else {
						$tag = substr ($str2, 1, (strlen ($str2) - 1)) ;
						$tag = trim ($tag) ;
						
						$html .= '</'.$tag.'>' ;
					}
						
					$str = substr ($str, ($pos2+1), (strlen ($str) - ($pos2+1))) ;
				}
				else {
					break ;
				}
			}
			else {
				break ;
			}
		}
		
		return $html ;
	}
}
?>
