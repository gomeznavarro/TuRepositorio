



$(document).ready(function(){
document.registro.firstName.focus()
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

			if(ele.val() == null || ele.val().length < 2 || /^\s+$/.test(ele.val()) || !patt.test(ele.val())) {
				jVal.errors = true;
					firstNameInfo.removeClass('correct').addClass('error').html('&larr; Introduce tu nombre').show();
					ele.removeClass('normal').addClass('wrong');
					
			} else {
					firstNameInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
			}
		},
			

'otherInterests' : function() {

			$('body').append('<div id="otherInterestsInfo" class="info"></div>');

			var otherInterestsInfo = $('#otherInterestsInfo');
			var ele = $('#otherInterests');
			var pos = ele.offset();

			otherInterestsInfo.css({
				top: pos.top+14,
				left: pos.left+ele.width()+15
			});

			var patt = /^[a-zA-Z\u00f1\u00d1\u00e9\u00ed\u00f3\u00fa\u00e1\u00c1\u00c9\u00cd\u00d3\u00da\u00fc\s\-\'\"\.\,\;\:\¡\!\¿\?\(\)]+$/;

			if(ele.val().length > 255 ) {
			
				jVal.errors = true;
					otherInterestsInfo.removeClass('correct').addClass('error').html('Se permiten sólo<br> 255 caracteres').show();
					ele.removeClass('normal').addClass('wrong');
			} 

			else if(ele.val() == null || ele.val().length < 3 || /^\s+$/.test(ele.val())) {

				jVal.errors = true;
					otherInterestsInfo.removeClass('correct').addClass('error').html('&larr; No has escrito mucho...').show();
					ele.removeClass('normal').addClass('wrong');
			}
			else if(!patt.test(ele.val())) {

				jVal.errors = true;
					otherInterestsInfo.removeClass('correct').addClass('error').html('&larr; Hay caracteres no permitidos').show();
					ele.removeClass('normal').addClass('wrong'); 
			}
			else {
					otherInterestsInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal');
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
					emailAddressInfo.removeClass('correct').addClass('error').html('&larr; Introduce un correo<br> eléctronico válido').show();
					ele.removeClass('normal').addClass('wrong');
			}
			else{
			
				  emailAddressInfo.removeClass('error').addClass('correct').html('&radic;').show();
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
			jVal.emailAddress();		
			jVal.firstName();
			jVal.otherInterests();
			jVal.sendIt();
		return false;
	});

	$('#emailAddress').change(jVal.emailAddress);
	$('#firstName').change(jVal.firstName);
	$('#otherInterests').change(jVal.otherInterests);
});

	

		
		