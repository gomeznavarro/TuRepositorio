// JavaScript Document
$(document).ready(function(){
	      $("#enlacemostrar").css("display","none");

	 //código a ejecutar cuando el DOM está listo para recibir instrucciones.
	$("#enlaceocultar").click(function(evento){ //para aplicar evento a nuestro enlaces
//$("a").click(function(evento){ //para aplicar evento a todos los enlaces
   //aquí el código que se debe ejecutar al hacer clic
   
   $("#foto_ppal").css("display","none");
      $("#enlaceocultar").css("display","none");
 $("#enlacemostrar").css("display","block");
   evento.preventDefault();
	});
	$("#enlacemostrar").click(function(evento){ //para aplicar evento a nuestro enlaces
//$("a").click(function(evento){ //para aplicar evento a todos los enlaces
   //aquí el código que se debe ejecutar al hacer clic
   
   $("#foto_ppal").css("display","block");
         $("#enlaceocultar").css("display","block");
$("#enlacemostrar").css("display","none");
	});

});
$(document).ready(function(){
	      $("#enlacemostrarbusca").css("display","none");

	 //código a ejecutar cuando el DOM está listo para recibir instrucciones.
	$("#enlaceocultarbusca").click(function(evento){ //para aplicar evento a nuestro enlaces
//$("a").click(function(evento){ //para aplicar evento a todos los enlaces
   //aquí el código que se debe ejecutar al hacer clic
   
   $("#buscador2").css("display","none");
      $("#enlaceocultarbusca").css("display","none");
 $("#enlacemostrarbusca").css("display","block");
   evento.preventDefault();
	});
	$("#enlacemostrarbusca").click(function(evento){ //para aplicar evento a nuestro enlaces
//$("a").click(function(evento){ //para aplicar evento a todos los enlaces
   //aquí el código que se debe ejecutar al hacer clic
   
   $("#buscador2").css("display","block");
         $("#enlaceocultarbusca").css("display","block");
$("#enlacemostrarbusca").css("display","none");
	});

});
$(document).ready(function(){
	      $("#enlacemostrarbuscahead").css("display","none");

	 //código a ejecutar cuando el DOM está listo para recibir instrucciones.
	$("#enlaceocultarbuscahead").click(function(evento){ //para aplicar evento a nuestro enlaces
//$("a").click(function(evento){ //para aplicar evento a todos los enlaces
   //aquí el código que se debe ejecutar al hacer clic
   
   $("#busqueda").css("display","none");
      $("#enlaceocultarbuscahead").css("display","none");
 $("#enlacemostrarbuscahead").css("display","block");
   evento.preventDefault();
	});
	$("#enlacemostrarbuscahead").click(function(evento){ //para aplicar evento a nuestro enlaces
//$("a").click(function(evento){ //para aplicar evento a todos los enlaces
   //aquí el código que se debe ejecutar al hacer clic
   
   $("#busqueda").css("display","block");
         $("#enlaceocultarbuscahead").css("display","block");
$("#enlacemostrarbuscahead").css("display","none");
	});

});