<?php
/**
 * Fichier qui définit toutes les caractéristiques générales de CooPAttitude
 *
 */
class IrGlobalVar {
	
	/**
	 *  valeurs spécifiques utilisées par les fonctions
	 */
	var $irCommander ;

	var $tabFontOpt ;
	
	var $displayXmlStr ;
	var $displayXmlLevel ;
	
	var $str ;
	
	/**
	 * Initialise les paramètres par défaut
	 *
	 * @param unknown_type $irCommander (page)
	 * @param unknown_type $irGenCss (css)
	 *
	 * valeurs spécifiques sont également définies
	 * Largeur des lettres est défini
	 */
	function __construct ($irCommander) {
		$this->irCommander = $irCommander ;
				
		unset ($this->tabFontOpt) ;
		
		$this->tabFontOpt [ ' ' ] [ 'width' ] = 4 ;
		$this->tabFontOpt [ 'à' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'é' ] [ 'width' ] = 7 ;
		$this->tabFontOpt [ 'è' ] [ 'width' ] = 7 ;
		$this->tabFontOpt [ 'ê' ] [ 'width' ] = 7 ;
		$this->tabFontOpt [ 'ô' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'ö' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'ù' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'ü' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'ç' ] [ 'width' ] = 8 ;
		
		$this->tabFontOpt [ 'a' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'b' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'c' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'd' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'e' ] [ 'width' ] = 7 ;
		$this->tabFontOpt [ 'f' ] [ 'width' ] = 6 ;
		$this->tabFontOpt [ 'g' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'h' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'i' ] [ 'width' ] = 4 ;
		$this->tabFontOpt [ 'j' ] [ 'width' ] = 4 ;
		$this->tabFontOpt [ 'k' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'l' ] [ 'width' ] = 3 ;
		$this->tabFontOpt [ 'm' ] [ 'width' ] = 11 ;
		$this->tabFontOpt [ 'n' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'o' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'p' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'q' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'r' ] [ 'width' ] = 6 ;
		$this->tabFontOpt [ 's' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 't' ] [ 'width' ] = 4 ;
		$this->tabFontOpt [ 'u' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'v' ] [ 'width' ] = 7 ;
		$this->tabFontOpt [ 'w' ] [ 'width' ] = 11 ;
		$this->tabFontOpt [ 'x' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'y' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'z' ] [ 'width' ] = 8 ;
		
		$this->tabFontOpt [ 'A' ] [ 'width' ] = 11 ;
		$this->tabFontOpt [ 'B' ] [ 'width' ] = 11 ;
		$this->tabFontOpt [ 'C' ] [ 'width' ] = 10 ;
		$this->tabFontOpt [ 'D' ] [ 'width' ] = 11 ;
		$this->tabFontOpt [ 'E' ] [ 'width' ] = 11 ;
		$this->tabFontOpt [ 'F' ] [ 'width' ] = 10 ;
		$this->tabFontOpt [ 'G' ] [ 'width' ] = 10 ;
		$this->tabFontOpt [ 'H' ] [ 'width' ] = 11 ;
		$this->tabFontOpt [ 'I' ] [ 'width' ] = 4 ;
		$this->tabFontOpt [ 'J' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'K' ] [ 'width' ] = 10 ;
		$this->tabFontOpt [ 'L' ] [ 'width' ] = 8 ;
		$this->tabFontOpt [ 'M' ] [ 'width' ] = 13 ;
		$this->tabFontOpt [ 'N' ] [ 'width' ] = 10 ;
		$this->tabFontOpt [ 'O' ] [ 'width' ] = 11 ;
		$this->tabFontOpt [ 'P' ] [ 'width' ] = 10 ;
		$this->tabFontOpt [ 'Q' ] [ 'width' ] = 11 ;
		$this->tabFontOpt [ 'R' ] [ 'width' ] = 11 ;
		$this->tabFontOpt [ 'S' ] [ 'width' ] = 9 ;
		$this->tabFontOpt [ 'T' ] [ 'width' ] = 9 ;
		$this->tabFontOpt [ 'U' ] [ 'width' ] = 10 ;
		$this->tabFontOpt [ 'V' ] [ 'width' ] = 9 ;
		$this->tabFontOpt [ 'W' ] [ 'width' ] = 14 ;
		$this->tabFontOpt [ 'X' ] [ 'width' ] = 11 ;
		$this->tabFontOpt [ 'Y' ] [ 'width' ] = 10 ;
		$this->tabFontOpt [ 'Z' ] [ 'width' ] = 10 ;
		
		$this->displayXmlStr = '' ;
		$this->displayXmlLevel = 0 ;
		
		$this->str = '' ;
	}
	
	/**
	 * filtre l'insertion de données brut en attribut d'une balise html
	 * @param string $name
	 * @param string $value
	 */
	function insertInHAtt ($name, $value) {
		$name = str_replace ('"', '', $name) ;
		$name = str_replace ("'", '', $name) ;
		$name = str_replace (' ', '', $name) ;
		
		if ($value != '') {
			// l'html transforme et le javascript ne submit pas la conversion
			// obligé parce que sinon : "  \" " html ne le comprends pas. mais "  &quot; " il comprend.		
			$value = htmlspecialchars ($value, ENT_QUOTES, 'UTF-8') ;
		}
		
		return $name.'="'.$value.'"' ;
	}
	
	function insertInHSrc ($name, $value) {
		$name = str_replace ('"', '', $name) ;
		$name = str_replace ("'", '', $name) ;
		$name = str_replace (' ', '', $name) ;
	
		//url
		$value = str_replace ('"', '&quot;', $value) ;
	
		return $name.'="'.$value.'"' ;
	}
	
	/**
	 * filtre l'insertion d'une string php dans du code javascript quoté
	 * @param string $str
	 * @return string
	 */
	function insertInQuotedJs ($str) {
		$str = str_replace ("'", "\'", $str) ;
		$str = str_replace ("\n", "", $str) ;
		$str = str_replace ("\r", "", $str) ;
		return $str ;
	}
	
	function insertTextInQuotedJs ($str) {
	
		$str = str_replace (chr(10), '', $str) ;
		$str = str_replace (chr(13), '', $str) ;
	
		$str = str_replace ("'", "\'", $str) ;
		$str = str_replace ("\n", "", $str) ;
		$str = str_replace ("\r", "", $str) ;
		return $str ;
	}
	
	function insertTextInQuotedJsAndJson ($str) {
	
		$str = str_replace (chr(10), '', $str) ;
		$str = str_replace (chr(13), '', $str) ;
	
		$str = str_replace ('"', '\"', $str) ;
		$str = str_replace ("'", "\'", $str) ;
		$str = str_replace ("\n", "", $str) ;
		$str = str_replace ("\r", "", $str) ;
		return $str ;
	}
	
	/**
	 * Permet de rajouter une infobulle en passant par le fichier de traduction
	 * @param object $irPage
	 * @param string $tooltip
	 * @return string
	 */
	
	function addTooltip ($irPage, $tooltip) {
		$irHtmlAtt = new \IrHtmlAtt ($this->irCommander) ;
		$irHtmlAtt->setAtt ('alt', $irPage->getText ($tooltip)) ;
		$irHtmlAtt->setAtt ('title', $irPage->getText ($tooltip)) ;
		
		return $irHtmlAtt ;
	}
	
	/**
	 * Permet de rajouter une infobulle (title) et un mot clé (alt)
	 * @param string $text
	 * @return string
	 */
	function addTooltipFullText ($text) {
		$irHtmlAtt = new \IrHtmlAtt ($this->irCommander) ;
		$irHtmlAtt->setAtt ('alt', $text) ;
		$irHtmlAtt->setAtt ('title', $text) ;
	
		return $irHtmlAtt ;
	}
	
	/**
	 * enlève la balise <p> (utilisé avec tiny MCE pour éviter d'avoir cette balise en début de texte et éviter un espace)
	 * @param string $post
	 * @return string
	 */
	function noParagraphStart ($post) {
		$pos = strpos ($post, '<p>') ;
		if ($pos === false) {
		}
		else {
			if ($pos == 0) {
				$pos = strrpos ($post, '</p>') ;
				if ($pos === false) {
				}
				else {
					if ($pos == strlen ($post) - 4) {
						$post = substr ($post, 3, (strlen ($post) - 3 - 4)) ;
					}
				}
			}
		}
		return $post ;
	}
	
	function getDayNoZero ($date) {
		$day = substr ($date, 8, 2) ;
		
		if (strlen ($day) == 2 && substr ($day, 0, 1) == '0') {
			$day = substr ($day, 1, 1) ;
		}
		
		return $day ;
	}
	
	function isInMonth ($date, $monthCurrent, $yearCurrent) {
		$theYear = substr ($date, 0, 4) ;
		$theMonth = substr ($date, 5, 2) ;
		$theDay = substr ($date, 8, 2) ;
		
		if ($monthCurrent == $theMonth) {
			if ($yearCurrent == $theYear) {
				return true ;
			}
		}
		
		return false ;
	}
	
	function getYear ($date) {
		if ($date != '') {
			return substr ($date, 0, 4) ;
		}
		
		return '' ;
	}
	
	function getMonth ($date) {
		if ($date != '') {
			return substr ($date, 5, 2) ;
		}
		
		return '' ;
	}
	
	/**
	 * Remplace une chaine de caractères par une autre dans un texte
	 * @param string $text
	 * @param string $name
	 * @param string $value
	 * @return string
	 */
	function replace ($text, $name, $value) {
		$text = str_replace ($name, $value, $text) ;
		
		return $text ;
	}
	
	/**
	 * Permet de s'assurer qu'une chaine spécifique de caractères commence un texte
	 * @param string $str
	 * @param string $search
	 * @return boolean
	 */
	function startsWith ($str, $search) {
		if (strpos ($str, $search) === 0) {
			return true ;
		}
	
		return false ;
	}
	
	/**
	 * Permet de s'assurer qu'une chaine spécifique de caractère finit un texte
	 * @param string $str
	 * @param string $search
	 * @return boolean
	 */
	function endsWith ($str, $search) {
		$pos = strpos ($str, $search) ;
		if ($pos === false) {
			return false ;
		}
		else {
			if ($pos + strlen ($search) == strlen ($str)) {
				return true ;
			}
		}
	
		return false ;
	}
	
	/**
	 * Permet de s'assurer qu'une chaine de caractère existe dans un texte. -1 indique que rien n'a été trouvé, sinon donne la position.
	 * @param string $str
	 * @param string $search
	 * @return number
	 */
	function contains ($str, $search) {
		$pos = strpos ($str, $search) ;
		if ($pos === false) {
			return -1 ;
		}
		else {
			return $pos ;
		}
	
		return -1 ;
	}
	
	////////////////////////////////////////////////////////////////////////////
		
	/**
	 * Permet de garder une certaine longueur ($limit) d'un texte et de rajouter des points de suspension : pour donner un aperçu
	 * @param string $str
	 * @param int $limit
	 * @return string
	 */
	function wrap ($str, $limit) {
		$len = strlen ($str) ;
		if ($len > $limit) {
			$str = substr ($str, 0, $limit).'...' ;
		}
		return $str ;
	}
	
	/**
	 * Permet de garder une certaine longueur ($limit) d'un texte
	 * @param string $str
	 * @param int $limit
	 * @return string
	 */
	function wrapNoPoint ($str, $limit) {
		$len = strlen ($str) ;
		if ($len > $limit) {
			$str = substr ($str, 0, $limit).'' ;
		}
		return $str ;
	}
	
	/**
	 * Permet de garder une certaine longueur ($limit) d'un texte en tenant compte de la largeur des lettres (en utilisant le tableau tabFontOpt du début)
	 * @param string $str
	 * @param int $limit
	 * @return string
	 */
	function wrapNoPointOpt ($str, $limit) {
		$cteMoy = 10 ;
	
		$len = strlen ($str) ;
	
		if ($limit > 0 && $len > 0) {
			$more = ($len * 0) / 100 ;
			$limit = $limit - ($more * $cteMoy) ;
		}
	
		$totalWidth = 0 ;
		$maxInd = -1 ;
		for ($i = 0 ; $i < $len ; ++$i) {
				
			$c = substr ($str, $i, 1) ;
			//$cInt = ord ($c) ;
	
			if (array_key_exists ($c, $this->tabFontOpt)) {
				$width = $this->tabFontOpt [ $c ] [ 'width' ] ;
			}
			else {
				$width = $cteMoy ;
			}
				
			if (($totalWidth + $width) <= $limit) {
				$totalWidth += $width ;
			}
			else {
				break ;
			}
			$maxInd = $i ;
		}
	
		if ($maxInd < $len) {
			if ($maxInd == -1) {
				$str = '' ;
			}
			else {
				$str = mb_substr ($str, 0, ($maxInd+1), 'UTF-8') ;
				//$str = substr ($str, 0, ($maxInd+1)) ;
			}
		}
	
		return $str ;
	}
	
	/**
	 * Permet de garder une certaine longueur ($limit) d'un texte en tenant compte de la largeur des lettres (en utilisant le tableau tabFontOpt du début)
	 * et en rajoutant des points de suspension à la fin pour donner un aperçu
	 * @param string $str
	 * @param int $limit
	 * @return string
	 */
	function wrapOpt ($str, $limit) {
		$strWrap = $this->wrapNoPointOpt ($str, $limit) ;
		
		if ($strWrap != $str) {
			$strWrap .= '...' ;
		}
		
		return  $strWrap ;
	}
		
	/**
	 * Passe un texte trop long en deux lignes et rajoute des points de suspension sur la deuxième ligne si elle trop longue elle aussi. 
	 * @param string $str
	 * @param int $limit
	 * @return string
	 */
	function wrapLine ($str, $limit) {
		$len = strlen ($str) ;
		if ($len > $limit) {
			$tmp1 = substr ($str, 0, $limit) ;
			$tmp2 = substr ($str, $limit) ;
			
			$len = strlen ($tmp2) ;
			if ($len > $limit) {
				$tmp2 = substr ($tmp2, 0, $limit).'...' ;
			}
			
			$str = $tmp1.'<br />'.$tmp2 ;
		}
		return $str ;
	}
		
	/**
	 * Permet de convertir la taille d'un fichier pris en octets en un autre format.
	 * Pour l'instant, le format retenu est le ko (certains documents ont une limite de taille) mais la fonction reste à compléter.
	 * 
	 * @param int $size
	 * @param string $format
	 * @return number
	 */
	function displaySize ($size, $format) {
		if ($format == 'ko') {
			return $size / 1000 ;
		}
	}
	
	/**
	 * Permet de remplacer les caractères accentuées en minuscules par les mêmes caractères accentués en majuscules
	 * @param string $str
	 * @return string
	 */
	function strUp ($str) {

		$str = mb_strtoupper ($str, 'UTF-8') ;
		
		return strtoupper ($str) ;
	}
	
	/**
	 * Fonction permettant de générer un texte alphanumérique aléatoire et unique
	 */
	function getRandomAlphaNumeric ($n) {
		$str = '' ;
		
		$ref = 'abcdefghijklmnopqrstuvwxyz0123456789' ;
		$len = strlen ($ref) ;
		
		for ($i = 0 ; $i < $n ; ++$i) {

			$pos = mt_rand (0, ($len - 1)) ;
			$c = substr ($ref, $pos, 1) ;
			
			$str = $str . $c ;
		}
		
		return $str ;
	}
	
	/**
	 * Permet de récupérer le nom de l'extension
	 * @param string $fileName
	 * @return string
	 */
	function getExtensionFromFileName ($fileName) {
		$pos = strrpos ($fileName, '.') ;
		if ($pos === false) {
			return '' ;
		}
		else {
			++ $pos ;
			return substr ($fileName, $pos, (strlen ($fileName) - $pos)) ;
		}
	}
	
	/**
	 * Crée un lien à partir d'une url
	 * */
	function createHyperlink ($text) {
		return preg_replace ('#https?://[a-z0-9._=\*/?&-]+#i', '<a href="$0" target="_blank">$0</a>', $text) ;
	}
	
	/**
	 * Convertit la date du format numérique anglais au format français
	 * @param string $dateEn
	 * @return string
	 */
	function convertDateEnToFr ($dateEn) {
		$dateFr = explode ('-', $dateEn) ;
				
		return $dateFr [ 2 ] . '/' . $dateFr [ 1 ] . '/' . $dateFr [ 0 ] ;
	}
	
	/**
	 * Met en majuscule le premier caractère de la string
	 * @param string $str
	 * @return string
	 */
	function firstCharToUpper ($str) {
		$strLen = strlen ($str) ;
		
		if ($strLen > 1) {
			$firstChar = substr ($str, 0, 1) ;
			
			$str = strtoupper ($firstChar) . substr ($str, 1, ($strLen - 1)) ;
		}
		else if ($strLen == 1) {
			$str = strtoupper ($str) ;
		}
		
		return $str ;
	}
}
?>