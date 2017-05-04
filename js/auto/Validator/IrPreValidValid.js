
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



function preValidAddEventInputText (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) {
	
//	console.debug('dk101 : preValidAddEventInputText selector : '+selector);
//	console.debug('dk101 : preValidAddEventInputText format : '+format);
	
	$(selector).change (function () {
//		console.debug('dk101 : preValidAddEventInputText change, selector: '+selector);
//		console.debug('dk101 : preValidAddEventInputText change, format: '+format);
		
		preValidValidInputTextFull (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) ;
	}) ;
	
	$(selector).keyup (function () {
//		console.debug('dk101 : keyup preValidAddEventInputText change, selector: '+selector);
//		console.debug('dk101 : keyup preValidAddEventInputText change, format: '+format);
		
		preValidValidInputText (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) ;
	}) ;
	
	$(selector).bind ('paste', function () {
		preValidValidInputText (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) ;
	}) ;
}

// lorsque l'on sort du champ, ajoute des vérifications !
function preValidValidInputTextFull (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) {
	console.debug("dk 120  preValidValidInputText "+selector);
	console.debug("dk 120  preValidValidInputText empty "+empty);
	
	var hasVerified = $(selector).attr ('hasVerified') ;
	
	if (hasVerified != 'false') {
		var value = $(selector).val () ;
		
		if (value == '' && empty == 'forbidden') {
			console.log ('ERROR EMPTY') ;
			preValidUtilShowError (prefixUniq, selector, 'empty', '', '') ;
			return true ;
		}
		else if (value == '' && empty == 'authorized') {
			console.debug ('pas necessaire de verifier') ;
			preValidUtilHideError (prefixUniq, selector) ;
			return false ;
		}
		
		else if (preValidUtilLengthMin (value, lenghtMin) == false) {
			console.log ('ERROR lenghtMin') ;
			preValidUtilShowError (prefixUniq, selector, 'lenghtMin', lenghtMin, '') ;
			return true ;
		}
		else if (preValidUtilLengthMax (value, lenghtMax) == false) {
			console.log ('ERROR lenghtMax') ;
			preValidUtilShowError (prefixUniq, selector, 'lenghtMax', lenghtMax, '') ;
			return true ;
		}
		else if (preValidValidFormat (value, format) == false) {
			console.log ('ERROR format') ;
			preValidUtilShowError (prefixUniq, selector, format, '', '') ;
			return true ;
		}
		
		if (format == 'formatMail') {
			if (irPrevalidValidCheckFormatMailCheckArob (value, format) == false) {
				console.log ('ERROR format') ;
				preValidUtilShowError (prefixUniq, selector, format, '', '') ;
				return true ;
			}
		}
		
		preValidUtilHideError (prefixUniq, selector) ;
		return false ;
	}
	
	return false ;
}

function preValidValidInputText (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) {
	console.debug("dk 120  preValidValidInputText "+selector);
	console.debug("dk 120  preValidValidInputText empty "+empty);
	
	var hasVerified = $(selector).attr ('hasVerified') ;
	
	if (hasVerified != 'false') {
		var value = $(selector).val () ;
		
		if (value == '' && empty == 'forbidden') {
			console.log ('ERROR EMPTY') ;
			preValidUtilShowError (prefixUniq, selector, 'empty', '', '') ;
			return true ;
		}
		else if (value == '' && empty == 'authorized') {
			console.debug ('pas necessaire de verifier') ;
			preValidUtilHideError (prefixUniq, selector) ;
			return false ;
		}
		
		else if (preValidUtilLengthMin (value, lenghtMin) == false) {
			console.log ('ERROR lenghtMin') ;
			preValidUtilShowError (prefixUniq, selector, 'lenghtMin', lenghtMin, '') ;
			return true ;
		}
		else if (preValidUtilLengthMax (value, lenghtMax) == false) {
			console.log ('ERROR lenghtMax') ;
			preValidUtilShowError (prefixUniq, selector, 'lenghtMax', lenghtMax, '') ;
			return true ;
		}
		else if (preValidValidFormat (value, format) == false) {
			console.log ('ERROR format') ;
			preValidUtilShowError (prefixUniq, selector, format, '', '') ;
			return true ;
		}
		
		preValidUtilHideError (prefixUniq, selector) ;
		return false ;
	}

	return false ;
}

function preValidAddEventInputHidden (prefixUniq, selectorControl, selectorAff, empty, trad) {
	$(selectorAff).change (function () {
		preValidValidInputHidden (prefixUniq, selectorControl, selectorAff, empty, trad) ;
	}) ;
}

function preValidValidInputHidden (prefixUniq, selectorControl, selectorAff, empty, trad) {
	var hasVerified = $(selectorControl).attr ('hasVerified') ;
	
	if (hasVerified != 'false') {
		var value = $(selectorControl).val () ;
		
		if (value == '' && empty == 'forbidden') {
			preValidUtilShowError (prefixUniq, selectorAff, 'empty', '', trad) ;
			return true ;
		}
		
		preValidUtilHideError (prefixUniq, selectorAff) ;
		return false ;
	}

	return false ;
}

function preValidAddEventInputPassword (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) {
	$(selector).change (function () {
		preValidValidInputPassword (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) ;
	}) ;
}

function preValidValidInputPassword (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) {
	var hasVerified = $(selector).attr ('hasVerified') ;
	
	if (hasVerified != 'false') {		
		var value = $(selector).val () ;
		
		if (value == '' && empty == 'forbidden') {
			preValidUtilShowError (prefixUniq, selector, 'empty', '', '') ;
			return true ;
		}
		else if (preValidUtilLengthMin (value, lenghtMin) == false) {
			preValidUtilShowError (prefixUniq, selector, 'lenghtMin', lenghtMin, '') ;
			return true ;
		}
		else if (preValidUtilLengthMax (value, lenghtMax) == false) {
			preValidUtilShowError (prefixUniq, selector, 'lenghtMax', lenghtMax, '') ;
			return true ;
		}
		else if (preValidValidFormat (value, format) == false) {
			preValidUtilShowError (prefixUniq, selector, format, '', '') ;
			return true ;
		}
		
		preValidUtilHideError (prefixUniq, selector) ;
		return false ;
	}
	
	return false ;
}

function preValidAddEventInputCheckbox (prefixUniq, selector) {
	$(selector).change (function () {
		preValidValidInputPassword (prefixUniq, selector) ;
	}) ;
}

function preValidValidInputCheckbox (prefixUniq, selector) {
	var hasVerified = $(selector).attr ('hasVerified') ;
	
	if (hasVerified != 'false') {		
		var isChecked = $(selector).prop ('checked') ;
		
		if (isChecked == false) {
			preValidUtilShowError (prefixUniq, selector, 'isChecked', '', '') ;
			return true ;
		}
		
		preValidUtilHideError (prefixUniq, selector) ;
		return false ;
	}

	return false ;
}

function preValidAddEventTextArea (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) {
	
	var inputId = $(selector).attr ('id') ;
	
	if (inputId != undefined && inputId != '') {
		preValidTextAreaCheckFormat (inputId) ; // init cache to display old value if error
	}
	
	$(selector).change (function () {
		preValidValidTextArea (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) ;
	}) ;
	
	$(selector).keyup (function () {
		preValidValidTextArea (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) ;
	}) ;
	
	$(selector).bind ('paste', function () {
		preValidValidTextArea (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) ;
	}) ;
}

function preValidValidTextArea (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) {	
	var hasVerified = $(selector).attr ('hasVerified') ;
	
	if (hasVerified != 'false') {
		var value = $(selector).val () ;
		var inputId = $(selector).attr ('id') ;
		
		if (value == '' && empty == 'forbidden') {
			preValidUtilTextAreaShowError (prefixUniq, selector, 'empty', '', '') ;
			return true ;
		}
		else if (preValidUtilLengthMin (value, lenghtMin) == false) {
			preValidUtilTextAreaShowError (prefixUniq, selector, 'lenghtMin', lenghtMin, '') ;
			return true ;
		}
		else if (preValidUtilLengthMax (value, lenghtMax) == false) {
			preValidUtilTextAreaShowError (prefixUniq, selector, 'lenghtMax', lenghtMax, '') ;
			return true ;
		}
		else if (preValidValidFormat (value, format) == false) {
			preValidUtilTextAreaShowError (prefixUniq, selector, format, '', '') ;
			return true ;
		}
		else if (inputId != undefined && inputId != '' && (preValidTextAreaCheckFormat (inputId) == false)) {
			preValidUtilTextAreaShowError (prefixUniq, selector, 'lenghtMax', '', '') ;
			return true ;
		}
		
//		console.log ('preValidUtilTextAreaHideError aaa'+format) ;
		
		if ($(selector).attr ('valChanged') == 'true') {
			$(selector).attr ('valChanged', '') ;
		}
		else {
			preValidUtilTextAreaHideError (prefixUniq, selector) ;
		}
		
		return false ;
	}
	
	return false ;
}

function preValidAddEventEmptyAndEmpty (prefixUniq, selector1, selector2) {
	$(selector1).change (function () {
		preValidValidEmptyAndEmpty (prefixUniq, selector1, selector2) ;
	}) ;

	$(selector2).change (function () {
		preValidValidEmptyAndEmpty (prefixUniq, selector1, selector2) ;
	}) ;	
}

function preValidValidEmptyAndEmpty (prefixUniq, selector1, selector2) {
	var hasVerified1 = $(selector1).attr ('hasVerified') ;
	var hasVerified2 = $(selector2).attr ('hasVerified') ;
	
	if (hasVerified1 != 'false' && hasVerified2 != 'false') {		
		var value1 = $(selector1).val () ;
		var value2 = $(selector2).val () ;
		
		if (value1 == '' && value2 == '') {
			preValidUtilShowError (prefixUniq, selector1, 'emptyAndEmpty', '', '') ;
			preValidUtilShowError (prefixUniq, selector2, 'emptyAndEmpty', '', '') ;
			return true ;
		}
		
		preValidUtilHideError (prefixUniq, selector1) ;
		preValidUtilHideError (prefixUniq, selector2) ;
		return false ;
	}
	
	return false ;
}

function preValidValidDateBeginBeforeDateEnd (prefixUniq, idForm, nameDateBegin, nameTimeBegin, nameDateEnd, nameTimeEnd) {
	var dateBegin = $('#'+idForm+' input[name="'+nameDateBegin+'"]').val () ;
	var timeBegin = $('#'+idForm+' input[name="'+nameTimeBegin+'"]').val () ;
	var dateEnd = $('#'+idForm+' input[name="'+nameDateEnd+'"]').val () ;
	var timeEnd = $('#'+idForm+' input[name="'+nameTimeEnd+'"]').val () ;
	
	if (preValidUtilCheckDateBeginBeforeDateEnd (dateBegin, timeBegin, dateEnd, timeEnd) == false) {
		
		var tab = preValidTabPrefixUniq [ prefixUniq ] ;
		
		alert (tab [ 'tabTrad' ] [ 'dateBeginBeforeDateEnd' ]) ;
		return true ;
	}
	
	return false ;
	
}
