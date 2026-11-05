<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User dengan role admin, staff, viewer
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);

        $authors = Author::factory(10)->create();
        $categories = Category::all();

        // 50 buku, masing-masing punya 1-3 kategori acak
        Book::factory(50)
            ->create(['author_id' => fn () => $authors->random()->id])
            ->each(function (Book $book) use ($categories) {
                $book->categories()->attach(
                    $categories->random(rand(1, 3))->pluck('id')
                );
            });
    }
}
