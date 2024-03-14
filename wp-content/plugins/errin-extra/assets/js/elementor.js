( function (jQuery, elementor) {
	"use strict";

   
    var ERRIN = {

        init: function () {
            
            var widgets = {

               'posts-grid-one-col.default': ERRIN.Posts_medium_list_load,
			   //'posts-block.default': EVIOR.MainSlider,

               
		          
            };
			
            jQuery.each(widgets, function (widget, callback) {
                elementorFrontend.hooks.addAction('frontend/element_ready/' + widget, callback);
            });
           
      },

      
         
         /* ----------------------------------------------------------- */
         /*   Post grid ajax load
         /* ----------------------------------------------------------- */
         
         Posts_medium_list_load:function(jQueryscope){
			 
            var jQuerycontainer = jQueryscope.find('.errin-load-more-btn');
			
            if (jQuerycontainer.length > 0) {
               jQuerycontainer.on('click',function(event){
                  event.preventDefault();
                  if (jQuery.active > 0) {
                     return;    
                   }
                  var jQuerythat = jQuery(this);
                  var ajaxjsondata = jQuerythat.data('json_grid_meta');
                  var errin_json_data = Object (ajaxjsondata);

                  var contentwrap = jQueryscope.find('.grid-loadmore-content'), // item contentwrap
				  
                     postperpage = parseInt(errin_json_data.posts_per_page), // post per page number
                     showallposts = parseInt(errin_json_data.total_post); // total posts count

                     var items = contentwrap.find('.grid-item'),
                     totalpostnumber = parseInt(items.length),
                     paged =  parseInt( totalpostnumber / postperpage ) + 1; // paged number

                     jQuery.ajax({
                        url: errin_ajax.ajax_url,
                        type: 'POST',
                        data: {action: 'errin_post_ajax_loading',ajax_json_data: ajaxjsondata,paged:paged},
                        beforeSend: function(){

                           jQuery('<i class="ts-icon ts-icon-spinner fa-spin" style="margin-left:10px"></i>').appendTo( "#errin-load-more-btn" ).fadeIn(100);
                        },
                        complete:function(){
                           jQueryscope.find('.errin-load-more-btn .fa-spinner ').remove();
                        }
                     })

                     .done(function(data) {

                           var jQuerypstitems = jQuery(data);
                           jQueryscope.find('.grid-loadmore-content').append( jQuerypstitems );
                           var newLenght  = contentwrap.find('.grid-item').length;

                           if(showallposts <= newLenght){
                              jQueryscope.find('.errin-load-more-btn').fadeOut(300,function(){
                                 jQueryscope.find('.errin-load-more-btn').remove();
                              });
                           }

                     })

                     .fail(function() {
                        jQueryscope.find('.errin-load-more-btn').remove();
                     });

               });
         }


         },
         

    };
	
    jQuery(window).on('elementor/frontend/init', ERRIN.init);

         
    
}(jQuery, window.elementorFrontend) ); 