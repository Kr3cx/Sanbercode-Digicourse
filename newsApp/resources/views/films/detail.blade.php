@extends('layouts.master')

@section('title')
    Films Page
@endsection


@section('content')
    <div class="container">
        <div class="card mx-auto shadow-sm" style="max-width: 600px;">
            <img src="{{ asset('uploads/' . $films->poster) }}" class="card-img-top img-fluid" alt="Film Poster"
                style="max-height: 400px; object-fit: cover;">

            <div class="card-body text-center">
                <h1 class="text-primary">{{ $films->title }}</h1>
                <p class="text-muted">Genre: {{ optional($films->genres)->name }}</p>
                <p>{{ $films->summary }}</p>

                <a href="/films" class="btn btn-primary mt-3">Kembali</a>
            </div>
        </div>
    </div>
@endsection