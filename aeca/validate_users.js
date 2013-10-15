



$(document).ready(function(){
document.registro.firstName.focus();
	var jVal = {

		'firstName' : function() {

			$('body').append('<div id="firstNameInfo" class="info"></div>');

			var firstNameInfo = $('#firstNameInfo');
			var ele = $('#firstName');
			var pos = ele.offset();

			firstNameInfo.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});

			var patt = /^[a-zA-Z\u00f1\u00d1\u00e9\u00ed\u00f3\u00fa\u00e1\u00c1\u00c9\u00cd\u00d3\u00da\u00fc\s\-\'\.\,]+$/;

			if(ele.val() == null || ele.val().length < 2 || /^\s+$/.test(ele.val()) ) {
				jVal.errors = true;
					firstNameInfo.removeClass('correct').addClass('error').html('El nombre ha de tener al menos 2 caracteres').show();
					ele.removeClass('normal').addClass('wrong');
			} 
			else if( !(/^\D{2,}$/.test(ele.val()))){
			jVal.errors = true;
					firstNameInfo.removeClass('correct').addClass('error').html('El campo nombre no admite números').show();
					ele.removeClass('normal').addClass('wrong');
			}	
	else if(!patt.test(ele.val())) {
				jVal.errors = true;
					firstNameInfo.removeClass('correct').addClass('error').html('El campo nombre sólo admite letras, espacios, guiones (\-) y ap\xf3strofos (\')').show();
					ele.removeClass('normal').addClass('wrong');
			}		
			else {
					firstNameInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
		},
			
		'address_postal' : function() {

			$('body').append('<div id="address_postalInfo" class="info"></div>');

			var address_postalInfo = $('#address_postalInfo');
			var ele = $('#address_postal');
			var pos = ele.offset();

			address_postalInfo.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});
			
						
			var patt = /^[a-zA-Z0-9\u00f1\u00d1\u00e9\u00ed\u00f3\u00fa\u00e1\u00c1\u00c9\u00cd\u00d3\u00da\u00fc\º\ª\/\s\-\'\.\,]+$/;

			if(ele.val() == null || /^\s+$/.test(ele.val())|| ele.val()=='' )  {
					address_postalInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
	
			else if(ele.val().length < 3 )  {
					jVal.errors = true;
					address_postalInfo.removeClass('correct').addClass('error').html('Tu dirección es demasiado corta...').show();
					ele.removeClass('normal').addClass('wrong');
			} 

			else if( !patt.test(ele.val()))  {
					jVal.errors = true;
					address_postalInfo.removeClass('correct').addClass('error').html('Hay caracteres no permitidos').show();
					ele.removeClass('normal').addClass('wrong');
			} else {
					address_postalInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
		},
		
		'RE_pobla' : function() {

			$('body').append('<div id="RE_poblaInfo" class="info"></div>');

			var RE_poblaInfo = $('#RE_poblaInfo');
			var ele = $('#RE_pobla');
			var pos = ele.offset();
			var valu = $("select option:selected").val();
			var current=$("#RE_pobla").val(); 

			RE_poblaInfo.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
				
			});

			if (current=='-seleccione provincia-'){ 
					jVal.errors = true;
					RE_poblaInfo.removeClass('correct').addClass('error').html('Selecciona una población').show();
					ele.removeClass('normal').addClass('wrong');
			}else if(valu=="0"){

					jVal.errors = true;
					RE_poblaInfo.removeClass('correct').addClass('error').html('Selecciona una población').show();
					ele.removeClass('normal').addClass('wrong');
			} else {
					RE_poblaInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
		},			
		'RE_Prov' : function() {

			$('body').append('<div id="RE_ProvInfo" class="info"></div>');

			var RE_ProvInfo = $('#RE_ProvInfo');
			var ele = $('#RE_Prov');
			var pos = ele.offset();
			var valu = $("select option:selected").val();
			RE_ProvInfo.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});
			var current=$("#RE_Prov").val(); 

			if (current=='Seleccione provincia...'){ 
					jVal.errors = true;
					RE_ProvInfo.removeClass('correct').addClass('error').html('Selecciona una provincia').show();
					ele.removeClass('normal').addClass('wrong');
			}else if(valu=="0"){
									jVal.errors = true;
					RE_ProvInfo.removeClass('correct').addClass('error').html('Selecciona una provincia').show();
					ele.removeClass('normal').addClass('wrong');

			} else {
					RE_ProvInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
		},
		
		'zip_postal' : function() {

			$('body').append('<div id="zip_postalInfo" class="info"></div>');

			var zip_postalInfo = $('#zip_postalInfo');
			var ele = $('#zip_postal');
			var pos = ele.offset();

			zip_postalInfo.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});
			var patt = /^[0-5]{1}[0-9]{4}$/i;

			if( !patt.test(ele.val())){

					jVal.errors = true;
					zip_postalInfo.removeClass('correct').addClass('error').html('Introduce un código postal válido').show();
					ele.removeClass('normal').addClass('wrong');
			} else {
					zip_postalInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
		},
				
		'gender' : function (){

			$('body').append('<div id="genderInfo" class="info"></div>');

			var genderInfo = $('#genderInfo');
			var ele = $('#genderFemale');
			var pos = ele.offset();

			genderInfo.css({
				top: pos.top-7,
				left: pos.left+ele.width()+15
			});

			if($('input[name="gender"]:checked').length === 0) {
				jVal.errors = true;
					genderInfo.removeClass('correct').addClass('error').html('Introduce tu género').show();
					ele.removeClass('normal').addClass('wrong');
			} else {
					genderInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
		},
		


				'txtBthDay' : function (){

			$('body').append('<div id="txtBthDayInfo" class="info"></div>');

			var txtBthDayInfo = $('#txtBthDayInfo');
			var ele = $('#txtBthDay');
			var pos = ele.offset();

			txtBthDayInfo.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});


			if(!valida_date(ele.val())) {
				jVal.errors = true;
					txtBthDayInfo.removeClass('correct').addClass('error').html('Introduce una fecha entre 1900 y 1994,<br/> en formato dd-mm-yyyy').show();
					ele.removeClass('normal').addClass('wrong');
			} else {
					txtBthDayInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
		},
				'favoriteGenre' : function() {

			$('body').append('<div id="favoriteGenreInfo" class="info"></div>');

			var favoriteGenreInfo = $('#favoriteGenreInfo');
			var ele = $('#favoriteGenre');
			var pos = ele.offset();

			favoriteGenreInfo.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});

				if (document.registro.favoriteGenre.selectedIndex==0){ 

				jVal.errors = true;
					favoriteGenreInfo.removeClass('correct').addClass('error').html('Por favor, dinos cómo nos conociste').show();
					ele.removeClass('normal').addClass('wrong');
			} else {
					favoriteGenreInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
		},
'otherInterests' : function() {

			$('body').append('<div id="otherInterestsInfo" class="info"></div>');

			var otherInterestsInfo = $('#otherInterestsInfo');
			var ele = $('#otherInterests');
			var pos = ele.offset();

			otherInterestsInfo.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});

			var patt = /^[a-zA-Z\u00f1\u00d1\u00e9\u00ed\u00f3\u00fa\u00e1\u00c1\u00c9\u00cd\u00d3\u00da\u00fc\s\-\'\.\,\;\:\¡\!\¿\?\(\)]+$/;

			if(ele.val().length > 255 ) {
			
				jVal.errors = true;
					otherInterestsInfo.removeClass('correct').addClass('error').html('Se permiten sólo 255 caracteres').show();
					ele.removeClass('normal').addClass('wrong');
			} 
			else if(ele.val() == null || ele.val().length < 3 || /^\s+$/.test(ele.val()) ) {

				jVal.errors = true;
					otherInterestsInfo.removeClass('correct').addClass('error').html('No has escrito mucho...').show();
					ele.removeClass('normal').addClass('wrong');
			} 
else if(ele.val() == null || ele.val().length < 3 || /^\s+$/.test(ele.val()) || !patt.test(ele.val())) {

				jVal.errors = true;
					otherInterestsInfo.removeClass('correct').addClass('error').html('Hay caracteres no permitidos').show();
					ele.removeClass('normal').addClass('wrong');
			}	 else {
					otherInterestsInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
		},
		
		'username' : function() {

			$('body').append('<div id="usernameInfo" class="info"></div>');

			var usernameInfo = $('#usernameInfo');
			var ele = $('#username');
			var pos = ele.offset();

			usernameInfo.css({
				top: pos.top-18,
				left: pos.left+ele.width()+15
			});

			var patt = /^[a-zA-Z0-9\-\_]+$/;

			if(ele.val().length < 6 ||ele.val().length >16 || !patt.test(ele.val())) {
					jVal.errors = true;
					usernameInfo.removeClass('correct').addClass('error').html('Introduce un usuario válido <br/>(letras, números o guiones medios o bajos)').show();
					ele.removeClass('normal').addClass('wrong');
			}
			else{			
					   jQuery.ajax({
					   type: "POST",
					   url: "checkusernameusers.php",
					   data: 'username='+ username,
					   cache: false,
					   success: function(response){
					if(response == 1){
							
										jVal.errors = true;
										usernameInfo.removeClass('correct').addClass('error').html('Ese usuario ya existe en la base de datos').show();
										ele.removeClass('normal').addClass('wrong');
					}
					else{
										usernameInfo.removeClass('error').addClass('correct').html('&radic;').show();
										ele.removeClass('wrong').addClass('normal'); }
					
					}
			});
			}									
		},
		

		'password' : function (){

			$('body').append('<div id="passwordInfo" class="info"></div>');

			var passwordInfo = $('#passwordInfo');
			var ele = $('#password');
			var pos = ele.offset();

			passwordInfo.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});

			var patt = /[A-Za-z0-9\-\_]$/i;

			if(!patt.test(ele.val())|| (ele.val().length < 6) ||(ele.val().length > 16) ) {
					jVal.errors = true;
					passwordInfo.removeClass('correct').addClass('error').html('Introduce una contraseña válida <br/>(letras, números o guiones medios o bajos)').show();
					ele.removeClass('normal').addClass('wrong');
			} else {
					passwordInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
		},
		'password2' : function (){

			$('body').append('<div id="password2Info" class="info"></div>');

			var password2Info = $('#password2Info');
			var ele = $('#password2');
			var pos = ele.offset();

			password2Info.css({
				top: pos.top+10,
				left: pos.left+ele.width()+15
			});

			var patt = /[A-Za-z0-9\-\_]$/i;

			if(!patt.test(ele.val())|| (ele.val().length < 6) ||(ele.val().length > 16) ) {
					jVal.errors = true;
					password2Info.removeClass('correct').addClass('error').html('Introduce una contraseña válida<br/>(letras, números o guiones medios o bajos)').show();
					ele.removeClass('normal').addClass('wrong');

			} 
			
			
			else {
					password2Info.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}		
	
			var pass1 = $('[name=password]');
			var pass2 = $('[name=password2]');
			if(pass1.val()!= pass2.val()){
				jVal.errors = true;
					password2Info.removeClass('correct').addClass('error').html('Las contraseñas introducidas no son iguales').show();
					ele.removeClass('normal').addClass('wrong');

			} 
		},
				
		'emailAddress' : function() {
					
			$('body').append('<div id="emailAddressInfo" class="info"></div>');

			var emailAddressInfo = $('#emailAddressInfo');
			var ele = $('#emailAddress');
			var pos = ele.offset();

			emailAddressInfo.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});

			var emailAddress = $('#emailAddress').val();
			var patt = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

			if(!patt.test(ele.val()) || ele.val()=='') {
					jVal.errors = true;
					emailAddressInfo.removeClass('correct').addClass('error').html('Introduce un correo eléctronico válido').show();
					ele.removeClass('normal').addClass('wrong');
			}
			else{
			
				   jQuery.ajax({
				   type: "POST",
				   url: "checkemailusers.php",
				   data: 'emailAddress='+ emailAddress,
				   cache: false,
				   success: function(response){
				if(response == 1){
						
									jVal.errors = true;
									emailAddressInfo.removeClass('correct').addClass('error').html('Ese email ya existe en la base de datos').show();
									ele.removeClass('normal').addClass('wrong');
				}
				else{
									emailAddressInfo.removeClass('error').addClass('correct').html('&radic;').show();
									ele.removeClass('wrong').addClass('normal'); }
				
				}
				});
				}								
			},

				
				'txtPhone' : function() {

			$('body').append('<div id="txtPhoneInfo" class="info"></div>');

			var txtPhoneInfo = $('#txtPhoneInfo');
			var ele = $('#txtPhone');
			var pos = ele.offset();

			txtPhoneInfo.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});

			var patt = /^[0-9]{9}$/i;
			
			if(ele.val() == null || /^\s+$/.test(ele.val())|| ele.val()=='' )  {
					txtPhoneInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
	
			else if(!patt.test(ele.val())) {
				jVal.errors = true;
					txtPhoneInfo.removeClass('correct').addClass('error').html('El teléfono fijo es erróneo').show();
					ele.removeClass('normal').addClass('wrong');
			} 

			else {
					txtPhoneInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
		},

				'txtMobile' : function() {

			$('body').append('<div id="txtMobileInfo" class="info"></div>');

			var txtMobileInfo = $('#txtMobileInfo');
			var ele = $('#txtMobile');
			var pos = ele.offset();

			txtMobileInfo.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});

			var patt = /^[6]{1}[0-9]{8}$/i;

			if(ele.val() == null || /^\s+$/.test(ele.val())|| ele.val()=='' )  {
					txtMobileInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
			else if(!patt.test(ele.val())) {
				jVal.errors = true;
					txtMobileInfo.removeClass('correct').addClass('error').html('El teléfono móvil no es correcto').show();
					ele.removeClass('normal').addClass('wrong');
			} 
			else {
					txtMobileInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
		},




		
		
				'termin' : function (){

			$('body').append('<div id="terminInfo" class="info"></div>');

			var terminInfo = $('#terminInfo');
			var ele = $('#termin');
			var pos = ele.offset();

			terminInfo.css({
				top: pos.top-10,
				left: pos.left+ele.width()+40
			});

			if($('input[name="termin"]:checked').length != 1) {
				jVal.errors = true;
					terminInfo.removeClass('correct').addClass('error').html('Olvidaste marcar la casilla de aceptaci&oacute;n de t&eacute;rminos').show();
					ele.removeClass('normal').addClass('wrong');
			} else {
					terminInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
		},

		'sendIt' : function (){
			 if(!jVal.errors) {
				
				$('#registro').submit();
			}
		}
	};
	
	$('#submitButton').click(function (){
			jVal.errors = false;
			jVal.address_postal();
			jVal.RE_pobla();
			jVal.RE_Prov();
			jVal.zip_postal();
			jVal.username();
			jVal.password();
			jVal.password2();
			jVal.emailAddress();		
			jVal.txtPhone();
			jVal.txtMobile();
			jVal.firstName();
			jVal.gender();
			jVal.txtBthDay();
			jVal.favoriteGenre();
			jVal.otherInterests();
			jVal.termin();
			jVal.sendIt();
		return false;
	});

	$('#address_postal').change(jVal.address_postal);
	$('#RE_pobla').change(jVal.RE_pobla);
	$('#RE_Prov').change(jVal.RE_Prov);
	$('#zip_postal').change(jVal.zip_postal);
	$('#emailAddress').change(jVal.emailAddress);
	$('#txtPhone').change(jVal.txtPhone);
	$('#txtMobile').change(jVal.txtMobile);	
	$('#username').change(jVal.username);
	$('#password').change(jVal.password);
	$('#password2').change(jVal.password2);	
	$('#firstName').change(jVal.firstName);
	$('input[name="gender"]').change(jVal.gender);
	$('#txtBthDay').change(jVal.txtBthDay);
	$('#favoriteGenre').change(jVal.favoriteGenre);
	$('#otherInterests').change(jVal.otherInterests);
	$('#termin').change(jVal.termin);
});

//Retorna: 1 = NIF ok, 2 = CIF ok, 3 = NIE ok, -1 = NIF error, -2 = CIF error, -3 = NIE error, 0 = ??? error
function valida_nif_cif_nie(a) 
{
	var temp=a.toUpperCase();
	var cadenadni="TRWAGMYFPDXBNJZSQVHLCKE";
 
	if (temp!==''){
		//si no tiene un formato valido devuelve error
		if ((!/^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$/.test(temp) && !/^[T]{1}[A-Z0-9]{8}$/.test(temp)) && !/^[0-9]{8}[A-Z]{1}$/.test(temp))
		{
			return 0;
		}
 
		//comprobacion de NIFs estandar
		if (/^[0-9]{8}[A-Z]{1}$/.test(temp))
		{
			posicion = a.substring(8,0) % 23;
			letra = cadenadni.charAt(posicion);
			var letradni=temp.charAt(8);
			if (letra == letradni)
			{
			   	return 1;
			}
			else
			{
				return -1;
			}
		}
 
		//algoritmo para comprobacion de codigos tipo CIF
		suma = parseInt(a[2])+parseInt(a[4])+parseInt(a[6]);
		for (i = 1; i < 8; i += 2)
		{
			temp1 = 2 * parseInt(a[i]);
			temp1 += '';
			temp1 = temp1.substring(0,1);
			temp2 = 2 * parseInt(a[i]);
			temp2 += '';
			temp2 = temp2.substring(1,2);
			if (temp2 == '')
			{
				temp2 = '0';
			}
 
			suma += (parseInt(temp1) + parseInt(temp2));
		}
		suma += '';
		n = 10 - parseInt(suma.substring(suma.length-1, suma.length));
 
		//comprobacion de NIFs especiales (se calculan como CIFs)
		if (/^[KLM]{1}/.test(temp))
		{
			if (a[8] == String.fromCharCode(64 + n))
			{
				return 1;
			}
			else
			{
				return -1;
			}
		}
 
		//comprobacion de CIFs
		if (/^[ABCDEFGHJNPQRSUVW]{1}/.test(temp))
		{
			temp = n + '';
			if (a[8] == String.fromCharCode(64 + n) || a[8] == parseInt(temp.substring(temp.length-1, temp.length)))
			{
				return 2;
			}
			else
			{
				return -2;
			}
		}
 
		//comprobacion de NIEs
		//T
		if (/^[T]{1}/.test(temp))
		{
			if (a[8] == /^[T]{1}[A-Z0-9]{8}$/.test(temp))
			{
				return 3;
			}
			else
			{
				return -3;
			}
		}
 
		//XYZ
		if (/^[XYZ]{1}/.test(temp))
		{
			pos = str_replace(['X', 'Y', 'Z'], ['0','1','2'], temp).substring(0, 8) % 23;
			if (a[8] == cadenadni.substring(pos, pos + 1))
			{
				return 3;
			}
			else
			{
				return -3;
			}
		}
	}
 
	return 0;
}

function valida_dni_nie(a) 
{
	var temp=a.toUpperCase();
	var cadenadni="TRWAGMYFPDXBNJZSQVHLCKE";
 
	if (temp!==''){
		//si no tiene un formato valido devuelve error
		if ((!/^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$/.test(temp) && !/^[T]{1}[A-Z0-9]{8}$/.test(temp)) && !/^[0-9]{8}[A-Z]{1}$/.test(temp))
		{
			return 0;
		}
 
		//comprobacion de NIFs estandar
		if (/^[0-9]{8}[A-Z]{1}$/.test(temp))
		{
			posicion = a.substring(8,0) % 23;
			letra = cadenadni.charAt(posicion);
			var letradni=temp.charAt(8);
			if (letra == letradni)
			{
			   	return 1;
			}
			else
			{
				return -1;
			}
		}
 
		
 
		//comprobacion de NIEs
		//T
		if (/^[T]{1}/.test(temp))
		{
			if (a[8] == /^[T]{1}[A-Z0-9]{8}$/.test(temp))
			{
				return 3;
			}
			else
			{
				return -3;
			}
		}
 
		//XYZ
		if (/^[XYZ]{1}/.test(temp))
		{
			pos = str_replace(['X', 'Y', 'Z'], ['0','1','2'], temp).substring(0, 8) % 23;
			if (a[8] == cadenadni.substring(pos, pos + 1))
			{
				return 3;
			}
			else
			{
				return -3;
			}
		}
	}
 
	return 0;
}
function valida_date(f) 
{

	// la forma de verificar el formato es la que ya comentamos 
re=/^[0-9]{2}\-[0-9]{2}\-[0-9]{4}$/i
if(f.length==0 || !re.exec(f))
{
	
	return 0
}

// comprobamos que la fecha es válida 
var d = new Date()
// la función tiene como entrada: año, mes, día 
d.setFullYear(f.substring(6,10), 
	      f.substring(3,5)-1,
	      f.substring(0,2))

/* ¿el mes del objeto Date es el mes introducido por el usuario?
   OJO: getMonth() devuelve el número de mes del 0 al 11
   ¿el día del objeto Date es el día introducido por el usuario?
   OJO: getDate() devuelve el día del mes */
   
if(f.substring(6,10)<1900|| f.substring(6,10)>1994||d.getMonth() != f.substring(3,5)-1 
	|| d.getDate() != f.substring(0,2))
{
	
	return 0;
}	
		
else return 1;		
		
}

/*function email_check(){	
var emailAddress = $('#emailAddress').val();
if(emailAddress != "" ){

jQuery.ajax({
   type: "POST",
   url: "check.php",
   data: 'emailAddress='+ emailAddress,
   cache: false,
   success: function(response){
if(response == 1){ //ya existe
	document.write (0);
	}else{
	document.write (1);
	     }

}
});
}
}*/


		
/*$('#registro').submit(function() {
if(!confirm(" Esta seguro ? "))
{
$("#div").append( "aquí metes el código que se pintaría con los datos del formulario")

return true;
} 

else {


return false;

}


});	*/	

		
		