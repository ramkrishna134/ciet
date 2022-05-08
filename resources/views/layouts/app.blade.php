@php
$lang = $_GET['lang'] ?? null;
if(!empty($lang)){
    if($lang == 'en' OR $lang == 'hi'){
        $headerMenus = DB::table('menu_items')->where('menu_id', 1)->where('lang', $lang)->where('status', 1)->get();
    }else{
        abort(404);
    }
}else{
    $headerMenus = DB::table('menu_items')->where('menu_id', 1)->where('lang', 'en')->where('status', 1)->get();
}


$mainMenus = [];
$subMenus = [];
foreach ($headerMenus as $item) {
  if($item->depth == 0){
    array_push($mainMenus, $item);
  }elseif($item->depth == 1){
    array_push($subMenus, $item);
  }
}



// dd($subMenus);
@endphp

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
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.2/css/lightgallery-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link href="{{ asset('js/web/multi-level-dropdown/bootstrap5-dropdown-ml-hack-hover.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/web/app.css') }}" rel="stylesheet">

    {{-- Custom Style added using back end --}}
    <style>
      {{ setting('custom_css') ?? '' }}
    </style>
</head>

<body>

  {{---------------- Loading Image ------------------------}}

  {{-- <div class="loading-bar active">
    <div class="image">
      <img class="img-fluid" src="/images/ciet-logo-black.png" alt="Loading Image">
    </div>
  </div> --}}

    <div id="app">
  {{-- @dd($headerMenus); --}}
      {{--------------- Top Header -----------------------}}
        <header class="header sticky-top shadow" id="header">
          <div class="top-head">
            <div class="container">
              <div class="row">
                <div class="col-lg-3">
                  <div class="time-date">
                    <div class="time me-3"><i class="fas fa-clock"></i> <span id="current-time"></span></div>
                    <div class="date"><i class="fas fa-calendar-day"></i> {{ date('d/m/Y') }}</div>
                  </div>
                </div>
                <div class="col-lg-9">
                  <ul class="accessibility-menu">
                    <li><a class="smooth-scroll" href="main-content">Skip to main content</a></li>
                    <li><a class="smooth-scroll" href="navigation">Skip to navigation</a></li>
                    <li><a href="/screen-reader-access">Screen Reader Access</a></li>
                    <li>Text Size: <a href="#" aria-label="Decrease Text Size">A&#8722;</a> <a href="#" aria-label="Default Text Size">A</a> <a href="#" aria-label="Increase Text Size">A&#x2b;</a></li>
                    <li class="dropdown">
                      <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Language
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="?lang=en">English</a></li>
                        <li><a class="dropdown-item" href="?lang=hi">Hindi</a></li>      
                      </ul>
                    </li>
                    <li><a href="#" class="dark-mode" aria-label="Darkmode enable or disable"><i class="fas fa-adjust"></i></a></li>
                </div>
              </div>

              <a href="#" class="drop-down" id="topHeadToggler" aria-label="Mobile Toolbar Dropdown Button">
                <i class="fas fa-angle-double-down"></i>
              </a>

            </div>
          </div>

          {{----------------- Main Header ------------------}}
          <nav class="navbar navbar-expand-lg shadow menu-container" id="navigation">
            <div class="container">
              <a class="navbar-brand" href="{{ route('home') }}" aria-label="CIET Logo">
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

                <a href="#" class="cross-icon" aria-label="Mobile Menu Close Button">
                  <img src="/images/web/cross-icon.png" alt="Mobile Menu Close Button">
                </a>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                  @foreach($mainMenus as $item)
                    {{-- <li class="nav-item @if($item->has_child == 1) dropdown @endif">
                      <a class="nav-link {{ (request()->is($item->link)) ? 'active' : '' }} @if($item->has_child == 1) dropdown-toggle @endif" aria-current="page" href="{{ $item->link }}">{{ $item->label }}</a>

                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @foreach($subMenus as $submenu)
                        @if($item->id == $submenu->parent_id)
                          <li><a class="dropdown-item" href="#">DIKSHA</a></li>
                        @endif
                      @endforeach
                      </ul>
                    </li> --}}
                    <li class="nav-item @if($item->has_child == 1) dropdown @endif">
                      <a class="nav-link {{ (request()->is($item->link)) ? 'active' : '' }} @if($item->has_child == 1) dropdown-toggle @endif" href="{{ $item->link }}@if($lang !=null)?lang={{ $lang }}@endif" id="@if($item->has_child == 1) navbarDropdown @endif " @if($item->has_child == 1) role="button" data-bs-toggle="dropdown" aria-expanded="false" @endif @if($item->target == 1) target="_blank" @endif>
                        {{ $item->label }}
                      </a>

                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @foreach($subMenus as $submenu)
                          @if($item->id == $submenu->parent_id)
                            <li><a class="dropdown-item {{ (request()->is($submenu->link)) ? 'active' : '' }}" href="{{ $submenu->link }}" @if($submenu->target == 1) target="_blank" @endif>{{ $submenu->label }}</a></li>
                          @endif
                        @endforeach
                        
                           
                      </ul>
                    </li>
                  @endforeach

                  {{-- <li class="nav-item">
                    <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}" href="/about">About</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Initiatives
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">DIKSHA</a></li>
                      <li><a class="dropdown-item" href="#">TV Channels</a></li>
                      <li><a class="dropdown-item" href="#">NISHTHA</a></li>
                      <li><a class="dropdown-item" href="#">ePathshala</a></li>
                      <li><a class="dropdown-item" href="{{ route('pmevidya') }}">PMeVidya</a></li>
                      <li><a class="dropdown-item" href="#">Radio Broadcasting</a></li>
                      <li><a class="dropdown-item" href="#">ICT Curriculam</a></li>
                      <li><a class="dropdown-item" href="#">NCF Tech Platform</a></li>
                      <li><a class="dropdown-item" href="#">Cyber Safety & Security</a></li>
                      <li><a class="dropdown-item" href="#">Accesibility</a></li>
                      <li><a class="dropdown-item" href="#">MOOC's</a></li>  
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Contituents
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/dict">Department of ICT & Training</a></li>
                      <li><a class="dropdown-item" href="#">Media Production Division</a></li>
                      <li><a class="dropdown-item" href="#">Planning and Research Division</a></li>
                      <li><a class="dropdown-item" href="#">Engineering Division</a></li>
                      <li><a class="dropdown-item" href="#">Administration & Accounts</a></li>
                         
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Trainings
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ route('training-calender') }}">Training Calender</a></li>
                      <li><a class="dropdown-item" href="#">NISHTHA Online</a></li>
                      <li><a class="dropdown-item" href="#">MOOC's</a></li>
                      <li><a class="dropdown-item" href="{{ route('webiner') }}">Webiner</a></li>
                      <li><a class="dropdown-item" href="#">Online Training</a></li>
                      <li><a class="dropdown-item" href="#">Offline Training</a></li>
                      <li><a class="dropdown-item" href="#">Action Research</a></li>   
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Events
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{ route('event-calender') }}">Event Calender</a></li>
                      <li><a class="dropdown-item" href="#">ICT Award</a></li>
                      <li><a class="dropdown-item" href="#">AICEAVF ICT Mela</a></li>
                      <li><a class="dropdown-item" href="#">Summer Camp</a></li>
                      <li><a class="dropdown-item" href="#">Conference</a></li>
                      <li><a class="dropdown-item" href="#">Quiz</a></li>     
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      More
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                      <li class="dropdown dropdown-submenu dropend">
                        <a class="dropdown-item submenu dropdown-toggle" href="#">New dropdown</span></a>
                        <ul class="dropdown-menu submenu">
                          <li><a class="dropdown-item" href="#">2nd level dropdown</a></li>
                          <li><a class="dropdown-item" href="#">2nd level dropdown</a></li>
                        </ul>
                      </li>

                      <li><a class="dropdown-item { (request()->is('people')) ? 'active' : '' }}" href="{{ route('people') }}">People</a></li>
                      <li><a class="dropdown-item" href="{{ route('announcement') }}">Announcements</a></li>
                      <li><a class="dropdown-item" href="#">RTI</a></li>
                      <li><a class="dropdown-item {{ (request()->is('contact')) ? 'active' : '' }}" href="{{ route('contact') }}">Contact us</a></li> 
                    </ul>
                  </li> --}}
                </ul>
                </div>

                <a href="#" type="button" class="btn-menu navbar-toggler navbar-toggle" data-bs-toggle="collapse"  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Menu">
                  <img class="img-fluid" src="/images/web/menu-icon.png" alt="Mobile Menu">
                </a>

                <a href="#" type="button" class="btn-search" data-bs-toggle="modal" data-bs-target="#searchModal">
                  <i class="fas fa-search"></i>
                </a>

              </div>
            </div>
          </nav>
        </header>

        <main>
            @yield('content')
        </main>


        {{------------------- Main footer -------------------}}
        <footer class="footer">
          <div class="container">
            <div class="row">
              <div class="col-lg-2 col-sm-6">

                <h5 class="footer-heading">Links</h5>

                <ul class="footer-menu mb-lg-0 mb-sm-4 mb-4">
                  <li><a href=""><i class="fas fa-angle-double-right"></i> NCERT</a></li>
                  <li><a href=""><i class="fas fa-angle-double-right"></i> DIKSHA</a></li>
                  <li><a href=""><i class="fas fa-angle-double-right"></i> ePathshala</a></li>
                  <li><a href=""><i class="fas fa-angle-double-right"></i> ICT Curriculam</a></li>
                  <li><a href=""><i class="fas fa-angle-double-right"></i> Swayam</a></li>
                  <li><a href=""><i class="fas fa-angle-double-right"></i> MoE</a></li>
                  <li><a href=""><i class="fas fa-angle-double-right"></i> MyGov</a></li>
                </ul>

              </div>
              <div class="col-lg-2 col-sm-6">
                <h5 class="footer-heading">Other Links</h5>

                <ul class="footer-menu mb-lg-0 mb-sm-4 mb-4">
                  <li><a href="/about"><i class="fas fa-angle-double-right"></i> About</a></li>
                  <li><a href="{{ route('contact') }}"><i class="fas fa-angle-double-right"></i> Contact us</a></li>
                  <li><a href=""><i class="fas fa-angle-double-right"></i> Privacy Policy</a></li>
                  <li><a href=""><i class="fas fa-angle-double-right"></i> Terms & Conditions</a></li>
                  <li><a href=""><i class="fas fa-angle-double-right"></i> Feedback</a></li>
                  <li><a href=""><i class="fas fa-angle-double-right"></i> Advisory Board</a></li>
                  <li><a href=""><i class="fas fa-angle-double-right"></i> CIET in News</a></li>
                </ul>
              </div>
              <div class="col-lg-5 col-sm-12 mb-lg-0 mb-sm-4 mb-4">
                <h5 class="footer-heading">Contact Us</h5>
                <div class="row">
                  <div class="col-sm-6">
                    {!! setting('address') !!}
                  </div>
                  <div class="col-sm-5">
                    <div class="foot-element mb-2">
                      <div class="foot-icon"><i class="fas fa-envelope"></i></div>
                      <a href="mailto: {!! setting('contact-email') !!}">{!! setting('contact-email') !!}</a>
                    </div>

                    <div class="foot-element mb-2">
                      <div class="foot-icon"><i class="fas fa-phone-alt"></i></div>
                      <a href="tel:{{ setting('contact-number1') }}">{{ setting('contact-number1') }}</a><br>
                      <a href="tel:{{ setting('contact-number2') }}">{{ setting('contact-number2') }}</a><br>
                      {{-- <a href="">+91 8448440632</a> --}}
                    </div>

                    <div class="foot-element">
                      <div class="foot-icon"><i class="fas fa-fax"></i></div>
                      <a href="tel: {{ setting('contact-fax') }}">{{ setting('contact-fax') }}</a>
                    </div>
                    
                    </p>
                  </div>
                </div>

              </div>
              <div class="col-lg-3 col-sm-6">
                <h5 class="footer-heading">Follow Us</h5>

                <div class="foot-icon-wrap">
                  <a href="{{ setting('facebook') }}" target="_blank" class="facebook" aria-label="Facebook page Link"><i class="fab fa-facebook-f"></i></a>
                  <a href="{{ setting('instagram') }}" class="instagram" target="_blank" aria-label="Instagram page Link"><i class="fab fa-instagram"></i></a>
                  <a href="{{ setting('twitter') }}" class="twitter" target="_blank" aria-label="Twitter page Link"><i class="fab fa-twitter"></i></a>
                  <a href="{{ setting('youtube') }}" class="youtube" target="_blank" aria-label="Youtube channel Link"><i class="fab fa-youtube"></i></a>
                  <a href="{{ setting('linkedin') }}" class="linkedin" target="_blank" aria-label="LinkedIn page Link"><i class="fab fa-linkedin-in"></i></a>
                </div>

                <div class="counter">
                  Total Visitor: 987563214
                </div>

              </div>
            </div>
          </div>
        </footer>

        {{------------------- Bottom footer -------------------}}
        <section class="foot-line">
          <div class="container">
            <div class="row">
              <div class="col-sm-8">
                <p class="mb-0">&#169; {{ date('Y') }} | Developed by CIET, NCERT | Hosted by NIC</p>
              </div>
              <div class="col-sm-4 text-sm-end text-center">
                <ul class="footer-menu-inline">
                  <li><a href="">Privacy Policy</a></li> | 
                  <li><a href="">Sitemap</a></li>
                </ul>
              </div>
            </div>
          </div>
        </section>

        {{------------------- Go to top Arrow -------------------}}
        <a href="header" class="go-top-arrow smooth-scroll" aria-label="Go to page Top"><i class="fas fa-angle-up"></i></a>


        {{----------------------- Searbox Modal --------------------}}

        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="Search Accross the CIET Website" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-body shadow">

                <form class="search-box">

                  <div class="search-element">
                    <input id="txtSearch" class="form-control"type="search" placeholder="Type anything to Search ...." aria-label="Search accross the website">
                    <i class="fas fa-search"></i>
                  </div>

                  {{ csrf_field() }}
                  <div id="search-result" class="result shadow"></div>
                </form>

              </div>
            </div>
          </div>
        </div>


    </div>


    <!-- Scripts -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0-beta.2/lightgallery.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.js"></script> --}}
    {{-- <script src="{{ asset('js/web/multi-level-dropdown/bootstrap5-dropdown-ml-hack.js') }}"></script> --}}
    <script src="{{ asset('js/web/app.js') }}" defer></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> --}}


    {{-- Search Box --}}

    <script type="text/javascript">
    
      window.addEventListener('load', (event) => {
        $('.loading-bar').removeClass('active');
      });

    $(document).ready(function (){

      searchbox();
      time();

    })

    function time(){
      setInterval ("document.getElementById ('current-time').innerHTML = new Date().toLocaleTimeString()", 50)
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

            const numb = document.getElementById("search-result").children.length;
            if(numb == 0){
              var html = ('<strong>No result found ...</strong>');
              $('#search-result').append(html);
            }
            

            
            
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


</body>
</html>
