
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */


var siteTabResize = ( typeof siteTabResize != 'undefined' && siteTabResize instanceof Array ) ? siteTabResize : new Array () ;

var siteTabNiceScroll = ( typeof siteTabNiceScroll != 'undefined' && siteTabNiceScroll instanceof Array ) ? siteTabNiceScroll : new Array () ;

var siteTabWindowResize = ( typeof siteTabWindowResize != 'undefined' && siteTabWindowResize instanceof Array ) ? siteTabWindowResize : new Array () ;

var siteTabResizeEventAllPrefixUniq = ( typeof siteTabResizeEventAllPrefixUniq != 'undefined' && siteTabResizeEventAllPrefixUniq instanceof Array ) ? siteTabResizeEventAllPrefixUniq : new Array () ;
var siteTabResizeEventAllPrefixUniqInc = 0 ;

var siteTabResizeEventAllLevelLastPrefixUniq = ( typeof siteTabResizeEventAllLevelLastPrefixUniq != 'undefined' && siteTabResizeEventAllLevelLastPrefixUniq instanceof Array ) ? siteTabResizeEventAllLevelLastPrefixUniq : new Array () ;
var siteTabResizeEventAllLevelLastPrefixUniqInc = 0 ;

var siteCtrlKeyIsPress = false ;
var siteWindowHasUnload = false ;

var siteIdleTimeout = 30 ;
var siteIdleSecondsCounter = 0 ;


$(function() {
	
	$(window).unload (function () {
		siteWindowHasUnload = true ;
		console.log ('siteWindowHasUnload') ;
	}) ;
	
	siteTabNiceScroll = new Array () ;
	
	siteTabWindowResize = new Array () ;
	siteTabWindowResize [ 'timeoutInc' ] = 0 ;
	siteTabWindowResize [ 'timeoutMutex' ] = false ;
	siteTabWindowResize [ 'timeoutMutexIdInc' ] = 0 ;
	
	
	siteTabResize = new Array () ;
	siteTabResize [ 'timeoutInc' ] = 0 ;
	siteTabResize [ 'timeoutMutex' ] = false ;
	siteTabResize [ 'timeoutMutexIdInc' ] = 0 ;
	
	$(window).resize (function() {
//		console.log ('resize now: '+$.now ()) ;
//		console.log ('window resize: '+$(window).width ()) ;
		
		siteWindowResizeWithTimer (50) ;
	});
	
	$(window).scroll (function() {
		siteResizeAll () ;
		
		siteAddNiceScrollToMemoryRefresh () ;
	});
	
	// CALL EXTERN FUNCTION
	if (typeof indexSkinCallInit !== 'undefined' && $.isFunction (indexSkinCallInit)) {
		indexSkinCallInit () ;
	}
	
	siteResizeAll () ;
	
	$(window).keydown (function(event) {
		
		console.log ('click keydown ctrlKey: '+event.ctrlKey+' : '+siteCtrlKeyIsPress) ;
		
		if (event.ctrlKey) {
			siteCtrlKeyIsPress = true ;
		}
	});
	
	$(window).keyup (function(event) {
		
		console.log ('click keyup ctrlKey: '+event.ctrlKey+' : '+siteCtrlKeyIsPress) ;
		
		siteCtrlKeyIsPress = false ;
	});
	
	$(window).mousemove (function(event) {
		
		if (event.ctrlKey == false) {
			siteCtrlKeyIsPress = false ;
		}
		
		siteIdleSecondsCounter = 0;
	});
	
	$(window).keypress (function(event) {
		
		siteIdleSecondsCounter = 0;
	});
	
	$(window).click (function(event) {
	
		siteIdleSecondsCounter = 0;
	});
	
	window.setInterval (siteWindowCheckIdleTimeLoop, 1000) ;
});

function siteWindowCheckIdleTimeLoop () {
	++siteIdleSecondsCounter ;
}

function siteWindowCheckIdleTime () {
	
	if (siteIdleSecondsCounter >= siteIdleTimeout) {
		return true ;
	}
	
	return false ;
}

function siteWindowResizeTimeout (timeoutIncArg) {
	
	var timeoutInc = siteTabWindowResize [ 'timeoutInc' ] ;
	
	var displayDebug = false ;
	
	if (displayDebug) {
		console.log ('siteWindowResizeTimeout timeoutIncArg: '+timeoutIncArg) ;
	}
	
	if (timeoutIncArg >= timeoutInc) {
		
		if (siteTabWindowResize [ 'timeoutMutex' ] == false) {
			siteTabWindowResize [ 'timeoutMutex' ] = true ;
			siteTabWindowResize [ 'timeoutMutexIdInc' ] = timeoutInc ;
			
			if (displayDebug) {
				console.log ('siteWindowResizeTimeout OK timeoutIncArg: '+timeoutIncArg) ;
			}
			
			siteWindowResize () ;
			
			siteTabWindowResize [ 'timeoutMutex' ] = false ;
			siteTabWindowResize [ 'timeoutMutexIdInc' ] = 0 ;
		}
		else {
			if (siteTabWindowResize [ 'timeoutMutexIdInc' ] < timeoutInc) {
				siteWindowResizeWithTimer (200) ;
			}
		}
	}
	
}

function siteWindowResizeWithTimer (timer) {
	var displayDebug = false ;
	
	if (displayDebug) {
		console.log ('siteWindowResizeWithTimer timer: '+timer) ;
	}
	
	++ siteTabWindowResize [ 'timeoutInc' ] ;
	
	var timeoutInc = siteTabWindowResize [ 'timeoutInc' ] ;
	
	setTimeout ('siteWindowResizeTimeout ('+timeoutInc+') ;', timer) ;
}

function siteWindowResize () {
//	console.log ('window resize siteWindowResize: '+$(window).width ()) ;
	
	siteResizeAll () ;
	
	resizeEventOther () ;
	resizeEventLevelLastOther () ;
	
	siteAddNiceScrollToMemoryRefresh () ;
}

function siteAddNiceScrollToMemory (id, objNiceScroll) {
	siteTabNiceScroll.push([id,objNiceScroll]) ;
}

function siteAddNiceScrollToMemoryRefresh () {

	siteTabNiceScroll.forEach(function (obj) {
		obj[1].resize () ;
	});
}

function siteResizeAllAndResize () {
	
	siteResizeAll () ;
	
	resizeEventOther () ;
	resizeEventLevelLastOther () ;
	
	siteAddNiceScrollToMemoryRefresh () ;
}

function resizeEventOtherAdd (prefixUniq, nameFunction) {
	siteTabResizeEventAllPrefixUniq [ siteTabResizeEventAllPrefixUniqInc ] = new Array () ;
	
	siteTabResizeEventAllPrefixUniq [ siteTabResizeEventAllPrefixUniqInc ] [ 'prefixUniq' ] = prefixUniq ;
	siteTabResizeEventAllPrefixUniq [ siteTabResizeEventAllPrefixUniqInc ] [ 'nameFunction' ] = nameFunction ;
	++ siteTabResizeEventAllPrefixUniqInc ;
}

function resizeEventOther () {
	for (var i = 0 ; i < siteTabResizeEventAllPrefixUniq.length ; ++i) {
		var prefixUniq = siteTabResizeEventAllPrefixUniq [ i ] [ 'prefixUniq' ] ;
		var nameFunction = siteTabResizeEventAllPrefixUniq [ i ] [ 'nameFunction' ] ;
		
		setTimeout (nameFunction+' (\''+prefixUniq+'\') ;', 150) ;
	}
	
//	for (var i = 0 ; i < siteTabResizeEventAllPrefixUniq.length ; ++i) {
//		var prefixUniq = siteTabResizeEventAllPrefixUniq [ i ] [ 'prefixUniq' ] ;
//		var nameFunction = siteTabResizeEventAllPrefixUniq [ i ] [ 'nameFunction' ] ;
//		
//		setTimeout (nameFunction+' (\''+prefixUniq+'\') ;', 300) ;
//	}
}

function resizeEventLevelLastOtherAdd (prefixUniq, nameFunction) {
	siteTabResizeEventAllLevelLastPrefixUniq [ siteTabResizeEventAllLevelLastPrefixUniqInc ] = new Array () ;
	
	siteTabResizeEventAllLevelLastPrefixUniq [ siteTabResizeEventAllLevelLastPrefixUniqInc ] [ 'prefixUniq' ] = prefixUniq ;
	siteTabResizeEventAllLevelLastPrefixUniq [ siteTabResizeEventAllLevelLastPrefixUniqInc ] [ 'nameFunction' ] = nameFunction ;
	++ siteTabResizeEventAllLevelLastPrefixUniqInc ;
}

function resizeEventLevelLastOther () {
	for (var i = 0 ; i < siteTabResizeEventAllLevelLastPrefixUniq.length ; ++i) {
		var prefixUniq = siteTabResizeEventAllLevelLastPrefixUniq [ i ] [ 'prefixUniq' ] ;
		var nameFunction = siteTabResizeEventAllLevelLastPrefixUniq [ i ] [ 'nameFunction' ] ;
		
		setTimeout (nameFunction+' (\''+prefixUniq+'\') ;', 1000) ;
	}
	
	for (var i = 0 ; i < siteTabResizeEventAllLevelLastPrefixUniq.length ; ++i) {
		var prefixUniq = siteTabResizeEventAllLevelLastPrefixUniq [ i ] [ 'prefixUniq' ] ;
		var nameFunction = siteTabResizeEventAllLevelLastPrefixUniq [ i ] [ 'nameFunction' ] ;
		
		setTimeout (nameFunction+' (\''+prefixUniq+'\') ;', 1200) ;
	}
	
	for (var i = 0 ; i < siteTabResizeEventAllLevelLastPrefixUniq.length ; ++i) {
		var prefixUniq = siteTabResizeEventAllLevelLastPrefixUniq [ i ] [ 'prefixUniq' ] ;
		var nameFunction = siteTabResizeEventAllLevelLastPrefixUniq [ i ] [ 'nameFunction' ] ;
		
		setTimeout (nameFunction+' (\''+prefixUniq+'\') ;', 2000) ;
	}
	
	for (var i = 0 ; i < siteTabResizeEventAllLevelLastPrefixUniq.length ; ++i) {
		var prefixUniq = siteTabResizeEventAllLevelLastPrefixUniq [ i ] [ 'prefixUniq' ] ;
		var nameFunction = siteTabResizeEventAllLevelLastPrefixUniq [ i ] [ 'nameFunction' ] ;
		
		setTimeout (nameFunction+' (\''+prefixUniq+'\') ;', 10000) ;
	}
	
//	for (var i = 0 ; i < siteTabResizeEventAllLevelLastPrefixUniq.length ; ++i) {
//		var prefixUniq = siteTabResizeEventAllLevelLastPrefixUniq [ i ] [ 'prefixUniq' ] ;
//		var nameFunction = siteTabResizeEventAllLevelLastPrefixUniq [ i ] [ 'nameFunction' ] ;
//		
//		setTimeout (nameFunction+' (\''+prefixUniq+'\') ;', 1000+300) ;
//	}
}

function siteResizeAll () {
	siteResizeAllWithTimer (10) ;
}

function siteResizeAllWithTimer (timer) {
	
	var timeoutInc = siteTabResize [ 'timeoutInc' ] ;
	++timeoutInc ;
	siteTabResize [ 'timeoutInc' ] = timeoutInc ;
	
	// ordre important parce que height peut mettre une scrollbar qui modifie la largeur puis la largeur évolue sur la hauteur !
	setTimeout ('siteResizeAllTimeout ('+timeoutInc+') ;', timer) ;
}

function siteResizeAllTimeout (timeoutIncArg) {
	
	var timeoutInc = siteTabResize [ 'timeoutInc' ] ;
	
	if (timeoutIncArg >= timeoutInc) {
		
		if (siteTabResize [ 'timeoutMutex' ] == false) {
			siteTabResize [ 'timeoutMutex' ] = true ;
			siteTabResize [ 'timeoutMutexIdInc' ] = timeoutInc ;
			
			siteResizeAllProgress () ;
			
			siteTabResize [ 'timeoutMutex' ] = false ;
			siteTabResize [ 'timeoutMutexIdInc' ] = 0 ;
			
			siteTotalWidthResizeBeforeFinalNoMoreResize () ;
			
			setTimeout ('siteTotalWidthResizeFinalNoMoreResize () ;', 100) ;
			setTimeout ('siteTotalWidthResizeFinalNoMoreResize () ;', 200) ;
			setTimeout ('siteTotalWidthResizeFinalNoMoreResize () ;', 500) ;
		}
		else {
			if (siteTabResize [ 'timeoutMutexIdInc' ] < timeoutInc) {
				siteResizeAllWithTimer (500) ;
			}
		}
	}
}

function siteResizeAllProgress () {
	// CALL EXTERN FUNCTION
	if (typeof indexSkinCallResizeAllProgress !== 'undefined' && $.isFunction (indexSkinCallResizeAllProgress)) {
		indexSkinCallResizeAllProgress () ;
	}
}

function siteTotalWidthResizeBeforeFinalNoMoreResize () {
	// CALL EXTERN FUNCTION
	if (typeof indexSkinCallTotalWidthResizeBeforeFinalNoMoreResize !== 'undefined' && $.isFunction (indexSkinCallTotalWidthResizeBeforeFinalNoMoreResize)) {
		indexSkinCallTotalWidthResizeBeforeFinalNoMoreResize () ;
	}
}

function siteTotalWidthResizeFinalNoMoreResize () {
	// CALL EXTERN FUNCTION
	if (typeof indexSkinCallTotalWidthResizeFinalNoMoreResize !== 'undefined' && $.isFunction (indexSkinCallTotalWidthResizeFinalNoMoreResize)) {
		indexSkinCallTotalWidthResizeFinalNoMoreResize () ;
	}
}
