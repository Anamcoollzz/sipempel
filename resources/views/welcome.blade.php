<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 63px;
        }

        @@media screen and (max-width: 425px){
            .title{
                font-size: 30px;
            }
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Dashboard</a>
            @else
            <a href="{{ route('login') }}">Masuk</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Daftar</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                {{ config('app.name') }}
            </div>

            <div class="links">
                <a href="{{ url('/home') }}">Dashboard</a>
                <a href="{{ route('pemasukan.index') }}">Pemasukan</a>
                <a href="{{ route('pengeluaran.index') }}">Pengeluaran</a>
                <a href="{{ route('statistik.index') }}">Statistik</a>
                <a href="#" id="author">Author</a>
            </div>
            <h5 class="mt-2">
                <a target="_blank" href="https://wa.me/6285322778935?text=Assalamu'alaikum. Saya {{ \Auth::check() ? \Auth::user()->nama : 'Anonim' }} pengguna aplikasi SIPEMPEL. Aplikasinya menarik deh">WhatsApp saya di 0853-2277-8935</a>
            </h5>
        </div>
    </div>
    @include('layouts.modal-author')
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $('#author').on('click', function(e){
        e.preventDefault();
        $('#modalAuthor').modal('show');
    });
</script>
</html>
