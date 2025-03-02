@extends('layouts.master')

@section('title')
    Halaman Utama
@endsection


@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>

        </style>
        </head>

        <body>
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="display-4">SanberBook</h1>
                    <h2 class="fs-3">Social Media Developer Santai Berkualitas</h2>
                    <p class="lead">Belajar dan Berbagi agar hidup ini semakin santai berkualitas</p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h3 class="mt-5">Benefit Join di SanberBook</h3>
                        <ul class="list-group">
                            <li class="list-group-item">Mendapatkan motivasi dari sesama developer</li>
                            <li class="list-group-item">Sharing knowledge dari para mastah Sanber</li>
                            <li class="list-group-item">Dibuat oleh calon web developer terbaik</li>
                        </ul>

                        <h3 class="mt-5">Cara Bergabung ke SanberBook</h3>
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item">Mengunjungi Website ini</li>
                            <li class="list-group-item">Mendaftar di <a href="{{ route('register') }}">Form Sign Up</a></li>
                            <li class="list-group-item">Selesai!</li>
                        </ol>
                    </div>
                </div>
            </div>

           
        </body>
@endsection