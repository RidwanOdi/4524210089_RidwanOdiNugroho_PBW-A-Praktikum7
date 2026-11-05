<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Fiction', 'Non-Fiction', 'Science', 'History', 'Technology', 'Biography', 'Fantasy', 'Education'] as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
