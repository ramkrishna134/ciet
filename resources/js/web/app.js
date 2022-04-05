require('./bootstrap');

$(document).ready(function (){

    $('.home-slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        cssEase: 'linear'
    });

    $('.digital-slider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,

        responsive: [
            {
              breakpoint: 1023,
              settings: {
                slidesToShow: 2
              }
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 1
              }
            }
          ]
    });

    $('.ongoing-slider').slick({
      dots: true,
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,

      responsive: [
        {
          breakpoint: 1023,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });

    $('.partner-slider').slick({
        dots: false,
        arrows: false,
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,

        responsive: [
            {
              breakpoint: 1023,
              settings: {
                slidesToShow: 3
              }
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 2
              }
            }
          ]
    });
    
    // $('.slider-for').slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     arrows: false,
    //     fade: true,
    //     asNavFor: '.slider-nav'
    //   });
    //   $('.slider-nav').slick({
    //     slidesToShow: 3,
    //     slidesToScroll: 1,
    //     asNavFor: '.slider-for',
    //     dots: true,
    //     centerMode: true,
    //     focusOnSelect: true
    //   });

})


$(window).scroll(function () {

    var $header = $('.header');
    var height = $('.count-height').height();

    var top = $(window).scrollTop();

    if (top >= height){

        if( !$header.hasClass('active') ){
            $header.addClass('active')
        }
    }
    else {
        if( $header.hasClass('active') ){
            $header.removeClass('active')
        }
    }



});

