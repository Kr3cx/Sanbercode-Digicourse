@extends('layouts.master')

@section('title')
    Edit Films
@endsection

@section('content')

    <form action="{{ route('films.update', $films->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $films->title) }}"
                required>
        </div>

        <div class="form-group">
            <label for="summary">Summary</label>
            <textarea class="form-control" id="summary" name="summary"
                required>{{ old('summary', $films->summary) }}</textarea>
        </div>

        <div class="form-group">
            <label for="release_year">Release Year</label>
            <input type="number" class="form-control" id="release_year" name="release_year"
                value="{{ old('release_year', $films->release_year) }}" min="1900" max="{{ date('Y') }}" required>
        </div>

        {{-- start bagian foto --}}
        <div class="form-group">
            <label for="poster" class="form-label fw-bold">Upload Poster</label>

            <div id="drop-area"
                class="border border-primary rounded-3 p-3 d-flex flex-column align-items-center justify-content-center"
                style="width: 100%; max-width: 300px; height: 200px; background-color: #f8f9fa; cursor: pointer;"
                onclick="document.getElementById('poster').click()" ondragover="handleDragOver(event)"
                ondragleave="handleDragLeave(event)" ondrop="handleDrop(event)">

                <i class="bi bi-upload fs-1 text-primary"></i>
                <p class="text-muted m-0">Klik atau tarik file ke sini</p>
            </div>

            <input type="file" class="form-control d-none" id="poster" name="poster" accept="image/*"
                onchange="previewFile()">

            <div id="preview-container" class="mt-3 d-none">
                <p class="fw-bold">Preview Poster:</p>
                <div class="border rounded shadow-sm p-2" style="width: 200px;">
                    <img id="preview-image" src="" alt="Preview" class="img-fluid rounded">
                </div>
            </div>

            @if(isset($films->poster))
                <div class="mt-3">
                    <p class="fw-bold">Poster Saat Ini:</p>
                    <div class="border rounded shadow-sm p-2" style="width: 200px;">
                        <img src="{{ asset('uploads/' . $films->poster) }}" alt="Poster" class="img-fluid rounded">
                    </div>
                </div>
            @endif
        </div>

        <script>
            const dropArea = document.getElementById("drop-area");
            const fileInput = document.getElementById("poster");
            const previewContainer = document.getElementById("preview-container");
            const previewImage = document.getElementById("preview-image");

            function handleDragOver(event) {
                event.preventDefault();
                dropArea.classList.add("border-success");
                dropArea.style.backgroundColor = "#e9f7ef";
            }

            function handleDragLeave(event) {
                event.preventDefault();
                dropArea.classList.remove("border-success");
                dropArea.style.backgroundColor = "#f8f9fa";
            }

            function handleDrop(event) {
                event.preventDefault();
                dropArea.classList.remove("border-success");
                dropArea.style.backgroundColor = "#f8f9fa";

                const files = event.dataTransfer.files;
                if (files.length > 0) {
                    fileInput.files = files;
                    previewFile();
                }
            }

            function previewFile() {
                const file = fileInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImage.src = e.target.result;
                        previewContainer.classList.remove("d-none");
                    };
                    reader.readAsDataURL(file);
                }
            }
        </script>
        {{-- end bagian foto --}}

        <div class="form-group">
            <label for="genre_id">Genre</label>
            <select class="form-control" id="genre_id" name="genre_id" required>
                <option value="">Pilih Genre</option>
                @forelse ($genres as $item)
                    <option value="{{ $item->id }}" {{ old('genre_id', $films->genre_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @empty
                    <option value="">Belum ada Genre</option>
                @endforelse
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection