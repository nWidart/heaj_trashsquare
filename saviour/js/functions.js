/* ==================================================

Custom jQuery functions

================================================== */

jQuery(document).ready(function() {

    if(!jQuery.browser.mobile) {


        /////////////////////////////////////////////
        // Post Sliders
        /////////////////////////////////////////////

        if ($().nivoSlider ) {
            $('.post-slider').nivoSlider({
                effect: 'fade', // Specify sets like: 'fold,fade,sliceDown'
                slices: 15, // For slice animations
                boxCols: 8, // For box animations
                boxRows: 4, // For box animations
                animSpeed: 500, // Slide transition speed
                pauseTime: 4000, // How long each slide will show
                startSlide: 0, // Set starting Slide (0 index)
                directionNav: false, // Next & Prev navigation
                directionNavHide: true, // Only show on hover
                controlNav: false, // 1,2,3... navigation
                controlNavThumbs: false, // Use thumbnails for Control Nav
                controlNavThumbsFromRel: true, // Use image rel for thumbs
                controlNavThumbsSearch: '.jpg', // Replace this with...
                controlNavThumbsReplace: '_thumb.jpg', // ...this in thumb Image src
                keyboardNav: false, // Use left & right arrows
                pauseOnHover: false, // Stop animation while hovering
                manualAdvance: false, // Force manual transitions
                captionOpacity: 0, // Universal caption opacity
                borderRadius: 0
            });
        };
    

        /////////////////////////////////////////////
        // Pretty Photo
        /////////////////////////////////////////////

        $("a[rel^='prettyPhoto']").prettyPhoto();
    }


    /////////////////////////////////////////////
    // Navigation Hover
    /////////////////////////////////////////////

    $('#main-navigation ul').superfish({
        delay: 150,
        animation: {opacity:'show', height:'show'},
        speed: 'fast',
        autoArrows: false,
        dropShadows: false
    });
    

    /////////////////////////////////////////////
    // Image hovers
    /////////////////////////////////////////////

    $('.hover-image img, .post-slider, .slider-hover').live({
        mouseenter: function() { 
           $(this).stop().fadeTo(300, 0.3);
        },
        mouseleave: function() {
           $(this).stop().fadeTo(400, 1);
        }
    });


    /////////////////////////////////////////////
    // Load Latest Tweets
    /////////////////////////////////////////////

    $("#tweets").getTwitter({
        userName: "NicolasWidart",
        numTweets: 3,
        loaderText: "Loading tweets...",
        slideIn: false,
        showHeading: false,
        headingText: "",
        showProfileLink: false
    });


    /////////////////////////////////////////////
    // Load Flickr Photos
    /////////////////////////////////////////////

    $flickr_id = "37965182@N08";    // Replace this value with your Flickr ID
    $flickr_count = "9"             // The number of photos you want to show

    $.getJSON('http://api.flickr.com/services/feeds/photos_public.gne?id=' + $flickr_id + '&lang=en-us&format=json&jsoncallback=?', function(data){
        $.each(data.items, function(i,item){
            if(i < $flickr_count){
                $("<img class='flickr'/>").attr("src", item.media.m).appendTo("#flickr ul").wrap("<li><a class='flickr-img-link' href='" + item.link + "' target='_blank' title='Flickr'></a></li>");
            }
        });
    });


    /////////////////////////////////////////////
    // Portfolio Sorting
    /////////////////////////////////////////////

    (function($) {

        $.fn.sorted = function(newOptions) {
            var options = {
              reversed: false,
              by: function(a) { return a.text(); }
            };

            $.extend(options, newOptions);

            $data = $(this);
            array = $data.get();

            return $(array);
    
        };

    })(jQuery);

    jQuery(function() {

        var read_button = function(class_names) {
            
            var r = {
                selected: false,
                type: 0
            };
            
            for (var i=0; i < class_names.length; i++) {
                
                if (class_names[i].indexOf('selected-') == 0) {
                    r.selected = true;
                }
            
                if (class_names[i].indexOf('segment-') == 0) {
                    r.segment = class_names[i].split('-')[1];
                }
            };
            
            return r;
            
        };
    
        var sort = function($buttons) {
            var $selected = $buttons.parent().filter('[class*="selected"]');
            return $selected.find('a').attr('data-value');
        };

        // get the first collection
        var $portfolio_items = jQuery('.portfolio-items');

        // clone applications to get a second collection
        var $data = $portfolio_items.clone();

        var $filter_selection = jQuery('#portfolio-filter')

        $filter_selection.each(function(i) {

            var $selection = jQuery(this);
            var $buttons = $selection.find('a');

            $buttons.bind('click', function(e) {
        
                var $button = jQuery(this);
                var $button_container = $button.parent();
                var button_properties = read_button($button_container.attr('class').split(' '));
                var selected = button_properties.selected;

                if (!selected) {

                    $buttons.parent().removeClass();
                    $button_container.addClass('selected');

                    var sorting = sort($filter_selection.eq(0).find('a'));

                    if (sorting == 'all') {
                        var $filtered_data = $data.find('li');
                    } else {
                        var $filtered_data = $data.find('li.' + sorting);
                    }

                    var $sorted_data = $filtered_data.sorted({
                        by: function(v) {
                            return $(v).find('strong').text().toLowerCase();
                        }
                    });

                    $portfolio_items.quicksand($sorted_data, {
                      duration: 400,
                      adjustHeight: 'dynamic',
                      easing: 'swing'
                    });
        
                }
            
                e.preventDefault();

            });
        });

    });
    
    /////////////////////////////////////////////
    // YouTube iframe fix
    /////////////////////////////////////////////

	jQuery("iframe").each(function(){
        var ifr_source = $(this).attr('src');
        var wmode = "wmode=transparent";
        if(ifr_source.indexOf('?') != -1) {
            var getQString = ifr_source.split('?');
            var oldString = getQString[1];
            var newString = getQString[0];
            $(this).attr('src',newString+'?'+wmode+'&'+oldString);
        }
        else $(this).attr('src',ifr_source+'?'+wmode);
    });

});