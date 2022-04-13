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

  initMap();

  smoothScroll();

//   var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
//     var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
//     return new bootstrap.Tooltip(tooltipTriggerEl)
//   })

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

    $('.home-slider').slick({
        lazyLoad: 'ondemand',
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

function initMap() {

  if (!document.getElementById('map')){
      return;
  }

  var coordMapCenter = {lat: 12.6745238, lng: 92.925102};
  var coordMarker = {lat: 12.6745238, lng: 92.925102};

  var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 6,
      center: coordMapCenter,
      scrollwheel: true,
      draggable: false,
      styles: [
          {
              "featureType": "administrative.neighborhood",
              "elementType": "all",
              "stylers": [
                  {
                      "visibility": "simplified"
                  }
              ]
          },
          {
              "featureType": "administrative.land_parcel",
              "elementType": "all",
              "stylers": [
                  {
                      "visibility": "off"
                  }
              ]
          },
          {
              "featureType": "landscape",
              "elementType": "all",
              "stylers": [
                  {
                      "hue": "#FFBB00"
                  },
                  {
                      "saturation": 43.400000000000006
                  },
                  {
                      "lightness": 37.599999999999994
                  },
                  {
                      "gamma": 1
                  }
              ]
          },
          {
              "featureType": "poi",
              "elementType": "all",
              "stylers": [
                  {
                      "hue": "#00ff6a"
                  },
                  {
                      "saturation": -1.0989010989011234
                  },
                  {
                      "lightness": 11.200000000000017
                  },
                  {
                      "gamma": 1
                  },
                  {
                      "visibility": "simplified"
                  }
              ]
          },
          {
              "featureType": "poi",
              "elementType": "labels",
              "stylers": [
                  {
                      "visibility": "off"
                  }
              ]
          },
          {
              "featureType": "road.highway",
              "elementType": "all",
              "stylers": [
                  {
                      "hue": "#FFC200"
                  },
                  {
                      "saturation": -61.8
                  },
                  {
                      "lightness": 45.599999999999994
                  },
                  {
                      "gamma": 1
                  }
              ]
          },
          {
              "featureType": "road.arterial",
              "elementType": "all",
              "stylers": [
                  {
                      "hue": "#ff0300"
                  },
                  {
                      "saturation": -100
                  },
                  {
                      "lightness": 51.19999999999999
                  },
                  {
                      "gamma": 1
                  }
              ]
          },
          {
              "featureType": "road.local",
              "elementType": "all",
              "stylers": [
                  {
                      "hue": "#FF0300"
                  },
                  {
                      "saturation": -100
                  },
                  {
                      "lightness": 52
                  },
                  {
                      "gamma": 1
                  }
              ]
          },
          {
              "featureType": "transit.line",
              "elementType": "geometry",
              "stylers": [
                  {
                      "visibility": "off"
                  }
              ]
          },
          {
              "featureType": "transit.station",
              "elementType": "labels",
              "stylers": [
                  {
                      "visibility": "simplified"
                  },
                  {
                      "lightness": "31"
                  },
                  {
                      "gamma": "1.58"
                  }
              ]
          },
          {
              "featureType": "water",
              "elementType": "all",
              "stylers": [
                  {
                      "hue": "#0078FF"
                  },
                  {
                      "saturation": -13.200000000000003
                  },
                  {
                      "lightness": 2.4000000000000057
                  },
                  {
                      "gamma": 1
                  }
              ]
          }
      ],
      scaleControl: true,
      streetViewControl: true,
      streetViewControlOptions: {
          position: google.maps.ControlPosition.RIGHT_BOTTOM
      },
      zoomControl: true,
      zoomControlOptions: {
          position: google.maps.ControlPosition.RIGHT_BOTTOM
      },
      panControl: true,


      fullscreenControl:true,
      fullscreenControlOptions:{
          position:google.maps.ControlPosition.LEFT_BOTTOM
      }
  });


  var officeAddress = '<div id="iw-content">'+
      '<div id="iw-notice">'+
      '</div>'+
      '<div id="firstHeading" class="firstHeading">Central Institute of Educational Research</div>'+
      '<div id="iw-bodyContent">'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: officeAddress
  });


  var mapmarker = new google.maps.Marker({
      position: coordMarker,
      map: map,
      title: 'Andaman'
  });

  mapmarker.addListener('click', function() {
      infowindow.open(map, mapmarker);
  });

}


