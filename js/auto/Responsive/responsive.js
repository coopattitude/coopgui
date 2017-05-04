
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



function responsiveRefreshWithTimer (timer, prefixUniq, width) {
	
	//console.log ('start: '+timer+' width: '+width) ;
	var displayDebug = false ;
	
	if (displayDebug) {
		console.log ('responsiveRefreshWithTimer timer: '+timer) ;
		console.log ('responsiveRefreshWithTimer prefixUniq: '+prefixUniq) ;
		console.log ('responsiveRefreshWithTimer width: '+width) ;
	}
	
//	var timeoutInc = responsiveRefreshTab [ prefixUniq ] [ 'timeoutInc' ] ;
//	++timeoutInc ;
//	responsiveRefreshTab [ prefixUniq ] [ 'timeoutInc' ] = timeoutInc ;
	
	++ responsiveRefreshTab [ prefixUniq ] [ 'timeoutInc' ] ;
	
	var timeoutInc = responsiveRefreshTab [ prefixUniq ] [ 'timeoutInc' ] ;
	
	setTimeout ('responsiveRefreshTimeout ('+timeoutInc+', \''+prefixUniq+'\', '+width+') ;', timer) ;
}

function responsiveRefreshTimeout (timeoutIncArg, prefixUniq, width) {
	
	var timeoutInc = responsiveRefreshTab [ prefixUniq ] [ 'timeoutInc' ] ;
	
	var displayDebug = false ;
	
	if (displayDebug) {
		console.log ('responsiveRefreshTimeout timeoutIncArg: '+timeoutIncArg) ;
		console.log ('responsiveRefreshTimeout prefixUniq: '+prefixUniq) ;
		console.log ('responsiveRefreshTimeout width: '+width) ;
	}
	
	if (timeoutIncArg >= timeoutInc) {
		
		if (responsiveRefreshTab [ prefixUniq ] [ 'timeoutMutex' ] == false) {
			responsiveRefreshTab [ prefixUniq ] [ 'timeoutMutex' ] = true ;
			responsiveRefreshTab [ prefixUniq ] [ 'timeoutMutexIdInc' ] = timeoutInc ;
			
			if (displayDebug) {
				console.log ('responsiveRefreshTimeout OK timeoutIncArg: '+timeoutIncArg) ;
				console.log ('responsiveRefreshTimeout OK prefixUniq: '+prefixUniq) ;
				console.log ('responsiveRefreshTimeout OK width: '+width) ;
			}
			
			responsiveRefresh (prefixUniq, width) ;
			
			responsiveRefreshTab [ prefixUniq ] [ 'timeoutMutex' ] = false ;
			responsiveRefreshTab [ prefixUniq ] [ 'timeoutMutexIdInc' ] = 0 ;
		}
		else {
			if (responsiveRefreshTab [ prefixUniq ] [ 'timeoutMutexIdInc' ] < timeoutInc) {
				responsiveRefreshWithTimer (500, prefixUniq, width) ;
			}
		}
	}
	
}

function responsiveRefresh (prefixUniq, width) {
	var displayDebug = false ;
	
	var tabWidth = responsiveRefreshTab [ prefixUniq ] [ 'tabWidth' ] ;
	var refCss = responsiveRefreshTab [ prefixUniq ] [ 'refCss' ] ;
	var fatherId = responsiveRefreshTab [ prefixUniq ] [ 'fatherId' ] ;
	
	var responsivePrefix = getResponsivePrefix (prefixUniq, width) ;
	
	if (displayDebug) {
		console.log ('responsiveRefresh prefixUniq: '+prefixUniq) ;
		console.log ('responsivePrefix: '+responsivePrefix) ;
		console.log ('length: '+tabWidth.length) ;
		console.log ('refCss: '+refCss) ;
		console.log ('fatherId: '+fatherId) ;
		
		console.debug (tabWidth) ;
	}

	if (tabWidth.length > 0) {
		var tabIdOldClass = new Array () ;
		var tabIdNewClass = new Array () ;
		var indI = 0 ;
		
		$("#"+fatherId+" [class^='"+refCss+"']").each (function () {
			var theClass = $(this).attr ('class') ;
//			console.log ('inside the fct') ;
			var theClass2 = theClass ;
			
			if (displayDebug) {
				console.log ('theClass: '+theClass) ;
			}
			
			var pos = theClass.indexOf (refCss) ;
			if (pos == 0) {
				pos = pos + refCss.length ;
				theClass = theClass.substring (pos) ;
			}
			
			if (displayDebug) {
				console.log ('theClass sans refCss: '+theClass) ;
			}
			
			pos = theClass.indexOf ('_r_') ;
			if (pos != -1) {
				theClass = theClass.substring (0, pos) ;
				
				if (displayDebug) {
					console.log ('theClass sans r_: '+theClass) ;
				}
			}
			
			var newClass = refCss + theClass + responsivePrefix ;
			
			if (displayDebug) {
				console.log ('newClass: '+newClass) ;
			}
			
			tabIdOldClass [ indI ] = theClass2 ;
			tabIdNewClass [ indI ] = newClass ;
			++ indI ;
		}) ;
		
		for (var i = 0 ; i < tabIdOldClass.length ; ++i) {
			var oldClass = tabIdOldClass [ i ] ;
			var newClass = tabIdNewClass [ i ] ;
		
			if (displayDebug) {
				console.log ('oldClass: '+oldClass) ;
				console.log ('newClass: '+newClass) ;
			}
			
			$("#"+fatherId+" ."+oldClass).attr ('class', newClass) ;
		}
	}
}

function getResponsivePrefix (prefixUniq, width) {
	var tabWidth = responsiveRefreshTab [ prefixUniq ] [ 'tabWidth' ] ;
	
	var responsivePrefix = '_r_' ;
	
	var widthTmp = 0 ;
	
//	console.log ('width: '+width) ;
	
	for (var i = 0 ; i < tabWidth.length ; ++i) {
		if (width >= tabWidth [ i ]) {
			widthTmp = tabWidth [ i ] ;
		}
	}
	
	if (widthTmp == 0) {
		return '' ;
	}
	
	responsivePrefix = responsivePrefix + widthTmp ;
	
//	console.log ('responsivePrefix: '+responsivePrefix) ;
	
	return responsivePrefix ;
}
