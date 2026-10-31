@extends('layouts.app')

@section('title', 'Add Movie')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <div class="mb-4">
            <p class="text-uppercase text-primary fw-semibold small mb-1">Movie Archive</p>
            <h2 class="mb-1">Add a New Movie</h2>
            <p class="text-muted mb-0">Complete all fields to add a movie to the archive.</p>
        </div>

        <form method="POST" action="{{ route('movies.store') }}">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Movie Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="genre_id" class="form-label">Genre</label>
                <select class="form-select @error('genre_id') is-invalid @enderror" name="genre_id" id="genre_id">
                    <option value="">Choose a genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" @selected(old('genre_id') == $genre->id)>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                @error('genre_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="director" class="form-label">Director</label>
                <input type="text" class="form-control @error('director') is-invalid @enderror" name="director" id="director" value="{{ old('director') }}">
                @error('director')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" class="form-control @error('year') is-invalid @enderror" name="year" id="year" value="{{ old('year') }}">
                @error('year')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_featured">Featured Movie</label>
            </div>

            <button type="submit" class="btn btn-primary">Save Movie</button>
            <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection