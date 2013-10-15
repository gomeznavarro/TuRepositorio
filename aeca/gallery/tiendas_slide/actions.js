$(function () {

    // =================================================
    // = Comportamiento de los elementos de formulario =
    // =================================================
    $('input[type="text"]').focus(function () {
        $(this).parent().parent().addClass('textFocus');
        if ($(this).val() == '') {
            $(this).prev('span').stop().fadeTo('fast', 0.5);
        }
    });
    $('input[type="text"]').blur(function () {
        $(this).parent().parent().removeClass('textFocus');
        if ($(this).val() == '') {
            $(this).prev('span').stop().fadeTo('fast', 1);
            // $('input[type="text"]').unbind('keydown.lbltext');
        }
    });
    $('input[type="text"]').bind('keydown.lbltext', function () {
        $(this).prev('span').stop().fadeTo('fast', 0);
    });


    //  links externos en una pÃ¡gina nueva

    $('#container a[href^="http://"], #footer a[href^="http://"]').click(function (e) {
        e.preventDefault();
        window.open($(this).attr('href'));
    });





    
 

});



// slide home

$(window).load(function() {
 $('.flexslider').flexslider({
        animation: "fade",              //String: Select your animation type, "fade" or "slide"
        slideDirection: "horizontal",   //String: Select the sliding direction, "horizontal" or "vertical"
        slideshow: true,                //Boolean: Animate slider automatically
        slideshowSpeed: 5000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
        animationDuration: 600,         //Integer: Set the speed of animations, in milliseconds
        directionNav: false,             //Boolean: Create navigation for previous/next navigation? (true/false)
        controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        keyboardNav: true,              //Boolean: Allow slider navigating via keyboard left/right keys
        mousewheel: false,              //Boolean: Allow slider navigating via mousewheel
        prevText: "Previous",           //String: Set the text for the "previous" directionNav item
        nextText: "Next",               //String: Set the text for the "next" directionNav item
        pausePlay: true,               //Boolean: Create pause/play dynamic element
        pauseText: 'Pause',             //String: Set the text for the "pause" pausePlay item
        playText: 'Play',               //String: Set the text for the "play" pausePlay item
        randomize: false,               //Boolean: Randomize slide order
        slideToStart: 0,                //Integer: The slide that the slider should start on. Array notation (0 = first slide)
        animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
        pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
        pauseOnHover: false,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
        controlsContainer: "",          //Selector: Declare which container the navigation elements should be appended too. Default container is the flexSlider element. Example use would be ".flexslider-container", "#container", etc. If the given element is not found, the default action will be taken.
        manualControls: ".steps li",             //Selector: Declare custom control navigation. Example would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
        start: function(){},            //Callback: function(slider) - Fires when the slider loads the first slide
        before: function(){},           //Callback: function(slider) - Fires asynchronously with each slider animation
        after: function(){},            //Callback: function(slider) - Fires after each slider animation completes
        end: function(){}               //Callback: function(slider) - Fires when the slider reaches the last slide (asynchronous)    
    });
    
    
});