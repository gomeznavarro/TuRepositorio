// JavaScript Document


			function startGallery() {
				var myGallery = new gallery($('myGallery'), {
					timed: true,
					defaultTransition: "fadeslideleft"

				});
			}
			window.addEvent('domready',startGallery);
	
			
			/******/
			
			 function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
	
	/**
<!--UTIL PARA QUITAR Y PONER ALGO, SOLO CON PONER RATON NECIMA mootools!!
<script type="text/javascript">
window.addEvent('domready',function() {
    $$('#gallery a').addEvents({
        mouseleave: function() {
           $$('#gallery .content').addClass('ocultar');
        },
        mouseenter: function() {
            $$('#gallery .content').removeClass('ocultar');
        }
    });
});
</script>-->

<!--<script type="text/javascript">

window.addEvent('domready', function() {
		$$('#gallery h1').toggle(function(){
		$$('#gallery .content').addClass('ocultar');
	}, function(){
		
			$('#gallery .content').removeClass('ocultar');
	});
});

</script>

**/