@extends('layouts.master')

@section('title')
    Film Page
@endsection


@section('content')
    <a href="/films/create" class="btn btn-sm btn-primary mb-3">Add Film</a>

    <div class="row">
        @foreach ($films as $item)
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('uploads/' . $item->poster) }}"  width="300px"  class="mx-auto" alt="...">
                    <div class="card-body">
                        <h3>{{ $item->title}}</h3>
                        <p class="card-text">{{Str::limit($item->summary, 50)}}</p>
                        <a href="/films/{{ $item->id }}" class="btn btn-primary btn-sm btn-block">Detail</a>
                        <div class="row mt-3">
                            <div class="col">
                                <a href="/films/{{ $item->id }}/edit" class="btn btn-warning  btn-sm btn-block">Edit</a>
                            </div>
                            <div class="col">
                                <form action="/films/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger btn-block">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection