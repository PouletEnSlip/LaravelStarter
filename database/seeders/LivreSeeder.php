<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LivreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Book::factory()->count(10)->create();
    }
}
