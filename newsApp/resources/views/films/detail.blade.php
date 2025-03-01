@extends('layouts.master')

@section('title')
    Films Page
@endsection


@section('content')
    <div class="d-flex justify-content-center">
        <img src="{{ asset('uploads/' . $films->poster) }}" alt="">
    </div>

    <h1 class="text-primary mt-3">{{ $films->title }}</h1>
    <p>{{ $films->summary }}</p>

    <a href="/films" class="btn btn-primary">Kembali</a>
@endsection