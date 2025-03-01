@extends('layouts.master')

@section('title')
    Genres Page
@endsection


@section('content')
    <a href="/genres/create" class="btn btn-sm btn-primary mb-3">Add Genres</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($genres as $genre)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $genre->name }}</td>
                    <td>
                        <a href="/genres/{{ $genre->id }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="/genres/{{ $genre->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE') 
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