<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        {
            $authors = Author::factory(10)->create();
            $books = Book::factory(20)->create();

            foreach ($books as $book) {
                $randomAuthors = $authors->random(rand(1, 3));
                $book->authors()->attach($randomAuthors);
            }


        }
    }
}
