
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */

var htmlInfoTabPrefixUniq = ( typeof htmlInfoTabPrefixUniq != 'undefined' && htmlInfoTabPrefixUniq instanceof Array ) ? htmlInfoTabPrefixUniq : new Array () ;

var responsiveRefreshTab = new Array () ;


var htmlInfoGlobal = ( typeof htmlInfoGlobal != 'undefined' && htmlInfoGlobal instanceof Array ) ? htmlInfoGlobal : new Array () ;

function htmlInfoInit (prefixUniq, prefixCss) {
	
	htmlInfoTabPrefixUniq [ prefixUniq ] = new Array () ;
	htmlInfoTabPrefixUniq [ prefixUniq ] [ 'prefixCss' ] = prefixCss ;
	
	htmlInfoResponsiveInit (prefixUniq, prefixCss) ;
}

function htmlInfoResponsiveInit (prefixUniq, prefixCss) {
	var tabWidth = new Array () ;
	var i = 0 ;
	
	tabWidth [ i ] = '480' ; ++i ;
	tabWidth [ i ] = '600' ; ++i ;
	tabWidth [ i ] = '840' ; ++i ;
	tabWidth [ i ] = '960' ; ++i ;
	tabWidth [ i ] = '1280' ; ++i ;
	tabWidth [ i ] = '1440' ; ++i ;
	
	var prefixCssAdd = '_htmlInfoBox' ;
	
	///////////////////////////
	
	responsiveRefreshTab [ prefixUniq ] = new Array () ;
	responsiveRefreshTab [ prefixUniq ] [ 'timeoutInc' ] = 0 ;
	responsiveRefreshTab [ prefixUniq ] [ 'timeoutMutex' ] = false ;
	responsiveRefreshTab [ prefixUniq ] [ 'timeoutMutexIdInc' ] = 0 ;
	responsiveRefreshTab [ prefixUniq ] [ 'tabWidth' ] = tabWidth ;
	responsiveRefreshTab [ prefixUniq ] [ 'refCss' ] = prefixCss + prefixCssAdd ;
	responsiveRefreshTab [ prefixUniq ] [ 'fatherId' ] = 'htmlInfoBox_'+prefixUniq ;
	
	resizeEventOtherAdd (prefixUniq, 'htmlInfoResponsiveRefresh') ;
	
	setTimeout ('htmlInfoResponsiveRefresh (\''+prefixUniq+'\') ;', 150) ;
	setTimeout ('htmlInfoResponsiveRefresh (\''+prefixUniq+'\') ;', 500) ;
	setTimeout ('htmlInfoResponsiveRefresh (\''+prefixUniq+'\') ;', 1000) ;
}

function htmlInfoResponsiveRefresh (prefixUniq) {
	
	console.log ('htmlInfoResponsiveRefresh'+prefixUniq) ;
	
	
	responsiveRefreshWithTimer (10, prefixUniq, $('#htmlInfoBox_'+prefixUniq).width ()) ;
}

