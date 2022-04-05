require('./bootstrap');

$(document).ready(function (){

  initMap();

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


