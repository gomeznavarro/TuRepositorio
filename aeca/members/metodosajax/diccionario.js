
/*$(document).ready(function() {
  $('#letra-a .boton').click(function() {
    $('#diccionario').load('a.html');	
  });
});*/







$(document).ready(function() {
 $('#letra-a .boton').click(function() {
 $('#diccionario').hide().load('a.html', function() {
 $(this).fadeIn();
 });
 });
});



/*$(document).ready(function() {
  var vincularComportamientos = function() {
    $('h3').click(function() {
      $(this).toggleClass('destacado');
    });
  };
   vincularComportamientos();

});*/




/*$(document).ready(function() {
  var vincularComportamientos = function(alcance) {
    $('h3', alcance).click(function() {
      $(this).toggleClass('destacado');
    });
  };
   vincularComportamientos(this);


  

  $('#letra-a .boton').click(function() {
    $('#diccionario').hide().load('a.html', function() {
      vincularComportamientos(this);
      $(this).fadeIn();
    });
  });
  });*/















/*$(document).ready(function() {
  var bindBehaviors = function(scope) {
    $('h3', scope).click(function() {
      $(this).toggleClass('destacado');
    });
  };

  bindBehaviors(this);

  $('#letra-a .boton').click(function() {
    $('#diccionario').hide().load('a.html', function() {
      bindBehaviors(this);
      $(this).fadeIn();
    });
  });
});*/










/*$(document).ready(function() {
  $('#letra-b .boton').click(function() {
    $.getJSON('b.json', function(data) {
		$('#diccionario').empty();						 
		$.each(data, function(indiceEntrada, entrada) {	
		var html = '<div class="entrada">';
        html += '<h3 class="termino">' + entrada['termino'] + '</h3>';
        html += '<div class="parte">' + entrada['parte'] + '</div>';
        html += '<div class="definicion">';
        html += entrada['definicion'];
		html += '</div>';
        html += '</div>';
        $('#diccionario').append($(html));
      });
								 
       });
	});
});*/

$(document).ready(function() {
  $('#letra-b .boton').click(function() {	
    $.getJSON('b.json', function(data) {
      $('#diccionario').empty();	  
      $.each(data, function(indiceEntrada, entrada) {		
        var html = '<div class="entrada">';
        html += '<h3 class="termino">' + entrada['termino'] + '</h3>';
        html += '<div class="parte">' + entrada['parte'] + '</div>';
        html += '<div class="definicion">';
        html += entrada['definicion'];
        if (entrada['cita']) {
          html += '<div class="cita">';
          $.each(entrada['cita'], function(indiceLinea, linea) {
            html += '<div class="cita-linea">' + linea + '</div>';
          });
          if (entrada['autor']) {
            html += '<div class="cita-autor">' + entrada['autor'] +
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
  $('#letra-c .boton').click(function() {
    $.getScript('c.js');
  });
});



/*$(document).ready(function() {
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
});*/





























$(document).ready(function() {
 $('#letra-d .boton').click(function() {
 $.get('d.xml', function(data) {
 $('#diccionario').empty();
 
 
 $(data).find('entrada[cita[@autor]]').each(function() {
													 
													 
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







/*$(document).ready(function() {
 $('#letra-e a').click(function() {
 $.get('e.php', {'termino': $(this).text()}, function(data) {
 $('#diccionario').html(data);
 });
 return false;
 });
});*/






$(document).ready(function() {
 $('#letra-e a').click(function() {
 $('#diccionario').load('e.php', {'termino': $(this).text()});
 return false;
 });
});


/*$(document).ready(function() {
 $('#letra-e a').click(function() {
 $.post('e.php', {'termino': $(this).text()}, function(data) {
 $('#diccionario').html(data);
 });
 return false;
 });
});*/

/*$(document).ready(function() {
 $('#letra-e a').click(function() {
 $('#diccionario').load('e.php', {'termino': $(this).text()});
 return false;
 });
});*/




												 
									
									
									







 









/*$(document).ready(function() {
 $('#letra-f form').submit(function() {
 $('#diccionario').load('f.php', {'termino': $('input[@name="termino"]').
val()});
 return false;
 });
});*/




$(document).ready(function() {
 $('#letra-f form').submit(function() {
 $.get('f.php', $(this).find('input').serialize(), function(data)
 {
 $('#diccionario').html(data);
 });
 return false;
 });
});





/*$(document).ready(function() {
 $('#cargando').ajaxStart(function() {
 $(this).show();
 });
});*/



/*$(document).ready(function() {
 $('#cargando').ajaxStart(function() {
 $(this).show();
 }).ajaxStop(function() {
 $(this).hide();
 });
});*/


$(document).ready(function() {
 $('#cargando_imagen').ajaxStart(function() {
 $(this).show();
 }).ajaxStop(function() {
 $(this).hide();
 });
});







/*$(document).ready(function() {
  $('h3').click(function() {
    $(this).toggleClass('destacado');
  });
});*/


$(document).ready(function() {
  $('body').click(function(event) {
    if ($(event.target).is('h3')) {
      $(event.target).toggleClass('destacado');
    }
  });
});



















