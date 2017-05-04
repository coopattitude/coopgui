<?php

include ('site/ClassLoader.php') ;

class IrIndex {
	
	var $irCommander ;
	
	var $irEnvCustom ;
	var $irGenCss ;
	var $irGenJs ;
	
	var $display ;
	
	function __construct () {
		
		$this->display [] = '' ;
		
		$this->irCommander = new \IrCommander ($this->irCommander) ;
		$this->irEnvCustom = new \IrSystemEnvCustom ($this->irCommander) ;
		$this->irGenCss = new \IrSystemGenCss ($this->irCommander, $this->irEnvCustom) ;
		$this->irGenJs = new \IrSystemGenJs ($this->irCommander, $this->irEnvCustom) ;
	}
	
	function init () {
		$this->head () ;
		
		$script = '<script type="text/javascript">$(function() {' ;
		
		$script .= 'setTimeout (\'siteResizeAllAndResize () ;\', 1) ;' ;
		$script .= 'setTimeout (\'siteResizeAllAndResize () ;\', 100) ;' ;
		$script .= 'setTimeout (\'siteResizeAllAndResize () ;\', 1000) ;' ;
		$script .= 'setTimeout (\'siteResizeAllAndResize () ;\', 2000) ;' ;
		$script .= 'setTimeout (\'siteResizeAllAndResize () ;\', 5000) ;' ;
		$script .= 'setTimeout (\'siteResizeAllAndResize () ;\', 10000) ;' ;
		
		$script .= '});</script>' ;
		
		$this->display [] = $script ;
		
		$this->display [] = '<body>' ;
		
		$irHtmlInfo = new \IrHtmlInfo ($this->irCommander, $this->irGenCss) ;
		$this->display [] = $irHtmlInfo->toHtml () ;
		
		$this->display [] = '</body>' ;
		$this->display [] = '</html>' ;
		
		echo (implode ('', $this->display)) ;
	}
	
	function head () {
		$pageTitle = 'CooPGUI' ;
		
		$this->display [] = '<!DOCTYPE html>
		
		<html lang="fr">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">' ;
		
		$this->display [] = '<meta name="viewport" content="width=device-width, initial-scale=1.0">' ;
		
		$this->display [] = '<title>'.$pageTitle.'</title>' ;
		
		$this->display [] = '<link rel="stylesheet" type="text/css" href="css/jquery/custom-theme/jquery-ui-1.10.3.custom.min.css" />' ;
		
		$this->display [] = '<script type="text/javascript" src="js/base64.js"  ></script>' ;
		
		$this->display [] = '<script type="text/javascript" src="js/jquery/jquery-2.0.3.min.js"></script>' ;
		$this->display [] = '<script type="text/javascript" src="js/jquery/jquery-ui-1.10.3.custom.min.js"></script>' ;
		$this->display [] = '<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.js"></script>' ;
		$this->display [] = '<script type="text/javascript" src="js/nicescroll/jquery.nicescroll.min.js"></script>' ;
		$this->display [] = '<script type="text/javascript" src="js/slides/jquery.slides.min.js"></script>' ;
		
		$this->display [] = '<link rel="stylesheet" type="text/css" href="css/static/index.css" />' ;
		$this->display [] = '<link rel="stylesheet" type="text/css" href="css/static/fontRoboto.css" />' ;
		
		$this->display [] = '<link rel="stylesheet" type="text/css" href="css/static/indexMain.css" />' ;
		
		{
			$linkCss = $this->irGenCss->initCss () ;
			$this->display [] = $linkCss ;

			$linkJs = $this->irGenJs->initJs () ;
			$this->display [] = $linkJs ;
		}
		
		$this->display [] = '</head>' ;
	}
}

$irIndex = new IrIndex () ;
$irIndex->init () ;

?>