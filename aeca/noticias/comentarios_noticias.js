// JavaScript Document
function gracias()	{
		comentario = document.getElementById('comentario').value;
        comentario = comentario.replace(/^\s*|\s*$/g,""); //para quitar espacios al principio o final 
							if(comentario.length <1 ||/^\s+$/.test(comentario)){
                                
                                alert("El campo 'Comentario' ha de contener caracteres...");
                                document.registro.comentario.focus()			
                                return false;
                            }		
        					else if( !(/^[0-9a-zA-Z\u00f1\u00d1\u00e9\u00ed\u00f3\u00fa\u00e1\u00c1\u00c9\u00cd\u00d3\u00da\u00fc\u00a1\u00bf\u00aa\u00ba\u20a0\s\-\;\:\$\'\,\.\?\!\(\)]+$/.test(comentario))){	
                                alert("Ha introducido caracteres no permitidos en el campo 'Comentario'");
                                document.registro.comentario.focus()			
                                return false;
							}
								
  							else if(comentario.length>500){
                                
                                alert("El campo 'Comentario' puede contener un máximo de 500 caracteres...");
                                document.registro.comentario.focus()			
                                return false;
                            }                           
                            
                        
                            else{
                               
                                document.getElementById('comentario').value=comentario	   
								alert("Gracias, lo publicaremos lo antes posible");
								return true;
                            } 
	}