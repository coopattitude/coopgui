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
class IrHtmlTag {
	
	/**
	 *  valeurs spécifiques utilisées par les fonctions, notamment les attributs (class, id, etc.)
	 */
	var $irCommander ;
	var $irGenCss ;
	
	var $tag ;
	var $flag ;
	
	var $att ;
	var $content ;
	
	var $class ;
	var $id ;
	var $name ;
	var $type ;
	var $style ;
	var $value ;
	var $src ;
	var $hRef ;
	var $width ;
	var $height ;
	var $title ;
	var $tooltip ;
	
	/**
	 * 
	 * @param unknown_type $irCommander
	 * @param unknown_type $irGenCss
	 * @param string $tag (nom de la balise)
	 */
	function IrHtmlTag ($irCommander, $irGenCss, $tag) {
		$this->irCommander = $irCommander ;
		$this->irGenCss = $irGenCss ;
		
		$this->tag = $tag ;
		$this->flag = '' ;
		
		$this->att = '' ;
		$this->content = '' ;
		
		$this->class = '' ;
		$this->id = '' ;
		$this->name = '' ;
		$this->type = '' ;
		$this->style = '' ;
		$this->value = '' ;
		$this->src = '' ;
		$this->hRef = '' ;
		$this->width = '' ;
		$this->height = '' ;
		$this->title = '' ;
		$this->tooltip = '' ;
	}
	
	/**
	 * Donne le texte entre crochets d'une balise du tableau htmlDef
	 * @param string $flag
	 */
	function initFlag ($flag) {
		$this->flag = $flag ;
	}
	
	/**
	 * Permet de récupérer le type de balise
	 * @return string
	 */
	function getTag () {
		return $this->tag ;
	}
	
	/**
	 * Récupération de tout le texte des attributs injectés dans la balise
	 * @return string
	 */
	function getAtt () {
		$str = '' ;
		
		if ($this->class != '') {
			$str .= g()->insertInHAtt ('class', $this->class).' ' ;
		}
		if ($this->id != '') {
			$str .= g()->insertInHAtt ('id', $this->id).' ' ;
		}
		if ($this->name != '') {
			$str .= g()->insertInHAtt ('name', $this->name).' ' ;
		}
		if ($this->type != '') {
			$str .= g()->insertInHAtt ('type', $this->type).' ' ;
		}
		if ($this->style != '') {
			$str .= g()->insertInHAtt ('style', $this->style).' ' ;
		}
		if ($this->value != '') {
			$str .= g()->insertInHAtt ('value', $this->value).' ' ;
		}
		if ($this->src != '') {
			$str .= g()->insertInHSrc ('src', $this->src).' ' ;
		}
		if ($this->hRef != '') {
			$str .= g()->insertInHSrc ('href', $this->hRef).' ' ;
		}
		if ($this->width != '') {
			$str .= g()->insertInHAtt ('width', $this->width).' ' ;
		}
		if ($this->height != '') {
			$str .= g()->insertInHAtt ('height', $this->height).' ' ;
		}
		if ($this->title != '') {
			$str .= g()->insertInHAtt ('title', $this->title).' ' ;
			$str .= g()->insertInHAtt ('alt', $this->title).' ' ;
		}
		if ($this->tooltip != '') {
			$irHtmlAtt = g()->addTooltipFullText ($this->tooltip) ;
			if ($irHtmlAtt != null) {
				$str .= $irHtmlAtt->toHtml ().' ' ;
			}
		}
		
		$str .= $this->att ;
		
		return $str ;
	}
	
	/**
	 * Permet de récupérer le contenu des balises
	 * @return string
	 */
	function getContent () {
		return $this->content ;
	}
	
	/**
	 * Permet d'injecter du contenu entre les balises
	 * @param string $content
	 */
	function appendContent ($content) {
		$this->content .= $content ;
	}
	
	/**
	 * Permet de spécifier un attribut à la balise
	 * @param string $att
	 */
	function appendIrHtmlAtt ($irHtmlAtt) {
		
		if ($irHtmlAtt != null) {
			
			
// 			debug_print_backtrace (DEBUG_BACKTRACE_IGNORE_ARGS) ;
			
			$this->att .= $irHtmlAtt->toHtml () ;
		}
	}
	
	function appendIrHtmlAttNew ($name, $value) {
		$irHtmlAtt = new \IrHtmlAtt ($this->irCommander) ;
		$irHtmlAtt->setAtt ($name, $value) ;
		
		if ($irHtmlAtt != null) {
			$this->att .= $irHtmlAtt->toHtml () ;
		}
	}
	
	/**
	 * Permet de spécifier une class (pour le css)
	 * @param string $class
	 */
	function setClass ($class) {		
		if ($this->irGenCss->css != '') {
			$this->class = $this->irGenCss->css.'_'.$class ;
		}
		else {
			$this->class = $class ;
		}
	}
	
	/**
	 * Permet de spécifier un id
	 * @param string $id
	 */
	function setId ($id) {
		$this->id = $id ;
	}
	
	/**
	 * Permet de spécifier le nom (pour le serveur java)
	 * @param string $name
	 */
	function setName ($name) {
		$this->name = $name ;
	}
	
	/**
	 * Permet de définir l'attribut type
	 * @param string $type
	 */
	function setType ($type) {
		$this->type = $type ;
	}
	
	/**
	 * Permet de définir l'attribut style
	 * @param string $style
	 */
	function setStyle ($style) {
		$this->style = $style ;
	}
	/**
	 * Permet de définir l'attribut value
	 * @param string $value
	 */
	function setValue ($value) {
		$this->value = $value ;
	}
	
	/**
	 * Permet de spécifier l'attribut src
	 * @param string $src
	 */
	function setSrc ($src) {
		$this->src = $src ;
	}
	
	/**
	 * Permet de spécifier l'attribut Href
	 * @param string $hRef
	 */
	function setHref ($hRef) {
		$this->hRef = $hRef ;
	}
	
	/**
	 * Permet de spécifier la largeur
	 * @param string $width
	 */
	function setWidth ($width) {
		$this->width = $width ;
	}
	
	/**
	 * Permet de spécifier la hauteur
	 * @param string $height
	 */
	function setHeight ($height) {
		$this->height = $height ;
	}
	
	/**
	 * Permet de spécifier l'attribut title (qui permet de voir une infobulle)
	 * @param string $title
	 */
	function setTitle ($title) {
		$this->title = $title ;
	}
	
	/**
	 * Permet de spécifier à la fois le title (infobulle) et le alt (mot clé)
	 * @param string $tooltip
	 */
	function setTooltip ($tooltip) {
		$this->tooltip = $tooltip ;
	}
	
	/**
	 * Injecte dans le html la balise avec son nom et ses attributs et rajoute le contenu entre les balises
	 * @return string
	 */
	function openTagAndContentToHtml () {
		if ($this->tag == 'br' || $this->tag == 'input' || $this->tag == 'img') {
			return '<'.$this->tag.' '.$this->getAtt ().' />' ;
		}
		
		return '<'.$this->tag.' '.$this->getAtt ().'>'.$this->getContent () ;
	}
	
	/**
	 * Injecte la balise fermante dans le html
	 * @return string
	 */
	function closeTagToHtml () {
		if ($this->tag == 'br' || $this->tag == 'input' || $this->tag == 'img') {
			return '' ;
		}
		
		return '</'.$this->tag.'>' ;
	}
	
	/**
	 * Retourne l'ensemble html complet : balise + contenu + balise fermante
	 * @return string
	 */
	function toHtml () {
		if ($this->tag == 'br' || $this->tag == 'input' || $this->tag == 'img') {
			return '<'.$this->tag.' '.$this->getAtt ().' />' ;
		}
		return $this->openTagAndContentToHtml ().'</'.$this->tag.'>' ;
	}
}
?>
