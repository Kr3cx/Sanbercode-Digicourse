@extends('layouts.master')

@section('title')
    Detail Film
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 20%;">Judul</th>
                    <td style="width: 80%;">{{ $films->title }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Ringkasan</th>
                    <td style="width: 80%;">{{ $films->summary }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Tahun Rilis</th>
                    <td style="width: 80%;">{{ $films->release_year }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Poster</th>
                    <td style="width: 80%;">
                        <img src="{{ asset('uploads/' . $films->poster) }}" alt="{{ $films->title }}"
                            style="height: 300px; object-fit: cover;">
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%;">Genre</th>
                    <td style="width: 80%;">{{ optional($films->genres)->name }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a href="/films" class="btn btn-primary">Kembali ke Daftar</a>
        </div>
        <div class="card-body">
            <h3 class="text-info">Review</h3>
            @auth
                <form action="/reviews/{{ $films->id }}" method="POST" class="mb-4">
                    @csrf
                    <div class="form-group">
                        <input type="number" name="point" id="point" class="form-control form-control-sm" min="1" max="5"
                            value="{{ old('point') }}" placeholder="Rating (1-5)">
                        @error('point')
                            <div class="text-danger small">{{ $reviews }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="content" class="form-control form-control-sm"
                            placeholder="Tulis ulasan Anda">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="text-danger small">{{ $reviews }}</div>
                        @enderror
                    </div>
                    <input type="submit" value="Kirim" class="btn btn-primary btn-sm">
                </form>
            @endauth

            @forelse ($films->listReviews as $item)
                <div class="post">
                    <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{asset('admin/admin/dist/img/user1-128x128.jpg')}}"
                            alt="user image">
                        <span class="username">
                            <a href="#">{{ $item->user->name }}</a>
                        </span>
                        <span class="description">{{ $item->created_at->format('d M Y, H:i') }} WIB</span>
                    </div>
                    <p>
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star fa-sm {{ $item->point >= $i ? 'text-warning' : 'text-muted' }}"></i>
                        @endfor
                    </p>
                    <p>
                        {{ $item->content }}
                    </p>
                </div>
            @empty
                <div class="post">
                    <p>Belum ada ulasan</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection