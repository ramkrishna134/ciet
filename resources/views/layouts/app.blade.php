<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta Tags -->
    <meta name="title" content="@yield('title')-Central Institute of Educational Technology">
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

    <title>@yield('title')- Central Institute of Educational Technology</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">CIET</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                  </li>
                </ul>
                <form class="d-flex">
                  <input id="txtSearch" class="form-control me-2" style="width: 500px;" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>

                  {{ csrf_field() }}
                </form>

                <div id="search-result" class="result">

                </div>
              </div>
            </div>
          </nav>

        <main>
            @yield('content')
        </main>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    {{-- Search Box --}}

    {{-- <script type="text/javascript">
      var path = "{{ route('autocomplete') }}";
      $('input.typeahead').typeahead({
          source:  function (query, process) {
              return $.get(path, { query: query }, function (data) {
                  return process(data);
              });
          }
      });
    </script> --}}

    <script type="application/javascript">
      $(document).ready(function(){

          $('#txtSearch').on('keyup', function(){

            var query = $(this).val();

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
                  $('#search-result').html(data);

                  console.log(data);
                  // for (var patient of response) {
                  //     console.log(patient);
                  // }
              }



              });

            }

              
            

              


          });

      });
    </script>


</body>
</html>
