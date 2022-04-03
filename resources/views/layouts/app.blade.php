<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta Tags -->
    <meta name="title" content="@yield('title')Central Institute of Educational Technology | A Constituent unit of NCERT">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keyword')">
    <meta property="og:image"  content="@yield('image')">
    <meta name="author" content="Central Institute of Educational Technology">

    <meta name="twitter:card" value="@yield('description')">

    <meta property="og:title" content="@yield('title')" />
    <meta property="og:type" content="@yield('description')" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="@yield('image')" />
    <meta property="og:description" content="@yield('description')" />

    <title>@yield('title')Central Institute of Educational Technology | A Constituent unit of NCERT</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/web/app.css') }}" rel="stylesheet">
</head>

<style>
  
</style>

<body>
    <div id="app">

        <header class="header">

          <div class="top-head">
            <div class="container">
              <div class="row">
                <div class="col-lg-3">
                  <div class="time-date">
                    <div class="time me-3"><i class="fas fa-clock"></i> 10:00 AM</div>
                    <div class="date"><i class="fas fa-calendar-day"></i> {{ date('d/m/Y') }}</div>
                  </div>
                </div>
                <div class="col-lg-9">
                  <ul class="accessibility-menu">
                    <li><a href="">Skip to main content</a></li>
                    <li><a href="">Skip to navigation</a></li>
                    <li><a href="">Screen Reader Access</a></li>
                    <li>Text Size: <a href="">A-</a> <a href="">A</a> <a href="">A+</a></li>
                    <li class="dropdown">
                      <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Language
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">English</a></li>
                        <li><a class="dropdown-item" href="#">Hindi</a></li>
                        <li><a class="dropdown-item" href="#">Urdu</a></li>      
                      </ul>
                    </li>
                    <li><a href=""><i class="fas fa-adjust"></i></a></li>
                </div>
              </div>

              <a href="" class="drop-down" id="topHeadToggler">
                <i class="fas fa-angle-double-down"></i>
              </a>

            </div>
          </div>

          <nav class="navbar navbar-expand-lg shadow sticky-top">
            <div class="container">
              <a class="navbar-brand" href="{{ route('home') }}">
                <div class="logo">
                  <img class="img-fluid" src="/images/web/logo-english.png" alt="CIET Logo">
                </div>
              </a>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <a class="navbar-brand d-lg-none d-sm-block d-block py-3 m-0" href="{{ route('home') }}">
                  <div class="logo mx-auto logo-sm">
                    <img class="img-fluid" class="img-fluid" src="/images/web/logo-english.png" alt="CIET Logo">
                  </div>
                </a>

                <a href="#" class="cross-icon">
                  <img src="/images/web/cross-icon.png" alt="Menu Close Icon">
                </a>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Contituents
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Department of ICT & Training</a></li>
                      <li><a class="dropdown-item" href="#">Media Production Division</a></li>
                      <li><a class="dropdown-item" href="#">Planning and Research Division</a></li>
                      <li><a class="dropdown-item" href="#">Engineering Division</a></li>
                      <li><a class="dropdown-item" href="#">Administration & Accounts</a></li>
                         
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Trainings</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Events
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Department of ICT & Training</a></li>
                      <li><a class="dropdown-item" href="#">Media Production Division</a></li>
                      <li><a class="dropdown-item" href="#">Planning and Research Division</a></li>
                      <li><a class="dropdown-item" href="#">Engineering Division</a></li>
                      <li><a class="dropdown-item" href="#">Administration & Accounts</a></li>     
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      More
                    </a>
                    <ul class="dropdown-menu mega-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <div class="row">
                        <div class="col-sm-6">
                          <li><a class="dropdown-item" href="#">Department of ICT & Training</a></li>
                          <li><a class="dropdown-item" href="#">Media Production Division</a></li>
                          <li><a class="dropdown-item" href="#">Planning and Research Division</a></li>
                          <li><a class="dropdown-item" href="#">Engineering Division</a></li>
                          <li><a class="dropdown-item" href="#">Administration & Accounts</a></li>
                        </div>
                        <div class="col-sm-6">
                          <li><a class="dropdown-item" href="#">Department of ICT & Training</a></li>
                          <li><a class="dropdown-item" href="#">Media Production Division</a></li>
                          <li><a class="dropdown-item" href="#">Planning and Research Division</a></li>
                          <li><a class="dropdown-item" href="#">Engineering Division</a></li>
                          <li><a class="dropdown-item" href="#">Administration & Accounts</a></li>
                        </div>
                      </div>
                           
                    </ul>
                  </li>
                </ul>
                </div>

                <a href="#" type="button" class="btn btn-menu navbar-toggler navbar-toggle" data-bs-toggle="collapse"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <img class="img-fluid" src="/images/web/menu-icon.png" alt="">
                </a>

                <a href="#" type="button" class="btn btn-search" data-bs-toggle="modal" data-bs-target="#searchModal">
                  <i class="fas fa-search"></i>
                </a>

              </div>
            </div>
          </nav>
        </header>

        <main>
            @yield('content')
        </main>


        {{-- Searbox Modal --}}

        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="Search Accross the CIET Website" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-body shadow">

                <form class="search-box">
                  <input id="txtSearch" class="form-control"type="search" placeholder="Type anything to Search ...." aria-label="Search">

                  {{ csrf_field() }}
                  <div id="search-result" class="result shadow">
                </form>

              </div>
            </div>
          </div>
        </div>

    </div>

    {{-- Search Box --}}

    <script type="text/javascript">

    $(document).ready(function (){
      mobileMenu();
      searchbox();
      topHead();
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

    
    function searchbox() {

    let searchKeyTimer = null;
    let searchAjax = null;
    let $searchBox = $('.search-box');
    let $searchInput = $searchBox.find('#txtSearch');
    let $searchResults = $searchBox.find('#search-result');


    $searchBox.click(function(e){
        e.stopPropagation();
    });

    $searchInput.keyup(function( e ){

        if( e.which === 27 ){

            $searchResults.hide();

            if( searchKeyTimer ){
                clearTimeout( searchKeyTimer );
                searchKeyTimer = null;
            }
            if( searchAjax ){
                searchAjax.abort();
                searchAjax = null;
            }

            return;
        }

        if( searchKeyTimer ){
            clearTimeout( searchKeyTimer );
            searchKeyTimer = null;
        }

        searchKeyTimer = setTimeout( search, 250 );

    });

    function search() {

        if( searchAjax ){
            searchAjax.abort();
            searchAjax = null;
        }

        $searchResults.hide();
        $searchResults.html("");
        $('#txtSearch').removeClass('active');

        let query = $.trim( $searchInput.val() );
        if( query.length === 0 ) return;


      if(query != ''){
        var _token = $('input[name="_token"]').val();

        $.ajax({

        method:"POST",
        url: "{{ route('search') }}",
        data: {
          query : query,
          _token : _token
        },
        success: function(data) {
            response = data;
            $('#search-result').fadeIn();
            $('#txtSearch').addClass('active');
            

            data.forEach(function(item) {
              item.forEach(function(single){
                var html = ('<a href="/'+single['slug']+'">'+single['title']+'</a>');
                
                $('#search-result').append(html);

              })
            });

            

            // console.log(data);
            
        }



        });

      }
    }

    $('body').click(function(){
        $searchResults.hide();
        $searchResults.html("");
        $('#txtSearch').removeClass('active');
    });

    }


      
    </script>

    {{-- <script type="application/javascript">

      $(document).ready(function(){


        
        


        let searchKeyTimer = null;
        let searchAjax = null;
        let $searchBox = $('.search-box');
        let $searchInput = $searchBox.find('#txtSearch');
        let $searchResults = $searchBox.find('#search-result');

        $searchBox.click(function(e){
            e.stopPropagation();
        });

        $searchInput.keyup(function( e ){

          if( e.which === 27 ){
            $searchResults.hide();

            if( searchKeyTimer ){
                clearTimeout( searchKeyTimer );
                searchKeyTimer = null;
            }
            if( searchAjax ){
                searchAjax.abort();
                searchAjax = null;
            }

            return;


          }

          if( searchKeyTimer ){
            clearTimeout( searchKeyTimer );
            searchKeyTimer = null;
          }




          
          
        })




        function search() {

        if( searchAjax ){
            searchAjax.abort();
            searchAjax = null;
        }

        $searchResults.hide();

        



      });
    </script> --}}


</body>
</html>
