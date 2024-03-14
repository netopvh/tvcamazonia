(function($) {
    "use strict";

		
		
		/*--------------------------------------------
            Search Popup
        ---------------------------------------------*/
        var bodyOvrelay =  $('#body-overlay');
        var searchPopup = $('#search-popup');

        $(document).on('click','#body-overlay',function(e){
            e.preventDefault();
        bodyOvrelay.removeClass('active');
            searchPopup.removeClass('active');
        });
        $(document).on('click','.search-box-btn',function(e){
            e.preventDefault();
            searchPopup.addClass('active');
        bodyOvrelay.addClass('active');
        });	
		
		
		/* ----------------------------------------------------------- */
		/*  Back to top
		/* ----------------------------------------------------------- */

		$(window).scroll(function () {
			if ($(this).scrollTop() > 300) {
				 $('.backto').fadeIn();
			} else {
				 $('.backto').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('.backto').on('click', function () {
			 $('.backto').tooltip('hide');
			 $('body,html').animate({
				  scrollTop: 0
			 }, 800);
			 return false;
		});
		
		
		jQuery('.mainmenu ul.menu').slicknav({
            allowParentLinks: true,
			prependTo: '.errin-responsive-menu',
			closedSymbol: "&#8594",
			openedSymbol: "&#8595",
        });
		
		jQuery(window).load(function() {
			jQuery("#preloader").fadeOut();
		});
		

	/* ----------------------------------------------------------- */
		/*  Sticky Header
	/* ----------------------------------------------------------- */
	
	$(window).on('scroll', function(event) {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $(".stick-top").removeClass("sticky");
        } else {
            $(".stick-top").addClass("sticky");
        }
    });		
		
	
	
})(jQuery);