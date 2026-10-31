<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $a = Genre::create(['name' => 'Action']);
        $b = Genre::create(['name' => 'Drama']);
        $c = Genre::create(['name' => 'Sci-Fi']);

        Movie::create([
            'title'       => 'Inception',
            'genre_id'    => $c->id,
            'director'    => 'Christopher Nolan',
            'year'        => 2010,
            'is_featured' => true,
        ]);

        Movie::create([
            'title'       => 'The Dark Knight',
            'genre_id'    => $a->id,
            'director'    => 'Christopher Nolan',
            'year'        => 2008,
            'is_featured' => true,
        ]);

        Movie::create([
            'title'       => 'Interstellar',
            'genre_id'    => $c->id,
            'director'    => 'Christopher Nolan',
            'year'        => 2014,
            'is_featured' => false,
        ]);

        Movie::create([
            'title'       => 'Pulp Fiction',
            'genre_id'    => $b->id,
            'director'    => 'Quentin Tarantino',
            'year'        => 1994,
            'is_featured' => false,
        ]);

        Movie::create([
            'title'       => 'The Matrix',
            'genre_id'    => $c->id,
            'director'    => 'Lana Wachowski, Lilly Wachowski',
            'year'        => 1999,
            'is_featured' => true,
        ]);
    }
}