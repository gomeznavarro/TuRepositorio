// JavaScript Document
// JavaScript Document
		$(document).ready(function(){
var jVal = {
		
	'username2' : function() {
					
			$('body').append('<div id="username2Info" class="info"></div>');

			var username2Info = $('#username2Info');
			var ele = $('#username2');
			var pos = ele.offset();

			username2Info.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});

			var username = $('#username2').val();
			var patt = /^[a-zA-Z0-9\u00f1\u00d1\u00e9\u00ed\u00f3\u00fa\u00e1\u00c1\u00c9\u00cd\u00d3\u00da\u00fc\s\-\'\.\,]+$/;

			if(!patt.test(ele.val())) {
					jVal.errors = true;
					username2Info.removeClass('correct').addClass('error').html('Hay algún error en el usuario introducido').show();
					ele.removeClass('normal').addClass('wrong');
			}else{

			jQuery.ajax({
			   type: "POST",
			   url: "../noticias/check_user.php",
			   data: 'username='+ username,
			   cache: false,
			   success: function(response){
				if(response != 1){
		
					jVal.errors = true;
					username2Info.removeClass('correct').addClass('error').html('No hay ningún cliente con ese usuario').show();
					ele.removeClass('normal').addClass('wrong');
			}else{
					username2Info.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal'); }

			}
			
		});
		}	
		
},
	'password2' : function (){

			$('body').append('<div id="password2Info" class="info"></div>');

			var password2Info = $('#password2Info');
			var ele = $('#password2');
			var pos = ele.offset();

			password2Info.css({
				top: pos.top-3,
				left: pos.left+ele.width()+15
			});

			var patt = /[A-Za-z0-9\-\_]$/i;

			if(!patt.test(ele.val())|| (ele.val().length < 6) ||(ele.val().length > 16) ) {
					jVal.errors = true;
					password2Info.removeClass('correct').addClass('error').html('Hay algún error en la contraseña introducida').show();
					ele.removeClass('normal').addClass('wrong');
			} 
				
			else{	
					
			$.ajax({
			url: "../noticias/check_user_password.php",
			cache: false,
			type: "POST",
			data: "username="+$("#username2").val() + "&password="+$("#password2").val(),
			success: function(response){
				if(response != 1)
					{password2Info.removeClass('correct').addClass('error').html('Esa contraseña no coincide con la del usuario introducido').show();
					ele.removeClass('normal').addClass('wrong');
				}else{
					password2Info.removeClass('error').addClass('correct').html('&radic;').show();
					ele.removeClass('wrong').addClass('normal'); 				
				}				
			}
			});					
			}//fin del else
	}//fin de password
}//fin de jVal

$('#username2').change(jVal.username2);
$('#password2').change(jVal.password2);
		
$("#submit2").click(function(){
		$.ajax({
			url: "../noticias/session_user.php",
			cache: false,
			type: "POST",
			data: "username="+$("#username2").val() + "&password="+$("#password2").val(),
			success: function(response){
				if(response != true)
					alert('Hay algún error, vuelva a intentarlo.');				
				else{
					
				$("#loginUsersForm")
					.css('margin', '30px 0 10px 9px')
					.html('Ya estás login<div id="miboton"><span style="color:#900; text-decoration: underline; cursor:pointer;">Pulsa para escribir tu comentario</div>');
				$('#miboton').click(function() {
            // Recargo la página
            	location.reload();
        		});					
				$("#password2Info").remove();
				$("#username2Info").remove();
				$("#username2").remove();
				$("#password2").remove();
				$("#submit2").remove();
				$("#complem_login2").remove();
				$("#info_login").remove();
				}
				
			}
			});
			});		

});