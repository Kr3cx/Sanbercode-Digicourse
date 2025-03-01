@extends('layouts.master')

@section('title')
    Genre Page
@endsection


@section('content')
   

    
    <h1 class="text-primary">{{ $genres->name }}</h1>

    <h3>List Film</h3>
    <div class="row">
        @forelse ($genres->listFilms as $item)
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('uploads/' . $item->poster) }}" width="300px" class="mx-auto" alt="...">
                    <div class="card-body">
                        <h3 class="mb-1">{{ $item->title}}</h3>
                        <p class="mt-0 text-muted">Genre : {{ optional($item->genres)->name }}</p>
                        <p class="card-text">{{Str::limit($item->summary, 50)}}</p>
                        <a href="/films/{{ $item->id }}" class="btn btn-primary btn-sm btn-block">Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <h4>Tidak ada Film Untuk Kategori Ini!</h4>
        @endforelse
    </div>
    <a href="/genres" class="btn btn-primary">Kembali</a>
@endsection