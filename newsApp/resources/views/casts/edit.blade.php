@extends('layouts.master')

@section('title')
    Edit Cast
@endsection


@section('content')

    <form action="/casts/{{ $casts->id }}" method="POST">
        @method("PUT")
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
            <label for="name">Cast Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $casts->name) }}">
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ old('age', $casts->age) }}" min="0">
        </div>

        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea class="form-control" id="bio" name="bio">{{ old('bio') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection