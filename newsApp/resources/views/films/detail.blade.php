@extends('layouts.master')

@section('title')
Films Page
@endsection


@section('content')


    <a href="/films" class="btn btn-secondary btn-sm mb-3">Kembali</a>
        <div class="container">
            <div class="card ">
                <img src="{{ asset('uploads/' . $films->poster) }}" class="card-img-top img-fluid" alt="Film Poster"
                    style="max-height: 2000px; object-fit: cover;">

                <div class="card-body text-center">
                    <h1 class="text-primary">{{ $films->title }}</h1>
                    <p class="text-muted">Genre: {{ optional($films->genres)->name }}</p>
                    <p>{{ $films->summary }}</p>

                    <hr>
                    <h4 class="text-info">List Review</h4>
                    @forelse ($films->listReviews as $item)
                        <div class="card">
                    <div class="card-header bg-dark">
                            {{ $item->user->name }}
                        </div>
                    <div class="card-body">
                    <p class="card-text">{{ $item->content }}</p>
                     </div>
                    </div>
                    @empty
                        <h5>Tidak ada komentar</h5>
                    @endforelse
                    @auth
                        
                    <form action="/reviews/{{ $films->id }}" method="POST" class="mt-3">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <div class="form-group mt-3">
                            <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Buat Review Anda"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Add Review</button>
                    </form>

                    @endauth



                </div>
            </div>
        </div>
@endsection