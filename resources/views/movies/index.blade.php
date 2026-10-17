@extends('layouts.app')

@section('title', 'All Movies')

@section('content')
    {{-- Success Alert Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <p class="text-muted mb-0">Prepared by: Sean Patrick T. Buenafe | Block 4C</p>
                </div>
                <a href="{{ route('movies.featured') }}" class="btn btn-primary">View featured</a>
            </div>

            <div class="alert alert-info py-2">
                <strong>Active filters:</strong> 
                Genre: {{ $selectedGenre ? $selectedGenre : 'All genres' }} | 
                Director: {{ $selectedDirector ? $selectedDirector : 'All directors' }}
            </div>

            <div class="row mb-4">
                <div class="col-md-6 mb-2">
                    <label class="fw-bold d-block mb-1">Filter by Genre:</label>
                    <a href="{{ route('movies.index', ['genre' => 'Sci-Fi', 'director' => $selectedDirector]) }}" 
                       class="btn btn-sm {{ $selectedGenre === 'Sci-Fi' ? 'btn-primary' : 'btn-outline-primary' }}">Sci-Fi</a>
                    <a href="{{ route('movies.index', ['genre' => 'Action', 'director' => $selectedDirector]) }}" 
                       class="btn btn-sm {{ $selectedGenre === 'Action' ? 'btn-primary' : 'btn-outline-primary' }}">Action</a>
                    <a href="{{ route('movies.index', ['genre' => 'Crime', 'director' => $selectedDirector]) }}" 
                       class="btn btn-sm {{ $selectedGenre === 'Crime' ? 'btn-primary' : 'btn-outline-primary' }}">Crime</a>
                </div>

                <div class="col-md-6 mb-2">
                    <label class="fw-bold d-block mb-1">Filter by Director:</label>
                    <a href="{{ route('movies.index', ['genre' => $selectedGenre, 'director' => 'Christopher Nolan']) }}" 
                       class="btn btn-sm {{ $selectedDirector === 'Christopher Nolan' ? 'btn-warning' : 'btn-outline-warning' }}">Christopher Nolan</a>
                    <a href="{{ route('movies.index', ['genre' => $selectedGenre, 'director' => 'Quentin Tarantino']) }}" 
                       class="btn btn-sm {{ $selectedDirector === 'Quentin Tarantino' ? 'btn-warning' : 'btn-outline-warning' }}">Quentin Tarantino</a>
                </div>
            </div>

            {{-- Added the Add movie button & clear filters here --}}
            <div class="mb-3">
                <a href="{{ route('movies.create') }}" class="btn btn-success">Add movie</a>
                <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary">Clear both filters</a>
            </div>

            <table class="table table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Movie Title</th>
                        <th>Genre</th>
                        <th>Director</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($movies as $movie)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $movie['id'] }}</td>
                            <td>
                                <a href="{{ route('movies.show', $movie['id']) }}" class="text-decoration-none fw-semibold">
                                    {{ $movie['title'] }}
                                </a>
                            </td>
                            <td><span class="badge bg-info text-dark">{{ $movie['genre'] }}</span></td>
                            <td>{{ $movie['director'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No movies found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection