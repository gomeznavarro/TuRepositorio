

var entradas = [
  {
    "termino": "CONSTANCIA",
    "parte": "n.",
    "definicion": "Firmeza y perseverancia del &aacute;nimo en las resoluciones y en los prop&oacute;sitos. Acci&oacute;n y efecto de hacer constar algo de manera fehaciente. Certeza, exactitud de alg&uacute;n hecho o dicho. Escrito en que se ha hecho constar alg&uacute;n acto o hecho, a veces de manera fehaciente."
  },
  {
	  "termino":"CORREDOR",
	  "parte" :"adj.",
      "definicion": "Aqui el tecto a incluir."
  }
  
 ]; 


var html = '';
  
$.each(entradas, function() {
  html += '<div class="entrada">';
  html += '<h3 class="termino">' + this['termino'] + '</h3>';
  html += '<div class="parte">' + this['parte'] + '</div>';
  html += '<div class="definicion">' + this['definicion'] + '</div>';
  html += '</div>';
});

$('#diccionario').html(html);



  
  
  
  
  
  
  
  
  
  
  







































