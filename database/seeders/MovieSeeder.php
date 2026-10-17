<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        Movie::create([
            'title' => 'Inception',
            'director' => 'Christopher Nolan',
            'genre' => 'Sci-Fi',
            'year' => 2010,
            'is_featured' => true,
        ]);

        Movie::create([
            'title' => 'The Dark Knight',
            'director' => 'Christopher Nolan',
            'genre' => 'Action',
            'year' => 2008,
            'is_featured' => true,
        ]);

        Movie::create([
            'title' => 'Pulp Fiction',
            'director' => 'Quentin Tarantino',
            'genre' => 'Crime',
            'year' => 1994,
            'is_featured' => false,
        ]);

        Movie::create([
            'title' => 'Interstellar',
            'director' => 'Christopher Nolan',
            'genre' => 'Sci-Fi',
            'year' => 2014,
            'is_featured' => false,
        ]);

        Movie::create([
            'title' => 'Django Unchained',
            'director' => 'Quentin Tarantino',
            'genre' => 'Action',
            'year' => 2012,
            'is_featured' => false,
        ]);
    }
}