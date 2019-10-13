<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
    @stack('css')
    <style>
        .sosmed i {
            width: 20px;
            height: 40px;
        }
        .sosmed {
            background-color: #373737;
            color: white;
            text-decoration: none;
            padding: 5px;
            text-align: center;
        }
        .footer {
            {{-- @if($active == 'dashboard' || $active == 'profil' || $active == 'masukan.index') --}}
            position: absolute;
            {{-- @endif --}}
            bottom: 1px;
            width: 100%;
            /*height: 60px;*/
            /*line-height: 60px;*/
            background-color: #f5f5f5;
            padding: 20px;
        }

        @@media screen and (max-width: 375px){
            .footer{
                position: relative;
            }
        }

    </style>
    @stack('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    SIPEMPEL
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                        <li class="nav-item @if($active == 'dashboard') active @endif">
                            <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                        </li>
                        <li class="nav-item @if($active == 'pengeluaran.index') active @endif">
                            <a class="nav-link" href="{{ route('pengeluaran.index') }}">Pengeluaran</a>
                        </li>
                        <li class="nav-item @if($active == 'pemasukan.index') active @endif">
                            <a class="nav-link" href="{{ route('pemasukan.index') }}">Pemasukan</a>
                        </li>
                        <li class="nav-item @if($active == 'statistik.index') active @endif">
                            <a class="nav-link" href="{{ route('statistik.index') }}">Statistik</a>
                        </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="author">Author</a>
                        </li>
                        @auth
                        <li class="nav-item @if($active == 'masukan.index') active @endif">
                            <a class="nav-link btn btn-primary btn-sm text-white" href="{{ route('masukan.index') }}">Yuk Kasih Masukan</a>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item @if($active == 'login') active @endif">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item @if($active == 'register') active @endif">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nama }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('profil') }}" class="dropdown-item">Profil</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Keluar') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4" style="flex: 1 0 auto;">
        @yield('content')
    </main>

    <footer class="footer bg-dark">
        <div class="container text-center text-white">
          <small>Copyright &copy; SISTEM INFORMASI PEMASUKAN DAN PENGELUARAN (SIPEMPEL) | ❤ Dibuat Oleh <a href="https://github.com/Anamcoollzz" target="_blank">Hairul Anam</a> ❤ | Versi Aplikasi 1.0.0</small>
      </div>
  </footer>
</div>
@include('layouts.modal-author')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
@stack('js')
<script>
    @isset($kategori)
    var kategoriAutoComplete = {!! $kategori->toJson() !!};
    $('#kategori').autocomplete({
        source : kategoriAutoComplete,
    });
    @endisset
    @isset($tempat)
    var tempatAutoComplete = {!! $tempat->toJson() !!};
    $('#tempat').autocomplete({
        source : tempatAutoComplete,
    });
    @endisset
    $('#author').on('click', function(e){
        e.preventDefault();
        $('#modalAuthor').modal('show');
    });

    function setHeight() {
        var sizeKonten = $('body').height();
        if(sizeKonten > window.screen.height){
            $('footer').css({
                position : 'relative'
            });
        }
    }
    $(document).ready(function(){
        setTimeout(function(){
            setHeight();
        }, 1000)
    })
</script>
@stack('script')
</body>
</html>
