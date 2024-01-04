<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div id="app">
        <div  align="center">
            <img name="index_r1_c1" src="header/header_1.png" width="1960" height="200" border="0" alt="">
          </div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
					@auth()
                    <ul class="navbar-nav mr-auto">
						<!--Nav Bar Hooks - Do not delete!!-->
                        @role(['admin'])
						<li class="nav-item">
                            <a href="{{ url('/asignadocumentos') }}" class="nav-link"><i class="fab fa-laravel"></i> Asignadocumentos</a> 
                        </li>
                        @endrole
                        @role(['admin'])
						<li class="nav-item">
                            <a href="{{ url('/tipodocumentos') }}" class="nav-link"><i class="fab fa-laravel"></i> Tipodocumentos</a> 
                        </li>
                        @endrole
                        @role(['admin'])
                            <li class="nav-item">
                                <a href="{{ url('/ptipos') }}" class="nav-link"><i class="fab fa-laravel"></i> Ptipos</a> 
                            </li>
                        @endrole
                        @role(['admin'])
                            <li class="nav-item">
                                <a href="{{ url('/roles') }}" class="nav-link"><i class="fa-solid fa-users"></i> Roles</a> 
                            </li>
                        @endrole 
                        @role(['admin'])   
                            <li class="nav-item">
                                <a href="{{ url('/permissions') }}" class="nav-link"><i class="fa-solid fa-users"></i> Permisos</a> 
                            </li>
                        @endrole
                        @role(['admin'])
                            <li class="nav-item">
                                <a href="{{ url('/users') }}" class="nav-link"><i class="fa-solid fa-users"></i> Usuarios</a> 
                            </li>
                        @endrole    
						<li class="nav-item">
                            <a href="{{ url('/promociones') }}" class="nav-link"><i class="fa-solid fa-forward"></i> Promociones</a> 
                        </li>
                        @role(['admin'])
                            <li class="nav-item">
                                <a href="{{ url('/etapas') }}" class="nav-link"><i class="fa-solid fa-bars-staggered"></i> Etapas</a> 
                            </li>
                         @endrole  
                         @role(['admin']) 
                            <li class="nav-item">
                                <a href="{{ url('/tareas') }}" class="nav-link"><i class="fa-solid fa-list-check"></i> Tareas</a> 
                            </li>
                        @endrole
                        @role(['admin'])
                            <li class="nav-item">
                                <a href="{{ url('/estados') }}" class="nav-link"><i class="fa-solid fa-check"></i> Estados</a> 
                            </li>
                        @endrole
                        @role(['admin'])
                            <li class="nav-item">
                                <a href="{{ url('/juzgados') }}" class="nav-link"><i class="fa-solid fa-building"></i> Juzgados</a> 
                            </li>
                        @endrole
                        @role(['admin'])
                            <li class="nav-item">
                                <a href="{{ url('/amtipos') }}" class="nav-link"><i class="fa-solid fa-bars"></i> Tipo amparo</a> 
                            </li>
                        @endrole
						<li class="nav-item">
                            <a href="{{ url('/amparos') }}" class="nav-link"><i class="fa-solid fa-shield"></i> Amparos</a> 
                        </li>	
                        @role(['admin'])				
                            <li class="nav-item">
                                <a href="{{ url('/tipos') }}" class="nav-link"><i class="fa-solid fa-warehouse"></i> Estátus</a> 
                            </li>
                        @endrole
                        @role(['admin'])
                            <li class="nav-item">
                                <a href="{{ url('/ponencias') }}" class="nav-link"><i class="fa-solid fa-graduation-cap"></i> Ponencias</a> 
                            </li>
                        @endrole
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-folder"></i> Expedientes
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">                            
                            <li class="nav-item">
                                <a href="{{ url('/especiales') }}" class="dropdown-item">Especiales</a> 
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/ordinarios') }}" class="dropdown-item">Ordinarios</a> 
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/paraprocesales') }}" class="dropdown-item">Paraprocesales</a> 
                            </li>
                            </ul>
                        </div>
						<li class="nav-item">
                            <a href="{{ url('/actuaciones') }}" class="nav-link"><i class="fa-solid fa-gear"></i> Acciones</a> 
                        </li>
                    </ul>
					@endauth()

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @livewireScripts
    <script type="module">
        const addModal = new bootstrap.Modal('#createDataModal');
        const editModal = new bootstrap.Modal('#updateDataModal');
        window.addEventListener('closeModal', () => {
           addModal.hide();
           editModal.hide();
        })
    </script>
</body>
</html>