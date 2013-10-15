// JavaScript Document
$(document).ready(function(){
  
    $('.b').hide();
	   $('.c').hide();
	      $('.d').hide();
 
});
		$(document).ready(function(){
			
			$('.aa').click(function(){
				$('.a').hide();
				$('.b').show();
				$('.c').hide();
				$('.d').hide();

			});
			$('.bb').click(function(){
				$('.c').show();
				$('.a').hide();
				$('.b').hide();
				$('.d').hide();

			});
			$('.cc').click(function(){
				$('.d').show();
				$('.a').hide();
				$('.b').hide();
				$('.c').hide();

			})
			
		});