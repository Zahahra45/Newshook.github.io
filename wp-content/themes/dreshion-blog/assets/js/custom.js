jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader = $('#loader');
    var loader_container = $('#preloader');
    var scroll = $(window).scrollTop();  
    var scrollup = $('.totop');
    var menu_toggle = $('.menu-toggle');
    var dropdown_toggle = $('button.dropdown-toggle');
    var nav_menu = $('.main-navigation ul.nav-menu');
    var featured_slider = $('#featured-slider');
    var category_slider = $('#category-list .category-slider');
    var trending = $('.trending-slider');
    var regular = $('.regular');
    var masonry_gallery = $('.grid');


/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");
/*------------------------------------------------
                BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
                MENU, STICKY MENU AND SEARCH
------------------------------------------------*/

    $('#top-menu > svg.dropdown-icon').click(function(){
        $('#top-menu .wrapper').slideToggle();
        $('#top-menu').toggleClass('top-menu-active');
    });

    menu_toggle.click(function(){
        nav_menu.slideToggle();
       $('.main-navigation').toggleClass('menu-open');
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 150) {
            $('.site-header').addClass('nav-shrink');             
        } 
        else {
            $('.site-header').removeClass('nav-shrink');
        }
    });

    $('.main-navigation ul li a.search').click(function() {
        $(this).toggleClass('search-open');
        $('.main-navigation #search').toggle();
        $('.main-navigation .search-field').focus();
        $('body').addClass('search-open');
    });

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('.main-navigation .search').removeClass('search-open');
            $('.main-navigation #search').hide();
            $('body').removeClass('search-open');
        }
    });

    $(document).click(function (e) {
      var container = $("#masthead");
       if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.main-navigation .search').removeClass('search-open');
            $('.main-navigation #search').hide();
            $('body').removeClass('search-open');
        }
    });

/*------------------------------------------------
                SLICK SLIDERS
------------------------------------------------*/

$('.slider-posts').slick();

featured_slider.slick({
    responsive: [
    {
    breakpoint: 992,
        settings: {
            slidesToShow: 1,
            arrows: false,
            dots: false
        }
    },
    {
        breakpoint: 767,
            settings: {
            slidesToShow: 1,
            arrows: false
        }
    }
    ]
    });

trending.slick({
    responsive: [
    {
    breakpoint: 992,
        settings: {
            slidesToShow: 2,
            arrows: false,
            dots: false
        }
    },
    {
        breakpoint: 767,
            settings: {
            slidesToShow: 1,
            arrows: false
        }
    }
    ]
    });

category_slider.slick({
    responsive: [
    {
    breakpoint: 1024,
        settings: {
            slidesToShow: 5,
            arrows: false,
            dots: false
        }
    },
    {
    breakpoint: 992,
        settings: {
            slidesToShow: 4,
            arrows: false,
            dots: false
        }
    },
    {
        breakpoint: 567,
            settings: {
            slidesToShow: 2,
            arrows: false
        }
    }
    ]
    });
$(".category-slider").show(); 

    
/*--------------------------------------------------------------
 Keyboard Navigation
----------------------------------------------------------------*/
if( $(window).width() < 1024 ) {
        $( '#primary-menu > li:last-child' ).bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });
    }
    else {
        $( '#primary-menu > li:last-child' ).unbind('keydown');
    }
    $(window).resize(function() {
        if( $(window).width() < 1024 ) {
            $( '#primary-menu > li:last-child' ).bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        }
        else {
            $( '#primary-menu > li:last-child' ).unbind('keydown');
        }
    });


/*------------------------------------------------
            MASONRY GALLERY
------------------------------------------------*/
    
    masonry_gallery.imagesLoaded( function() {
        masonry_gallery.packery({
            itemSelector: '.grid-item'
        });
    });

/*------------------------------------------------
                    STICKY-BAR
------------------------------------------------*/
    jQuery('#secondary').theiaStickySidebar({
        // Settings
        additionalMarginTop: 30
      });

/*------------------------------------------------
            MATCH HEIGHT
------------------------------------------------*/
$('#latest-featured .shadow-entry-container').matchHeight();
$('#popular article').matchHeight();

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});