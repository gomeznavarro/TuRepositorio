// JavaScript Document
		$(document).ready(function(){
var jVal = {
		
	'username' : function() {
					
			$('body').append('<div id="usernameInfo" class="info"></div>');

			var usernameInfo = $('#usernameInfo');
			var ele = $('#username');
			var pos = ele.offset();

			usernameInfo.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});

			var username = $('#username').val();
			var patt = /^[a-zA-Z0-9\u00f1\u00d1\u00e9\u00ed\u00f3\u00fa\u00e1\u00c1\u00c9\u00cd\u00d3\u00da\u00fc\s\-\'\.\,]+$/;

			if(!patt.test(ele.val())) {
					jVal.errors = true;
					usernameInfo.removeClass('correct').addClass('error').html('Hay algún error en el usuario introducido').show();
					ele.removeClass('normal').addClass('wrong');
			}else{

			jQuery.ajax({
			   type: "POST",
			   url: "../noticias/check_member.php",
			   data: 'username='+ username,
			   cache: false,
			   success: function(response){
				if(response != 1){
		
					jVal.errors = true;
					usernameInfo.removeClass('correct').addClass('error').html('No hay ningún socio con ese usuario').show();
					ele.removeClass('normal').addClass('wrong');
			}else{
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
					passwordInfo.removeClass('correct').addClass('error').html('Hay algún error en la contraseña introducida').show();
					ele.removeClass('normal').addClass('wrong');
			} 
				
			else{	
					
			$.ajax({
			url: "../noticias/check_password.php",
			cache: false,
			type: "POST",
			data: "username="+$("#username").val() + "&password="+$("#password").val(),
			success: function(response){
				if(response != 1)
					{passwordInfo.removeClass('correct').addClass('error').html('Esa contraseña no coincide con la del usuario introducido').show();
					ele.removeClass('normal').addClass('wrong');
				}else{
					passwordInfo.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal'); 				
				}				
			}
			});					
			}//fin del else
	}//fin de password
}//fin de jVal

$('#username').change(jVal.username);
$('#password').change(jVal.password);
		
$("#submit").click(function(){
		$.ajax({
			url: "../noticias/session.php",
			cache: false,
			type: "POST",
			data: "username="+$("#username").val() + "&password="+$("#password").val(),
			success: function(response){
				if(response != true)
					alert('Hay algún error, vuelva a intentarlo.');				
				else{
					
				$("#loginForm")
					.css('margin', '30px 0 10px 9px')
					.html('Ya estás login<div id="miboton"><span style="color:#900; text-decoration: underline; cursor:pointer;">Pulsa aquí para continuar</div>');
				$('#miboton').click(function() {
            // Recargo la página
            	location.reload();
        		});					
				$("#passwordInfo").remove();
				$("#usernameInfo").remove();
				$("#username").remove();
				$("#password").remove();
				$("#submit").remove();
				$("#complem_login").remove();
				$("#info_login").remove();
				}
				
			}
			});
			});		

});