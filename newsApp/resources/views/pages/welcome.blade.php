@extends('layouts.master')

@section('title')
    Halaman Welcome
@endsection


@section('content')
    <h1>SELAMAT DATANG {{ $firstName }} {{ $lastName }}</h1>
    <h2>Terima Kasih telah bergabung di SanberBook. Social Media kita bersama!</h2>

@endsection