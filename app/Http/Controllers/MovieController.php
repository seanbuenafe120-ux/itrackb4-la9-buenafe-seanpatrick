<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    private function movies(): array
    {
        $path = storage_path('app/movies.json');
        if (!file_exists($path)) {
            return [];
        }
        return json_decode(file_get_contents($path), true);
    }

    private function saveMovies(array $movies): void
    {
        $path = storage_path('app/movies.json');
        file_put_contents($path, json_encode($movies, JSON_PRETTY_PRINT));
    }

    public function index(Request $request)
    {
        $genre = $request->query('genre');
        $director = $request->query('director');

        $query = Movie::query();

        if ($genre) {
            $query->where('genre', $genre);
        }

        if ($director) {
            $query->where('director', $director);
        }

        $movies = $query->get();

        return view('movies.index', [
            'movies' => $movies,
            'selectedGenre' => $genre,
            'selectedDirector' => $director,
        ]);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'genre' => 'required|max:50',
            'director' => 'required|max:100',
            'year' => 'required|integer',
        ]);

        Movie::create($validated);

        return redirect()
            ->route('movies.index')
            ->with('success', 'Movie added successfully.');
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies.show', compact('movie'));
    }

    public function featured()
    {
        $movie = Movie::where('is_featured', true)->first() ?? Movie::first();

        return view('movies.show', ['movie' => $movie]);
    }
}