// JavaScript Document

$(document).ready(function(){
	       $("#ocultar_login").css("display","block");
		   $("#loginForm").css("display","none");
		  $("#login_mostrar").css("display","block");

	 //código a ejecutar cuando el DOM está listo para recibir instrucciones.
	$("#login_ocultar").click(function(evento){ //para aplicar evento a nuestro enlaces
//$("a").click(function(evento){ //para aplicar evento a todos los enlaces
   //aquí el código que se debe ejecutar al hacer clic
   
   $("#loginForm").css("display","none");
      $("#login_ocultar").css("display","none");
 $("#login_mostrar").css("display","block");
 $("#loginUsersForm").css("display","block");
  $("#usernameInfo").css("display","none");
  $("#passwordInfo").css("display","none");

   evento.preventDefault();
	});
	$("#login_mostrar").click(function(evento){ //para aplicar evento a nuestro enlaces
//$("a").click(function(evento){ //para aplicar evento a todos los enlaces
   //aquí el código que se debe ejecutar al hacer clic
   
   $("#loginForm").css("display","block");
         $("#login_ocultar").css("display","block");
$("#login_mostrar").css("display","none");
 $("#loginUsersForm").css("display","none");
  $("#username2Info").css("display","none");
  $("#password2Info").css("display","none");

	});

});