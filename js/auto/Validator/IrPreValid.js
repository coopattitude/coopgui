
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */


var preValidTabPrefixUniq = new Array () ;


function preValidInit (prefixUniq, tabTrad, tabAction) {
//	console.log ('preValidInit, prefixUniq: '+prefixUniq) ;
	console.debug('dk101 : preValidInit : '+prefixUniq);
	console.debug('dk101 : preValidInit : '+prefixUniq);


	preValidTabPrefixUniq [ prefixUniq ] = new Array () ;
	preValidTabPrefixUniq [ prefixUniq ] [ 'tabTrad' ] = tabTrad ;
	preValidTabPrefixUniq [ prefixUniq ] [ 'tabAction' ] = tabAction ;

	if(preValidTabPrefixUniq [ prefixUniq ] [ 'bool' ] !='true')
	{
		preValidAddEvent (prefixUniq);
		preValidTabPrefixUniq [ prefixUniq ] [ 'bool' ] = 'true' ;
	}
}

function preValidAddEvent (prefixUniq) {
	console.debug('dk101 : preValidAddEvent : '+prefixUniq);
//	console.log ('preValidAddEvent, prefixUniq: '+prefixUniq) ;

	var tab = preValidTabPrefixUniq [ prefixUniq ] ;

	var tabAction = tab [ 'tabAction' ] ;
	var tabValue=new Array();
	for (var i = 0 ; i < tabAction.length ; ++i) {
		var action = tabAction [ i ] [ 'action' ] ;

		var selector = tabAction [ i ] [ 'selector' ] ;
		var selectorControl = tabAction [ i ] [ 'selectorControl' ] ;
		var selectorAff = tabAction [ i ] [ 'selectorAff' ] ;
		var selector1 = tabAction [ i ] [ 'selector1' ] ;
		var selector2 = tabAction [ i ] [ 'selector2' ] ;

		var format = tabAction [ i ] [ 'format' ] ;
		var empty = tabAction [ i ] [ 'empty' ] ;
		var lenghtMin = parseInt (tabAction [ i ] [ 'lenghtMin' ]) ;
		var lenghtMax = parseInt (tabAction [ i ] [ 'lenghtMax' ]) ;
		var nameDateBegin = tabAction [ i ] [ 'nameDateBegin' ] ;
		var nameTimeBegin = tabAction [ i ] [ 'nameTimeBegin' ] ;
		var nameDateEnd = tabAction [ i ] [ 'nameDateEnd' ] ;
		var nameTimeEnd = tabAction [ i ] [ 'nameTimeEnd' ] ;
		var trad = tabAction [ i ] [ 'trad' ] ;
		var noAddEvent = tabAction [ i ] [ 'noAddEvent' ] ;

		console.debug('dk101 : selector : '+selector);
		console.debug('dk101 : nodAddEvt : '+noAddEvent);

		if (noAddEvent != 'true') {
			
			console.debug('dk101 : action : '+action);
			
			if (action == 'validInputText') {
				preValidAddEventInputText (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) ;
			}
			else if (action == 'validInputHidden') {
				preValidAddEventInputHidden (prefixUniq, selectorControl, selectorAff, empty, trad) ;
			}
			else if (action == 'validInputPassword') {
				preValidAddEventInputPassword (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) ;
			}
			else if (action == 'validInputCheckbox') {
				preValidAddEventInputCheckbox (prefixUniq, selector) ;
			}
			else if (action == 'validTextArea') {
				preValidAddEventTextArea (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) ;
			}
			else if (action == 'validEmptyAndEmpty') {
				preValidAddEventEmptyAndEmpty (prefixUniq, selector1, selector2) ;
			}
		}

		if(false && format=="formatPhoneNumber")
		{

			tabValue[selector]=$(selector).val();
			console.debug("dk405 selector"+selector);
			console.debug("dk405 tabselector"+tabValue[selector]);
			console.debug("dk405 format nu_mber");
			
			$(selector).keyup(function(event) {
				
				if(event.which == 8) {
					return "" ;
				}

				console.debug ("dk405 evt") ;
				
				value = $(this).val () ;

				console.debug(value +" "+tabValue["#"+$(this).attr("id")]);
				
				if (value == tabValue ["#"+$(this).attr("id")]) {
					console.debug("dk405 idem");
					
					tabValue ["#"+$(this).attr("id")] = value ;
					
					return ;
				}

				console.debug ("dk405 value1 //  "+value) ;
				var regex = new RegExp (' ', 'g') ;
				value = value.replace (regex, '') ;
				
				console.debug("dk405 value2 //  "+value);
				regex = new RegExp('-', 'g');
				value = value.replace(regex, '');
				
				console.debug("dk405 value3 //  "+value);
				regex = new RegExp('[.]', 'g');
				value = value.replace(regex, '');
				
				console.debug("dk405 value4 //  "+value);
				newValue = "" ;

				console.debug("dk405 value //  "+value);
				
				var regexp = /^\+?\d[\d .-]+$/
				
					if (regexp.test(value)) {
						bool=false;

						var k=0;
						for(i=0; i<value.length; ++i)
						{

							c = value.charAt(i);
							if($.isNumeric(c))
							{
								bool=true;
								newValue+=c;
								boolSpace=false;
								k++;

							}
							else
							{
								if(c!=' '){
									newValue+=c;
								}
							}
							if($.isNumeric(c) && k%2==0)
							{
								if(value.charAt(i-1)!=' '){
									newValue+=" ";}
							}

						}
						if (newValue.length > 1 && newValue.charAt (newValue.length - 1) == ' ') {
							newValue = newValue.substring (0, (newValue.length -1)) ;
						}
						console.debug("dk405 new value "+newValue);
						$(this).val(newValue);
						tabValue["#"+$(this).attr("id")]=newValue;

					}
				}		
			);
		}
	}
}

function preValidCheckForm (prefixUniq) {

	console.log ('preValidCheckForm, prefixUniq: '+prefixUniq) ;

	var tab = preValidTabPrefixUniq [ prefixUniq ] ;

	var tabAction = tab [ 'tabAction' ] ;

	for (var i = 0 ; i < tabAction.length ; ++i) {
		var action = tabAction [ i ] [ 'action' ] ;

		var selector = tabAction [ i ] [ 'selector' ] ;
		var selectorControl = tabAction [ i ] [ 'selectorControl' ] ;
		var selectorAff = tabAction [ i ] [ 'selectorAff' ] ;
		var selector1 = tabAction [ i ] [ 'selector1' ] ;
		var selector2 = tabAction [ i ] [ 'selector2' ] ;

		var format = tabAction [ i ] [ 'format' ] ;
		var empty = tabAction [ i ] [ 'empty' ] ;
		var lenghtMin = parseInt (tabAction [ i ] [ 'lenghtMin' ]) ;
		var lenghtMax = parseInt (tabAction [ i ] [ 'lenghtMax' ]) ;
		var nameDateBegin = tabAction [ i ] [ 'nameDateBegin' ] ;
		var nameTimeBegin = tabAction [ i ] [ 'nameTimeBegin' ] ;
		var nameDateEnd = tabAction [ i ] [ 'nameDateEnd' ] ;
		var nameTimeEnd = tabAction [ i ] [ 'nameTimeEnd' ] ;
		var trad = tabAction [ i ] [ 'trad' ] ;

//		console.log ('preValidCheckForm, action: '+action+' selectorControl: '+selectorControl+' selectorAff:'+selectorAff) ;

		var error = false ;
		if (action == 'validInputText') {
			error = preValidValidInputText (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) ;
		}
		else if (action == 'validInputHidden') {
			error = preValidValidInputHidden (prefixUniq, selectorControl, selectorAff, empty, trad) ;
		}
		else if (action == 'validInputPassword') {
			error = preValidValidInputPassword (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) ;
		}
		else if (action == 'validInputCheckbox') {
			error = preValidValidInputCheckbox (prefixUniq, selector) ;
		}
		else if (action == 'validTextArea') {
			error = preValidValidTextArea (prefixUniq, selector, format, empty, lenghtMin, lenghtMax) ;
		}
		else if (action == 'validEmptyAndEmpty') {
			error = preValidValidEmptyAndEmpty (prefixUniq, selector1, selector2) ;
		}
		else if (action == 'validDateBeginBeforeDateEnd') {
			error = preValidValidDateBeginBeforeDateEnd (prefixUniq, idForm, nameDateBegin, nameTimeBegin, nameDateEnd, nameTimeEnd) ;
		}

		if (error) {
			console.log ('irPrevalidV2 ERROR action:'+action) ;
			return false ;
		}
	}

	return true ;
}
