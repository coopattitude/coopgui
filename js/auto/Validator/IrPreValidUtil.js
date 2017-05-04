
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



function preValidUtilShowError (prefixUniq, selector, key, replace, trad) {

	var tab = preValidTabPrefixUniq [ prefixUniq ] ;
	
	var text = '' ;

	if (trad != '') {
		text = trad ;
	}
	else {
//		console.log ('key: '+key) ;
		
		text = tab [ 'tabTrad' ] [ key ] ;

		console.log ('text: '+text) ;
//		console.debug (tab) ;
		
		if (text == undefined) {
			text = '' ;
		}
		else {
			text = text.replace ('[LENGHTMIN]', replace);
			text = text.replace ('[LENGHTMAX]', replace);
		}
	}
//	console.log ('text2: '+text) ;
	//	$(selector).attr ('title', text) ;
	//	$(selector).val($(selector).val() + '!');
	//	$(selector).tooltip () ;
	//	$(selector).tooltip ('option', 'content', text) ;
	//	$(selector).tooltip ('option', 'tooltipClass', 'tooltipError') ;
	//
	//	$(selector).css ('box-shadow', '0px 0px 5px red') ;
	//	$(selector).css ('-moz-box-shadow', '0px 0px 5px red') ;
	//	$(selector).css ('-webkit-box-shadow', '0px 0px 5px red') ;

//	console.log ('htmlInputTextFullShowError selector: '+selector) ;
//	console.log ('htmlInputTextFullShowError selector: '+$(selector)) ;
//	console.log ('htmlInputTextFullShowError id: '+$(selector).attr ('id')) ;
	console.log ('id: '+$(selector).attr ('id')) ;
	
	var tmpClass = $('#'+$(selector).attr ('id')).attr ('class') ;
	console.log ('tmpClass: '+tmpClass) ;
//	if (tmpClass.indexOf ('htmlInputContact') != -1) {
//		htmlInputContactShowError ($(selector).attr ('id'), text) ;
//	}
//	else if (tmpClass.indexOf ('htmlInputTextDouble') != -1) {
//		if ($(selector).attr ('isLeft') == 'true') {
//			htmlInputContactShowErrorLeft ($(selector).attr ('id'), text) ;
//		}
//		else if ($(selector).attr ('isRight') == 'true'){
//			htmlInputContactShowErrorRight ($(selector).attr ('id'), text) ;
//		}
//		
//	}
//	else {
//		htmlInputTextFullShowError ($(selector).attr ('id'), text) ;
//	}
	
	if (tmpClass.indexOf ('htmlInputContact') != -1) {
		htmlInputContactShowError ($(selector).attr ('id'), text) ;
	}
	else {
//		alert ('ici: '+tmpClass) ;
		if(tmpClass.indexOf ('htmlInputTextDouble') != -1){
			if ($(selector).attr ('isLeft') == 'true') {
//				alert('preValidLeft');
				htmlInputTextDoubleShowErrorLeft ($(selector).attr ('id'), text) ;
			}
			else {
				if ($(selector).attr ('isRight') == 'true') {
//					alert('preValidRight');
					htmlInputTextDoubleShowErrorRight ($(selector).attr ('id'), text) ;
				}
			}
		}
		else {
			if(tmpClass.indexOf ('htmlInputCheckboxCheckInput') != -1){
			}
			else {
				
				if (tmpClass.indexOf ('htmlMotorSearchMiniInLineBoxInputTextInput') != -1) {
					htmlMotorSearchMiniInLineInputShowError ($(selector).attr ('id'), text) ;
				}
				else if (tmpClass.indexOf ('htmlMotorSearchInLineBoxInputTextInput') != -1) {
					htmlMotorSearchInLineInputShowError ($(selector).attr ('id'), text) ;
				}
				else if (tmpClass.indexOf ('htmlMotorSearchBlockBoxInputTextInput') != -1) {
					htmlMotorSearchBlockInputShowError ($(selector).attr ('id'), text) ;
				}
				else {
					htmlInputTextFullShowError ($(selector).attr ('id'), text) ;
				}
			}
		}
	}
	

	$(selector).focus () ;
}

function preValidUtilHideError (prefixUniq, selector) {
	//	$(selector).attr ('title', '') ;
	//	$(selector).tooltip () ;
	//	$(selector).tooltip ('destroy') ;
	//
	//	$(selector).css ('box-shadow', '') ;
	//	$(selector).css ('-moz-box-shadow', '') ;
	//	$(selector).css ('-webkit-box-shadow', '') ;

	var tmpClass = $('#'+$(selector).attr ('id')).attr ('class') ;
	
	console.log ('tmpClass: '+tmpClass) ;
	
	if (tmpClass.indexOf ('htmlInputContact') != -1) {
		htmlInputContactHideError ($(selector).attr ('id')) ;
	}
	else {
		if(tmpClass.indexOf ('htmlInputTextDouble') != -1){
			if ($(selector).attr ('isLeft') == 'true') {
				
				htmlInputTextDoubleHideErrorLeft ($(selector).attr ('id')) ;
			}
			else {
				if ($(selector).attr ('isRight') == 'true') {
					htmlInputTextDoubleHideErrorRight ($(selector).attr ('id')) ;
				}
				
			}
		}
		else {
			
			if (tmpClass.indexOf ('htmlMotorSearchMiniInLineBoxInputTextInput') != -1) {
				htmlMotorSearchMiniInLineInputHideError ($(selector).attr ('id')) ;
			}
			else if (tmpClass.indexOf ('htmlMotorSearchInLineBoxInputTextInput') != -1) {
				htmlMotorSearchInLineInputHideError ($(selector).attr ('id')) ;
			}
			else if (tmpClass.indexOf ('htmlMotorSearchBlockBoxInputTextInput') != -1) {
				htmlMotorSearchBlockInputHideError ($(selector).attr ('id')) ;
			}
			else {
				htmlInputTextFullHideError ($(selector).attr ('id')) ;
			}
		}
	}
}

function preValidUtilTextAreaShowError (prefixUniq, selector, key, replace, trad) {
//	console.log ('preValidUtilTextAreaShowError') ;
	
	var tab = preValidTabPrefixUniq [ prefixUniq ] ;
	
	var text = '' ;

	if (trad != '') {
		text = trad ;
	}
	else {
		text = tab [ 'tabTrad' ] [ key ] ;

		if (text == undefined) {
			text = '' ;
		}
		else {
			text = text.replace ('[LENGHTMIN]', replace);
			text = text.replace ('[LENGHTMAX]', replace);
		}
	}

	
//	console.log ('preValidUtilTextAreaShowError text: '+text) ;
	
	$(selector).attr ('title', text) ;
	$(selector).val($(selector).val());
	$(selector).tooltip () ;
	$(selector).tooltip ('option', 'content', text) ;
	$(selector).tooltip ('option', 'tooltipClass', 'tooltipError') ;

	$(selector).css ('box-shadow', '0px 0px 5px red') ;
	$(selector).css ('-moz-box-shadow', '0px 0px 5px red') ;
	$(selector).css ('-webkit-box-shadow', '0px 0px 5px red') ;

	$(selector).focus () ;
}

function preValidUtilTextAreaHideError (prefixUniq, selector) {
	$(selector).attr ('title', '') ;
	$(selector).tooltip () ;
	$(selector).tooltip ('destroy') ;

	$(selector).css ('box-shadow', '') ;
	$(selector).css ('-moz-box-shadow', '') ;
	$(selector).css ('-webkit-box-shadow', '') ;
}

function preValidUtilLengthMin (str, size) {
	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	
	if (limit == 0) {
		return true ;
	}
	
	if (limit >= size) {
		return true ;
	}
	
	return false ;
}

function preValidUtilLengthMax (str, size) {
	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	
	if (limit <= size) {
		return true ;
	}
	
	return false ;
}

function preValidUtilCheckDateBeginBeforeDateEnd (dateBegin, timeBegin, dateEnd, timeEnd) {
	
	if (dateBegin == '' || dateBegin == null || dateBegin == undefined || dateEnd == '' || dateEnd == null || dateEnd == undefined) {
		return false ;		
	}
	
//	console.log ('dateBegin = ' + dateBegin) ;
//	console.log ('timeBegin = ' + timeBegin) ;
//	console.log ('dateEnd = ' + dateEnd) ;
//	console.log ('timeEnd = ' + timeEnd) ;
	
	var arrayDate = dateBegin.split ('-') ;
	var arrayTime = timeBegin.split (':') ;
	var begin = new Date (arrayDate [ 0 ], arrayDate [ 1 ], arrayDate [ 2 ], arrayTime [ 0 ], arrayTime [ 1 ], arrayTime [ 2 ]) ;

	var arrayDate = dateEnd.split ('-') ;
	var arrayTime = timeEnd.split (':') ;
	var end = new Date (arrayDate [ 0 ], arrayDate [ 1 ], arrayDate [ 2 ], arrayTime [ 0 ], arrayTime [ 1 ], arrayTime [ 2 ]) ;

	if (begin.getTime () <= end.getTime ()) {
		return true ;
	}
	
//	console.log ('begin.getTime () = ' + begin.getTime ()) ;
//	console.log ('end.getTime () = ' + end.getTime ()) ;
	
	return false ;
}
