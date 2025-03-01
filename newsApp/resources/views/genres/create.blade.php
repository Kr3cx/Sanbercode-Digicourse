@extends('layouts.master')

@section('title')
    Add Genres
@endsection


@section('content')

    <form action="/genres" method="POST">
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
        <div class="form-group">
            <label for="name">Genres Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection