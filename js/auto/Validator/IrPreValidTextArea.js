
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



var preValidTextAreaCheckTabPrefixUniq = new Array () ;

function preValidTextAreaCheckFormat (inputId) {
	
	var selector = $('#'+inputId) ;
	
	var maxLength = selector.attr ('maxlength') ;
	
	if (maxLength > 0) {
		var str = selector.val () ;
		
		var nbChar = 0 ;
		
		var limit = 0 ;
		if (str != undefined) {
			limit = str.length ;
		}
		for (var i = 0 ; i < limit ; ++i) {
		
			var c = str.charCodeAt (i) ;
			
			if (c == 10) {
				nbChar = nbChar + 4 ;
			}
			else {
				++ nbChar ;
			}
		}
		
//		console.log ('preValidTextAreaCheckFormat str.length: '+str.length) ;
//		console.log ('preValidTextAreaCheckFormat nbChar: '+nbChar) ;
//		console.log ('preValidTextAreaCheckFormat maxLength: '+maxLength) ;
		
		if (nbChar > maxLength) {
//			console.log ('preValidTextAreaCheckFormat too long') ;
		
			var strOld = preValidTextAreaCheckTabPrefixUniq [ inputId ] ;
			preValidTextAreaCheckTabPrefixUniq [ inputId ] = strOld ;
			
			selector.attr ('valChanged', 'true') ;
			
			selector.val (strOld) ;
			
			return false ;
		}
		else {
			preValidTextAreaCheckTabPrefixUniq [ inputId ] = str ;
			
			return true ;
		}
	}
}
