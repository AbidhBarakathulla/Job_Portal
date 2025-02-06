<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => 'password123'
        // ]);
        //         User::factory(10)->create();
        
                // Book::create([
                //     'title' => 'Rich dad Poor dad',
                //     'author' => 'Abidh',
                //     'description' => 'This book has topics about the rich and poor dad.'
                // ]);
                        Book::factory(10)->create();
    }
}
