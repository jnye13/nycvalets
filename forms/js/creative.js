/*!
 * Start Bootstrap - Creative Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

(function($) {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    })

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Fit Text Plugin for Main Header
    $("h1").fitText(
        1.2, {
            minFontSize: '35px',
            maxFontSize: '65px'
        }
    );

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })

    // Initialize WOW.js Scrolling Animations
    new WOW().init();


    $('.noWidows2').each(function(i,d){ 
    var value="&nbsp;";
    $(d).html($(d).text().replace(/\s(?=[^\s]*$)/g, value).replace(/\s(?=[^\s]*$)/g, value)); 
    });
 

})(jQuery); // End of use strict

$(document).ready(function(){

    var form = $('#container_form');
    form.load('/forms/ajax/message_form.html');


    $('#maid_service').click(function(){
        form.load('/forms/ajax/maid_service.html');
    });

    $('#aptmnt_sitting').click(function(){
        form.load('/forms/ajax/aptmnt_sitting.html');
    });

    $('#package_delivery').click(function(){
        form.load('/forms/ajax/package_delivery.html');
    });

    $('#pet_service').click(function(){
        form.load('/forms/ajax/pet_service.html');
    });

    $('#upholstery_cleaning').click(function(){
        form.load('/forms/ajax/upholstery_cleaning.html');
    });

    $('#errands').click(function(){
        form.load('/forms/ajax/errands.html');
    });

    $('#rug_cleaning').click(function(){
        form.load('/forms/ajax/rug_cleaning.html');
    });

    
    var $forms = $('.nycform');
    $forms.click(function(){
        $forms.removeClass('active');
        $(this).addClass('active');
    })

});
