@extends('layouts.master')

@section('title')
    Add Films
@endsection


@section('content')

    <form action="/films" method="POST" enctype="multipart/form-data">
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
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" >
        </div>

        <div class="form-group">
            <label for="summary">Summary</label>
            <textarea class="form-control" id="summary" name="summary">{{ old('summary') }}</textarea>
        </div>

        <div class="form-group">
            <label for="release_year">Release Year</label>
            <input type="number" class="form-control" id="release_year" name="release_year" value="{{ old('release_year') }}"
                min="1900" max="{{ date('Y') }}">
        </div>

        <div class="form-group">
            <label for="poster">Poster</label>
            <input type="file" class="form-control-file" id="poster" name="poster" accept="image/*">
        </div>


        <div class="form-group">
            <label for="genre_id">Genre</label>
            <select class="form-control" id="genre_id" name="genre_id">
                <option value="">Pilih Genre</option>
                @forelse ($genres as $item)
                    <option value="{{ $item->id }}" {{ old('genre_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @empty
                    <option value="">Belum ada Genre</option>
                @endforelse
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
        </form>


@endsection