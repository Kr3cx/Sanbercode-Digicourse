@extends('layouts.master')

@section('title')
    Cast Page
@endsection


@section('content')
    <a href="/casts/create" class="btn btn-sm btn-primary mb-3">Add Cast</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($casts as $cast)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $cast->name }}</td>
                    <td>
                        <a href="/casts/{{ $cast->id }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="/casts/{{ $cast->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <form action="/casts/{{ $cast->id }}/destroy" class="" method="POST">
                            @method("DELETE")
                            @csrf
                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <p>No users</p>
            @endforelse
        </tbody>
    </table>
@endsection