
/**
 * Copyright (c) 2012 - 2017, COOPATTITUDE. Tous droits réservés.
 *
 *
 * @author	COOPATTITUDE
 * @copyright	Copyright (c) 2012 - 2017, COOPATTITUDE
 */



function preValidValidFormat (str, format) {
	console.log ('STR : '+str+' FORMAT : '+format) ;

	if (format == 'formatKeywords') {
		return irPrevalidValidCheckFormatKeywords (str) ;
	}
	else if (format == 'formatColor') {
		return irPrevalidValidCheckFormatColor (str) ;
	}
	else if (format == 'formatAlphaNumeric') {
		return irPrevalidValidCheckFormatAlphaNumeric (str) ;
	}
	else if (format == 'formatAlphaNumericUser') {
		return irPrevalidValidCheckFormatAlphaNumericUser (str) ;
	}
	else if (format == 'formatNumeric') {
		return irPrevalidValidCheckFormatNumeric (str) ;
	}
	else if (format == 'formatPhoneNumber') {
		return irPrevalidValidCheckFormatPhoneNumber (str) ;
	}
	else if (format == 'formatAlias') {
		return irPrevalidValidCheckFormatAlias (str) ;
	}
	else if (format == 'formatPassword') {
		return irPrevalidValidCheckFormatPassword (str) ;
	}
	else if (format == 'formatTag') {
		return irPrevalidValidCheckFormatTag (str) ;
	}
	else if (format == 'formatLastName' || format == 'formatFirstName') {
		return irPrevalidValidCheckFormatLastNameAndFirstName (str) ;
	}
	else if (format == 'formatSubDomainName') {
		return irPrevalidValidCheckFormatSubDomainName (str) ;
	}
	else if (format == 'formatJob') {
		return irPrevalidValidCheckFormatJob (str) ;
	}
	else if (format == 'formatTitle') {
		return irPrevalidValidCheckFormatTitle (str) ;
	}
	else if (format == 'formatAlbumName') {
		return irPrevalidValidCheckFormatTitle (str) ;
	}
	else if (format == 'formatImgName') {
		return irPrevalidValidCheckFormatImgName (str) ;
	}
	else if (format == 'formatDocName') {
		return irPrevalidValidCheckFormatImgName (str) ;
	}
	else if (format == 'formatMail') {
		return irPrevalidValidCheckFormatMail (str) ;
	}
	else if (format == 'formatText') {
		return irPrevalidValidCheckFormatText (str) ;
	}
	else if (format == 'formatLinkVideo') {
		return irPrevalidValidCheckFormatLinkVideo (str) ;
	}
	else if (format == 'formatTextArea') {
		return irPrevalidValidCheckFormatTextArea (str) ;
	}
	else if (format == 'formatAnswer') {
		return irPrevalidValidCheckFormatAnswer (str) ;
	}
	else if (format == 'formatAlbumName') {
		return irPrevalidValidCheckFormatAlbumName (str) ;
	}
	else if (format == 'formatExtLink') {
		return irPrevalidValidCheckFormatLink (str) ;
	}
	else if (format == 'formatSearchText') {
		return irPrevalidValidCheckFormatSearchText (str) ;
	}

	console.log ('format:'+format+' FORMAT NON TRAITE') ;

	return false ;
}

function irCheckVietChar (c) {
	return (7680 <= c && c <= 7935) ;
}

function irCheckChineseChar (c) {
	
	if ((11744 <= c && c <= 12543)
		|| (65280 <= c && c <= 65535)
		|| (19968 <= c && c <= 25343)	
		|| (13312 <= c && c <= 30719)
		|| (30720 <= c && c <= 36095)
		|| (36096 <= c && c <= 40908)
		|| (13312 <= c && c <= 19893)
		|| (131072 <= c && c <= 173782)
		|| (173824 <= c && c <= 177972)
		|| (177984 <= c && c <= 178205)
		) {
		
		return true ;
	}
	return false ;
}

function irCheckExtendAsciiChar (c) {
	// MONNAIES : 	
	// generic currency : 164, euro : 128, dollar = 36
	// cent : 162, pound = 163, yen = 165, fnof 402 ???
	// Ұ = 1200, 元 = 5143, ฿ = 3647
	// franc sign : 8355, lira symbol : 8356, peseta sign = 8359
	// ₭ = 8365, ₴ = 8372, ₵ = 8373 =>8352 à 8381 signes de monnaies
	// ￦ = 65510

	if (c == 164 || c == 128 || c == 36 || c == 162 || c == 163 || c == 165 || c == 402 || c == 8355 || c == 8356 || c == 8359
			|| c == 1200 || c == 5143 || c == 3647 || (c >= 8352 && c <= 8381) || c == 65510) {
		return true ;
	}

	// Accents
	if (c >= 8208  && c <= 8286) {
//		if (8208 <= c  || c <= 8286) {
		return true ;
	}

	// Percent, Per Thousand
	if (c == 37 || c == 137) {
		return true ;
	}

	// latin char and pre-accents
	return (192 <= c && c <= 879) ;
}

function irPrevalidValidCheckFormatKeywords (str) {

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		// 39 '
		// 45 -
		// 46 .
		// 224 à
		// 226 â
		// 231 ç
		// 232 è
		// 233 é
		// 234 ê
		// 235 ë
		// 238 î
		// 239 ï
		// 244 ô
		// 246 ö
		// 249 ù

		var c = str.charCodeAt (i) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 32 || c == 39 || c == 45 || c == 46 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
}

function irPrevalidValidCheckFormatColor (str) {
	
	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {
		
		// 35 #
		// 48 à 57 : 0...9
		// 65 à 70 : A...F
		// 97 à 102 : a...f
		
		var c = str.charCodeAt (i) ;
		
		if (c == 35 || (48 <= c && c <= 57) || (65 <= c && c <= 70) || (97 <= c && c <= 102)) {
			
		}
		else {
			return false ;
		}
		
	}
	
	return true ;
}

function irPrevalidValidCheckFormatAlphaNumeric (str) {
	
	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {
		
		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		
		var c = str.charCodeAt (i) ;
		
		if (c == 32 || (48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {
			
		}
		else {
			return false ;
		}
		
	}
	
	return true ;
}

function irPrevalidValidCheckFormatAlphaNumericUser (str) {
	
	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		
		var c = str.charCodeAt (i) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 32 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
}

function irPrevalidValidCheckFormatNumeric (str) {
	var bool =false;
	
	bool=$.isNumeric(str);
	if(!bool)
	{
		//test2
		var regexp = /^[0-9]{1,3}([ ][0-9]{3})*$/
			if (!regexp.test(str)) {
				bool=false;
			
			}
			else
			{	
				
				bool=true;
			}
	}
	return bool ;
}

function irPrevalidValidCheckFormatPhoneNumber (str) {

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		// 35 #
		// 40 (
		// 41 )
		// 42 *
		// 43 +
		// 44 ,
		// 45 -
		// 46 .
		// 47 /
		// 58 :
		// 59 ;
		
		var c = str.charCodeAt (i) ;

		if (c == 32 || c == 35 || c == 40 || c == 41 || c == 42 || c == 43 || c == 44 || c == 45 || c == 46 || c == 47 || c == 58 || c == 59
				|| (48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
	
//	//test 1
//	var limit = 0 ;
//	var bool=false;
//	if (str != undefined) {
//		limit = str.length ;
//	}
//	for (var i = 0 ; i < limit ; ++i) {
//
//		// 48 à 57 : 0...9
//
//		var c = str.charCodeAt (i) ;
//
//		if ((48 <= c && c <= 57) || c == 43) {
//			bool=true;
//		}
//		else {
//			bool = false;
//		}
//
//	}
//
//	if(!bool)
//	{
//		//test2
//		var regexp = /^\+?\d[\d .-]+$/
//			if (!regexp.test(str)) {
//				bool=false;
//			
//			}
//			else
//			{	
//				
//				bool=true;
//			}
//	}
//
//
//	return bool;
}

function irPrevalidValidCheckFormatAlias (str) {

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z

		var c = str.charCodeAt (i) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122) || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
}

function irPrevalidValidCheckFormatPassword (str) {

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 33 !
		// 36 $
		// 45 -
		// 46 .
		// 47 /
		// 63 ?
		// 95 _
		// 163 £
		// 249 ù

		var c = str.charCodeAt (i) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 33 || c == 36 || c == 45 || c == 46 || c == 47 || c == 63
				|| c == 95 || c == 163 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
}

function irPrevalidValidCheckFormatTag (str) {

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z

		var c = str.charCodeAt (i) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
}


function irPrevalidValidCheckFormatLastNameAndFirstName (str) {

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		// 39 '
		// 45 -
		// 46 .
		// 224 à
		// 226 â
		// 231 ç
		// 232 è
		// 233 é
		// 234 ê
		// 235 ë
		// 238 î
		// 239 ï
		// 244 ô
		// 246 ö
		// 249 ù

		var c = str.charCodeAt (i) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 32 || c == 39 || c == 45 || c == 46 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
}

function irPrevalidValidCheckFormatSubDomainName (str) {

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 45 -
		
		var c = str.charCodeAt (i) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 45 || irCheckVietChar (c) || irCheckChineseChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
}

function irPrevalidValidCheckFormatJob (str) {

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		// 39 '
		// 45 -
		// 46 .
		// 224 à
		// 226 â
		// 231 ç
		// 232 è
		// 233 é
		// 234 ê
		// 235 ë
		// 238 î
		// 239 ï
		// 244 ô
		// 246 ö
		// 249 ù

		var c = str.charCodeAt (i) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 32 || c == 39 || c == 45 || c == 46 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
}

function irPrevalidValidCheckFormatAlbumName (str) {

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		// 39 '
		// 45 -
		// 95 _
		// 224 à
		// 226 â
		// 231 ç
		// 232 è
		// 233 é
		// 234 ê
		// 235 ë
		// 239 ï
		// 244 ô
		// 246 ö
		// 249 ù

		var c = str.charCodeAt (i) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 32 || c == 39 || c == 45 || c == 95 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
}

function irPrevalidValidCheckFormatImgName (str) {

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		// 39 '
		// 45 -
		// 46 .
		// 95 _
		// 224 à
		// 226 â
		// 231 ç
		// 232 è
		// 233 é
		// 234 ê
		// 235 ë
		// 238 î
		// 239 ï
		// 244 ô
		// 246 ö
		// 249 ù

		var c = str.charCodeAt (i) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 32 || c == 39 || c == 45 || c == 46 || c == 95 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
}

function irPrevalidValidCheckFormatLeafName (str) {

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		// 39 '
		// 46 .
		// 224 à
		// 226 â
		// 231 ç
		// 232 è
		// 233 é
		// 234 ê
		// 235 ë
		// 239 ï
		// 244 ô
		// 246 ö
		// 249 ù

		var c = str.charCodeAt (i) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 32 || c == 39 || c == 46 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
}

function irPrevalidValidCheckFormatLink (str) {
	
	if (str.indexOf ('http://') == 0 || str.indexOf ('https://') == 0) {
	
		var limit = 0 ;
		if (str != undefined) {
			limit = str.length ;
		}
		for (var i = 0 ; i < limit ; ++i) {
	
			// 10 LF
			// 13 CR
			// 48 à 57 : 0...9
			// 65 à 90 : A...Z
			// 97 à 122 : a...z
			// 32 space
			// 33 !
			
			// 35 #
			
			// 37 %
			// 38 &
			// 39 '
			// 40 (
			// 41 )
			// 42 *
			// 43 +
			// 44 ,
			// 45 -
			// 46 .
			// 47 /
			
			// 58 :
			// 59 ;
			
			// 61 =
			
			// 63 ?
			// 64 @
			
			// 94 ^
			// 95 _
			
			// 224 à
			// 226 â
			// 228 ä
			// 231 ç
			// 232 è
			// 233 é
			// 234 ê
			// 235 ë
			// 238 î
			// 239 ï
			// 244 ô
			// 246 ö
			// 249 ù
			// 251 û
			// 252 ü
	
			var c = str.charCodeAt (i) ;
	
			if (c == 10 || c == 13 || (48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
					|| c == 32 || c == 33 || c == 35 || (37 <= c && c <= 47) || c == 58 || c == 59 || c == 61 || c == 63 || c == 64 || c == 94 || c == 95
					|| irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {
	
			}
			else {
				return false ;
			}
	
		}
		
		return true ;
	}
	
	return false ;
}

function irPrevalidValidCheckFormatSearchText (str) {
	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		// 39 '
		// 42 *
		// 45 -
		// 46 .
		// 224 à
		// 226 â
		// 231 ç
		// 232 è
		// 233 é
		// 234 ê
		// 235 ë
		// 238 î
		// 239 ï
		// 244 ô
		// 246 ö
		// 249 ù

		var c = str.charCodeAt (i) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 32 || c == 42 || c == 39 || c == 45 || c == 46 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
}

function irPrevalidValidCheckFormatTitle (str) {

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}

	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		// 33 !
		// 34 "
		// 39 '
		// 40 (
		// 41 )
		// 44 ,
		// 45 -
		// 46 .
		// 58 :
		// 59 ;
		// 61 =
		// 63 ?
		// 95 _
		// 224 à
		// 226 â
		// 231 ç
		// 232 è
		// 233 é
		// 234 ê
		// 235 ë
		// 238 î
		// 239 ï
		// 244 ô
		// 246 ö
		// 249 ù

		var c = str.charCodeAt (i) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 32 || c == 33 || c == 34 || c == 147 || c == 187 ||  c == 171 || c == 148  || c == 39 || c == 40 || c == 41 || c == 46
				|| c == 44 || c == 45 || c == 58 || c == 59 || c == 61 || c == 63 || c == 95 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
}

function irPrevalidValidCheckFormatText (str) {
	
//	console.log ('irPrevalidValidCheckFormatText : '+str) ;
	
	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {
		
		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		// 33 !
		// 34 "
		// 36 $
		// 37 %
		// 39 '
		// 40 (
		// 41 )
		// 42 *
		// 43 +
		// 44 ,
		// 45 -
		// 46 .
		// 47 /
		// 58 :
		// 59 ;
		// 61 =
		// 63 ?
		// 95 _
		// 224 à
		// 226 â
		// 231 ç
		// 232 è
		// 233 é
		// 234 ê
		// 235 ë
		// 238 î
		// 239 ï
		// 244 ô
		// 246 ö
		// 249 ù
		
		var c = str.charCodeAt (i) ;
		
//		console.log ('CHAR : '+c) ;
		
		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 32 || c == 33 || c == 34 || c == 36 || c == 37 || c == 39 || c == 40 || c == 41 ||  c == 42 || c == 43  || c == 44 || c == 45 || c == 46 || c == 47
				|| c == 147 || c == 187 ||  c == 171 || c == 148
				|| c == 58 || c == 59 || c == 61 || c == 63 || c == 95 || irCheckVietChar (c)
				|| irCheckChineseChar (c)
				|| irCheckExtendAsciiChar (c)) {
			
		}
		else {
			return false ;
		}
		
	}
	
	return true ;
}

function irPrevalidValidCheckFormatLinkVideo (str) {

//	console.log ('irPrevalidValidCheckFormatLinkVideo : '+str) ;

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 10 LF
		// 13 CR
		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		// 33 !
		// 34 "
		// 35 #
		// 36 $
		// 37 %
		// 38 &
		// 39 '
		// 40 (
		// 41 )
		// 42 *
		// 43 +
		// 44 ,
		// 45 -
		// 46 .
		// 47 /
		// 58 :
		// 59 ;
		// 61 =
		// 63 ?
		// 64 @
		// 94 ^
		// 95 _
		// 224 à
		// 226 â
		// 231 ç
		// 232 è
		// 233 é
		// 234 ê
		// 235 ë
		// 238 î
		// 239 ï
		// 244 ô
		// 246 ö
		// 249 ù
		
		var c = str.charCodeAt (i) ;

//		console.log ('CHAR : '+c) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 10 || c == 13 || c == 32 || c == 33 || c == 34 || c == 35 || c == 36 || c == 37 || c == 38 || c == 39 || c == 40 || c == 41 ||  c == 42 || c == 43  || c == 44 || c == 45 || c == 46 || c == 47
				|| c == 147 || c == 187 ||  c == 171 || c == 148
				|| c == 58 || c == 59 || c == 61 || c == 63 || c == 64 || c == 94 || c == 95 || irCheckVietChar (c)
				|| irCheckChineseChar (c)
				|| irCheckExtendAsciiChar (c)) {
			
		}
		else {
			return false ;
		}

	}

	return true ;
}

function irPrevalidValidCheckFormatAnswer (str) {

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	for (var i = 0 ; i < limit ; ++i) {

		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		// 33 !
		// 34 "
		// 36 $
		// 37 %
		// 39 '
		// 40 (
		// 41 )
		// 42 *
		// 43 +
		// 44 ,
		// 45 -
		// 46 .
		// 47 /
		// 58 :
		// 59 ;
		// 224 à
		// 226 â
		// 231 ç
		// 232 è
		// 233 é
		// 234 ê
		// 235 ë
		// 238 î
		// 239 ï
		// 244 ô
		// 246 ö
		// 249 ù

		var c = str.charCodeAt (i) ;

		if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 32 || c == 33 || c == 34 || c == 147 || c == 187 ||  c == 171 || c == 148  || c == 36 || c == 37 || c == 39
				|| c == 40 || c == 41 || c == 42 || c == 43 || c == 44 || c == 45 || c == 46 || c == 47
				|| c == 58 || c == 59 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			return false ;
		}

	}

	return true ;
}

function irPrevalidValidCheckFormatMailCheckArob (str) {
	console.debug("dk 407 checkMail");
	if (str == undefined) {
		return false ;
	}
	else if (str == '') {
		return true ;
	}

	var pos = str.indexOf ("@") ;
	if (pos != -1) {
		
		return true ;
	}

	return false ;
}

function irPrevalidValidCheckFormatMail (str) {
	console.debug("dk 407 checkMail");
	if (str == undefined) {
		return false ;
	}
	else if (str == '') {
		return true ;
	}

	var pos = str.indexOf ("@") ;
	if (pos != -1) {
		var tmp1 = str.substring (0, pos) ;
		pos ++ ;
		var tmp2 = str.substring (pos) ;

		var limit = tmp1.length ;

		for (var i = 0 ; i < limit ; ++i) {

			// 48 à 57 : 0...9
			// 65 à 90 : A...Z
			// 97 à 122 : a...z
			// 45 -
			// 46 .
			// 95 _

			var c = tmp1.charCodeAt (i) ;

			if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
					|| c == 45 || c == 46 || c == 95 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

			}
			else {
				console.debug("dk 407  part1 error ");
				return false ;
			}
		}

		var limit2 = tmp2.length ;

		for (var i = 0 ; i < limit2 ; ++i) {

			// 48 à 57 : 0...9
			// 65 à 90 : A...Z
			// 97 à 122 : a...z
			// 45 -
			// 46 .
			// 95 _

			var c = tmp2.charCodeAt (i) ;

			if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
					|| c == 45 || c == 46 || c == 95 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

			}
			else {
				console.debug("dk 407  part2 error ");
				return false ;
			}
		}
		console.debug("dk 407 good ");
		return true ;
	}
	else {
		var tmp1 = str ;

		var limit = tmp1.length ;

		for (var i = 0 ; i < limit ; ++i) {

			// 48 à 57 : 0...9
			// 65 à 90 : A...Z
			// 97 à 122 : a...z
			// 45 -
			// 46 .
			// 95 _

			var c = tmp1.charCodeAt (i) ;

			if ((48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
					|| c == 45 || c == 46 || c == 95 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

			}
			else {
				console.debug("dk 407  part1 error ");
				return false ;
			}
		}

		
		console.debug("dk 407 good ");
		return true ;
	}

	return false ;
}

function irPrevalidValidCheckFormatTextArea (str) {

	var limit = 0 ;
	if (str != undefined) {
		limit = str.length ;
	}
	
	var error = false ;
	
	for (var i = 0 ; i < limit ; ++i) {

		// 10 LF
		// 13 CR
		// 48 à 57 : 0...9
		// 65 à 90 : A...Z
		// 97 à 122 : a...z
		// 32 space
		// 33 !
		// 34 "
		// 37 %
		// 39 '
		// 40 (
		// 41 )
		// 42 *
		// 43 +
		// 44 ,
		// 45 -
		// 46 .
		// 47 /
		// 58 :
		// 59 ;
		// 61 =
		// 63 ?
		// 64 @
		// 94 ^
		// 95 _

		// 224 à
		// 226 â
		// 228 ä
		// 231 ç
		// 232 è
		// 233 é
		// 234 ê
		// 235 ë
		// 238 î
		// 239 ï
		// 244 ô
		// 246 ö
		// 249 ù
		// 251 û
		// 252 ü

		var c = str.charCodeAt (i) ;

		if (c == 10 || c == 13 || (48 <= c && c <= 57) || (65 <= c && c <= 90) || (97 <= c && c <= 122)
				|| c == 32 || c == 33 || c == 34 || c == 147 || c == 187 ||  c == 171 || c == 148  || c == 37 || c == 39 || c == 40 || c == 41 || c == 42 || c == 43 || c == 44 || c == 45
				|| c == 46 || c == 47 || c == 58 || c == 59 || c == 61 || c == 63 || c == 64 || c == 94 || c == 95 || irCheckVietChar (c) || irCheckChineseChar (c) || irCheckExtendAsciiChar (c)) {

		}
		else {
			console.log ('irPrevalidValidCheckFormatTextArea error, char: '+c) ;
			error = true ;
		}

	}
	if (error) {
		return false ;
	}

	return true ;
}
