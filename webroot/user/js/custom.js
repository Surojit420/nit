$(document).ready(function(){
  new WOW().init();

  /*Active menu start*/
    $(".header-pages .main-menu").click(function(){
       $(this).addClass('active').siblings().removeClass('active');
       $(this).toggleClass("open");
       $(this).siblings().removeClass("open");
    });
  /*Active menu end*/

	// Banner Slick slider
    $(".banner-slider").slick({
      dots: false,
      infinite: true,
      autoplay:true,
      adaptiveHeight: true,
      nextArrow: '<i class="slick-next animate__animated animate__backInRight"></i>',
      prevArrow: '<i class="slick-prev animate__animated animate__backInLeft"></i>',
    });
  // End banner slick-slider

  /*History single slider start*/
    $('.history-single').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: false,
      adaptiveHeight: true,
      infinite: true,
      useTransform: true,
      speed: 400,
      autoplay:false,
      cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
     });

     $('.history-nav')
      .on('init', function(event, slick) {
        $('.history-nav .slick-slide.slick-current').addClass('is-active');
      })
      .slick({
        slidesToShow: 6,
        slidesToScroll: 6,
        dots: false,
        focusOnSelect: false,
        arrows: false,
        infinite: true,
        responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 5,
          }
        }, {
          breakpoint: 768,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
          }
        }, {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
        }
        }]
    });


    $('.history-single').on('afterChange', function(event, slick, currentSlide) {
      $('.history-nav').slick('slickGoTo', currentSlide);
      var currrentNavSlideElem = '.history-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
      $('.history-nav .slick-slide.is-active').removeClass('is-active');
      $(currrentNavSlideElem).addClass('is-active');
    });

    $('.history-nav').on('click', '.slick-slide', function(event) {
      event.preventDefault();
      var goToSingleSlide = $(this).data('slick-index');

      $('.history-single').slick('slickGoTo', goToSingleSlide);
    });
  /*History single slider end*/

  // Sticky Header start
    $(window).scroll(function() {

        if ($(window).scrollTop() > 100) {
            $('.main_h').addClass('sticky');
        } else {
            $('.main_h').removeClass('sticky');
        }
    });

    // Mobile Navigation
    $('.mobile-toggle').click(function() {
        if ($('.main_h').hasClass('open-nav')) {
            $('.main_h').removeClass('open-nav');
        } else {
            $('.main_h').addClass('open-nav');
        }
    });

    // $('.main_h li .menu').click(function() {
    //     if ($('.main_h').hasClass('open-nav')) {
    //         $('.navigation').removeClass('open-nav');
    //         $('.main_h').removeClass('open-nav');
    //     }
    // });

    // navigation scroll lijepo radi materem
    // $('nav a').click(function(event) {
    //     var id = $(this).attr("href");
    //     var offset = 70;
    //     var target = $(id).offset().top - offset;
    //     $('html, body').animate({
    //         scrollTop: target
    //     }, 500);
    //     event.preventDefault();
    // });
  //Sticky Header End

  /*Back to top start*/
    var btn = $('#back-to-top');

    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });

    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
    });
  /*Back to top end*/

  // job-card Slick slider
    $(".job-card").slick({
      dots: false,
      infinite: true,
      autoplay:true,
      adaptiveHeight: true,
      arrows: false,
    });
  // End job-card slick-slider

  /*Work slider start*/
    $(".work-slider").slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      adaptiveHeight: true,
      nextArrow: '<i class="slick-next wow shake"></i>',
      prevArrow: '<i class="slick-prev wow shake"></i>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true,
          }
        },
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
  /*Work slider end*/

  /*Toggle call option start*/
    $('#show-hidden-menu').click(function() {
      $("#show-icon").toggleClass("open");
      $('.call-widget-body').slideToggle("slow");
      // Alternative animation for example
      // slideToggle("fast");
    });
  /*Toggle call end*/
  
});

/*Countdown numbers start*/
  (function($) {
      'use strict';

      $('.count-number').rCounter();
  })(jQuery);
/*Countdown number end*/

/*------Live chat start------*/
  hideChat(0);

  $('#prime').click(function() {
    toggleFab();
  });


  //Toggle chat and links
  function toggleFab() {
    $('.prime').toggleClass('zmdi-comment-outline');
    $('.prime').toggleClass('zmdi-close');
    $('.prime').toggleClass('is-active');
    $('.prime').toggleClass('is-visible');
    $('#prime').toggleClass('is-float');
    $('.chat').toggleClass('is-visible');
    $('.fab').toggleClass('is-visible');
    
  }

    $('#chat_first_screen').click(function(e) {
          hideChat(1);
    });

    $('#chat_second_screen').click(function(e) {
          hideChat(2);
    });

    $('#chat_third_screen').click(function(e) {
          hideChat(3);
    });

    $('#chat_fourth_screen').click(function(e) {
          hideChat(4);
    });

    $('#chat_fullscreen_loader').click(function(e) {
        $('.fullscreen').toggleClass('zmdi-window-maximize');
        $('.fullscreen').toggleClass('zmdi-window-restore');
        $('.chat').toggleClass('chat_fullscreen');
        $('.fab').toggleClass('is-hide');
        $('.header_img').toggleClass('change_img');
        $('.img_container').toggleClass('change_img');
        $('.chat_header').toggleClass('chat_header2');
        $('.fab_field').toggleClass('fab_field2');
        $('.chat_converse').toggleClass('chat_converse2');
        //$('#chat_converse').css('display', 'none');
       // $('#chat_body').css('display', 'none');
       // $('#chat_form').css('display', 'none');
       // $('.chat_login').css('display', 'none');
       // $('#chat_fullscreen').css('display', 'block');
    });

  function hideChat(hide) {
      switch (hide) {
        case 0:
              $('#chat_converse').css('display', 'none');
              $('#chat_body').css('display', 'none');
              // $('#chat_form').css('display', 'none');
              $('.chat_login').css('display', 'block');
              // $('.chat_fullscreen_loader').css('display', 'none');
               $('#chat_fullscreen').css('display', 'none');
              break;
        case 1:
              $('#chat_converse').css('display', 'block');
              $('#chat_body').css('display', 'none');
              // $('#chat_form').css('display', 'none');
              $('.chat_login').css('display', 'none');
              $('.chat_fullscreen_loader').css('display', 'block');
              break;
        case 2:
              $('#chat_converse').css('display', 'none');
              $('#chat_body').css('display', 'block');
              // $('#chat_form').css('display', 'none');
              $('.chat_login').css('display', 'none');
              $('.chat_fullscreen_loader').css('display', 'block');
              break;
        case 3:
              $('#chat_converse').css('display', 'none');
              $('#chat_body').css('display', 'none');
              $('#chat_form').css('display', 'block');
              $('.chat_login').css('display', 'none');
              $('.chat_fullscreen_loader').css('display', 'block');
              break;
        case 4:
              $('#chat_converse').css('display', 'none');
              $('#chat_body').css('display', 'none');
              // $('#chat_form').css('display', 'none');
              $('.chat_login').css('display', 'none');
              $('.chat_fullscreen_loader').css('display', 'block');
              $('#chat_fullscreen').css('display', 'block');
              break;
      }
  }

/*Live chat end*/

function show_less(id) 
{
 $('#more_'+id).show();
 $('#less_'+id).hide();
}

function show_more(id) 
{
 $('#more_'+id).hide();
 $('#less_'+id).show();
}

