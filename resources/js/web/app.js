require('./bootstrap');


function ScrollInView( options ){

    var self = this;

    this.$win = $(window);
    this.$doc = $(document);
    this.$elements = null;

    this.options = $.extend({}, {
        selector: '.scroll-in-view',
        offset: 100
    }, options);

    // this.offset = 200;

    this.setup = function(){
        self.$elements = $( self.options.selector );
    };



    this.run = function () {
        if( !self.$elements ) return;
        self.$elements.each( detect );
    };


    function detect() {

        $element = $( this );

        if( !$element.hasClass('in-view') ){

            var v_top = self.$win.scrollTop();
            var v_bottom = v_top + self.$win.height() - self.options.offset;

            var e_top = $element.offset().top;



            if( e_top <= v_bottom ){
                $element.addClass('in-view');
            }
        }
    }



    this.$doc.ready( function () {
        self.setup();
        self.run();
    } );

    this.$win.scroll( this.run );


}

ScrollInView.initialize = function( options ){
    new ScrollInView( options );
};


ScrollInView.initialize({
    // selector: '.scroll-into',
    offset: 150
});




$(document).ready(function (){

  mobileMenu();
  topHead();
  smoothScroll();
  darkMode();

  $('.dropdown-submenu a.submenu').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });

  $('#_biggify').on('click', function(e) {
    e.preventDefault();
    var fontSize = $('html').css('font-size');
    var newFontSize = parseInt(fontSize)+1;
    
    if(newFontSize < 21){
      $('html').css('font-size', newFontSize+'px')
    }else{
      alert('Maximum Font size limit exceeded');
    }
    

    console.log(newFontSize);
    
  })
  
  $('#_smallify').on('click', function(e) {
    e.preventDefault();
    var fontSize = $('html').css('font-size');
    // console.log(fontSize);
    var newFontSize = parseInt(fontSize)-1;
    
    if(newFontSize > 12){
      $('html').css('font-size', newFontSize+'px')
    }else{
      alert('Minimum Font size limit exceeded');
    }
    
  })

  $('#sheduleTable').DataTable({
        dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength','print'
        ]
        
    });

    $('.dropdown-toggle').click(function(e){
      e.preventDefault();
    })

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
    
    lightGallery(document.getElementById('lightgallery'), {
        selector: 'a',
        thumbnail:true,
        animateThumb: true,
        showThumbByDefault: true
    }); 

})

function mobileMenu() {
    $('.navbar-toggle').click(function(e){
      e.preventDefault();
      $('.navbar-collapse').addClass('active');
    })

    $('.cross-icon').click(function(e){
      e.preventDefault();
      $('.navbar-collapse').removeClass('active');
    })
  }

  function topHead() {
    $('#topHeadToggler').click(function(e){
      e.preventDefault();
      $('.top-head .row').slideToggle();
    })
  }


$(window).scroll(function () {

    var $header = $('.header');
    var $top_arrow = $('.go-top-arrow');
    var height = $('.count-height').height();
    // var height = 600;

    var top = $(window).scrollTop();

    if (top >= height){

        if( !$top_arrow.hasClass('active') ){
            $top_arrow.addClass('active')
        }
        if( !$header.hasClass('active') ){
            $header.addClass('active')
        }
    }
    else {
        if( $header.hasClass('active') ){
            $header.removeClass('active')
        }

        if( $top_arrow.hasClass('active') ){
            $top_arrow.removeClass('active')
        }
    }



});

function smoothScroll(){
    $('.smooth-scroll').each(function (i, e) {
        var $a = $(e);

        $a.click(function (e) {
            e.preventDefault();

            var $link = $(this);
            var target = $link.attr('href');
            const element = document.getElementById(target);

            const top = element.offsetTop;

            // console.log(top);


            $('html,body').animate({
                scrollTop: top
            });

        });
    });

}

function darkMode(){
    $('.dark-mode').click(function(e){
        e.preventDefault();

        $('.dark-mode').toggleClass('active')
        $('.about-us').toggleClass('dark-mode');
        $('.digital-education').toggleClass('dark-mode');
        $('.ongoing-events').toggleClass('dark-mode');
        $('.department').toggleClass('dark-mode');
        $('.infrastructure').toggleClass('dark-mode');
        $('.announcement').toggleClass('dark-mode');
        $('.partner').toggleClass('dark-mode');
        $('.page-content').toggleClass('dark-mode');
        $('.general-page').toggleClass('dark-mode');
        $('.websites').toggleClass('dark-mode');
        // $('section').css("background-color", "#20242A");
    })
}


