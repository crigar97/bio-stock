<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title> Bio-Stock </title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  @stack('scripts')

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <style>
    .color__bio-stock {
      color: #48D296;
    }

    .logo__bio-stock{
      color: #48D296;
      font-size: 30px;
      font-weight: bold;
    }

    .cl-white {
      color: white;
    }

    .title__menu-item {
      font-weight: bold;
      color: #00b181;
    }

    .menu-item {
      border: 2px solid white;
    }

    .menu-item:hover {
      background-color: white;
      border: 2px solid #00b181;
      border-radius: .5em;
    }

    a.nav-link {
      font-size: 18px;
    }

    .foot-link {
      color: white;
    }
  </style>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  @stack('styles')
</head>
<body>
  <div id="app">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <!-- Logo Navbar -->
        <a class="navbar-brand" href="{{ url('/') }}"> 
          <img src="{{ url('storage/view-images/icon-hormiga.png') }}" alt="icon__bio-stock"> 
        </a>
        <a class="navbar-brand" href="{{ url('/') }}" style="text-decoration: none;"> 
          <span class="logo__bio-stock"> BIO-STOCK </span>
        </a>
        <!-- /Logo Navbar -->

        <!-- Menu Navbar -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto"> </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <!--
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}"> Iniciar Sesión </a>
                  </li>
                  -->
              @else
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('home') }}">
                    <img src="{{ url('storage/view-images/menu-icon.png') }}">    
                    <span id="menuLabel" class="ml-1"> Menú </span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('users.index') }}">
                    <img src="{{ url('storage/view-images/profile-icon.png') }}">    
                    <span id="profileLabel" class="ml-1"> Mi Perfil </span>
                  </a>
                </li>

                <li class="nav-item ml-3">
                  <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <img src="{{ url('storage/view-images/sign-off-icon.png') }}">    
                    <span id="signOffLabel" class="ml-1"> Cerrar Sesión </span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>
                  {{-- <li class="nav-item dropdown">
                    <a 
                      id="navbarDropdown" 
                      class="nav-link dropdown-toggle ml-4" 
                      style="font-size: 20px;" 
                      href="#" role="button" 
                      data-toggle="dropdown" 
                      aria-haspopup="true" 
                      aria-expanded="false" 
                      v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Cerrar Sesión
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </div>
                  </li> --}}
              @endguest
          </ul>
        </div>
        <!-- /Menu Navbar -->
      </div>
    </nav>

    <main class="">
      @yield('content')
    </main>
    
    <!-- Footer -->
    <footer id="footer" class="pt-5 pb-5" style="background: #188878;">
      <div class="container">
        <div class="row text-center">
          <div class="col-12 col-lg-4">
            <span style="color: white; font-size: 18px"> <span style="font-weight: bold;"> © Copyright Bio-Stock </span> Página Oficial </span>
          </div>
          <div class="col-12 col-lg-8 mt-1">
            <a href="#" class="foot-link"> Términos y Condiciones </a>
            <span class="foot-link"> | </span>  
            <a href="#" class="foot-link"> Política de Privacidad</a> 
            <span class="foot-link"> | </span>  
            <a href="#" class="foot-link"> Cookies </a>
            <span class="foot-link"> | </span>  
            <a href="#" class="foot-link"> Contáctenos </a>
          </div>
        </div>
      </div>
    </footer>
    <!-- /Footer -->
  </div>

  <!-- JS Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!-- /JS Bootstrap -->
</body>
</html>
