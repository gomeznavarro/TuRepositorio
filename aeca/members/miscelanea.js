$(document).ready(function() {
 $('#letra-a .boton').click(function() {
 $('#diccionario').hide().load('a.html', function() {
 $(this).fadeIn();
 });
 });
});


$(document).ready(function() {
  $('#ofertas .boton').click(function() {	
    $.getJSON('ofertas.json', function(data) {
      $('#diccionario').empty();	  
      $.each(data, function(indiceEntrada, entrada) {		
        var html = '<div class="entrada">';
        html += '<h3 class="termino">' + entrada['title'] + '</h3>';
        html += '<div class="parte">' + entrada['price'] + '&#8364;</div>';
		html += '<div class="parte"><a href="../tienda/show_shop.php?shopid=' + entrada['shopid'] + '">Detalles y compra</a></div>';

        html += '<div class="definicion">';
        html += entrada['caract'];
        if (entrada['definicion']) {
          html += '<div class="cita">';
          $.each(entrada['shopid'], function(indiceLinea, linea) {
            html += '<div class="cita-linea">' + linea + '</div>';
          });
          if (entrada['author']) {
            html += '<div class="cita-autor">' + entrada['author'] +
                                                           '</div>';
          }
          html += '</div>';
        }
        html += '</div>';
        html += '</div>';		
        $('#diccionario').append($(html));
		
      });
    });
  });
});

$(document).ready(function() {
  $('#users .boton').click(function() {	
    $.getJSON('users.json', function(data) {
      $('#diccionario').empty();	  
      $.each(data, function(indiceEntrada, entrada) {		
        var html = '<div class="entrada">';
        html += '<h3 class="termino">' + entrada['username'] + '</h3>';
        html += '<div class="parte">' + entrada['firstName'] + '</div>';
		
        html += '<div class="definicion">';
        html += entrada['otherInterests'];
        if (entrada['definicion']) {
          html += '<div class="cita">';
          $.each(entrada['gender'], function(indiceLinea, linea) {
            html += '<div class="cita-linea">' + linea + '</div>';
          });
          if (entrada['joinDate']) {
            html += '<div class="cita-autor">' + entrada['txtPhone'] +
                                                           '</div>';
          }
          html += '</div>';
        }
        html += '</div>';
        html += '</div>';		
        $('#diccionario').append($(html));
		
      });
    });
  });
});




$(document).ready(function() {
 $('#letra-d .boton').click(function() {
 $.get('d.xml', function(data) {
 $('#diccionario').empty();
 
 
 $(data).find('entrada').each(function() {
													 
													 
 var $entrada = $(this);
 var html = '<div class="entrada">';
 html += '<h3 class="termino">' + $entrada.attr('termino') + '</h3>';
 html += '<div class="parte">' + $entrada.attr('parte') + '</div>';
 html += '<div class="definicion">'
 html += $entrada.find('definicion').text();
 var $cita = $entrada.find('cita');
 if ($cita.length) {
 html += '<div class="cita">';
 $cita.find('linea').each(function() {
 html += '<div class="cita-linea">' + $(this).text() +
 '</ div>';
 });
 if ($cita.attr('autor')) {
 html += '<div class="cita-autor">' +
 $cita.attr('autor') + '</div>';
 }
 html += '</div>';
 }
 html += '</div>';
 html += '</div>';
 $('#diccionario').append($(html));
 });
 });
 });
});





$(document).ready(function() {
 $('#cargando_imagen').ajaxStart(function() {
 $(this).show();
 }).ajaxStop(function() {
 $(this).hide();
 });
});

$(document).ready(function() {
  $('body').click(function(event) {
    if ($(event.target).is('h3')) {
      $(event.target).toggleClass('destacado');
    }
  });
});

