<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        DB::enableQueryLog();

        $selectedGenre = $request->query('genre');
        $selectedDirector = $request->query('director');

        $query = Movie::with('genre');

        if ($selectedGenre) {
            $query->whereHas('genre', function ($q) use ($selectedGenre) {
                $q->where('name', $selectedGenre);
            });
        }

        if ($selectedDirector) {
            $query->where('director', $selectedDirector);
        }

        $movies = $query->get();

        $genres = Genre::all();

        $queryCount = count(DB::getQueryLog());

        return view('movies.index', compact('movies', 'selectedGenre', 'selectedDirector', 'genres', 'queryCount'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'genre_id'    => 'required|exists:genres,id',
            'director'    => 'required|string|max:255',
            'year'        => 'required|integer',
            'is_featured' => 'nullable|boolean',
        ]);

        Movie::create($validated);

        return redirect()->route('movies.index')->with('success', 'Movie added successfully!');
    }
}