@extends('layouts.master')

@section('title')
    Cast Page
@endsection


@section('content')
    <h1 class="text-primary">{{ $casts->name }}</h1>
    <p>{{ $casts->age }}</p>
    <p>{{ $casts->bio }}</p>

    <a href="/casts" class="btn btn-primary">Kembali</a>
@endsection