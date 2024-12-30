<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BooksModel;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BooksModel::insert([
            [
                'title' => 'Harry Potter and the Philosopher Stone',
                'author' => 'J.K Rowling',
                'pub_date' => '1990-04-10 00:00:00', // Use a valid DateTime string
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Percy Jackson and the Lightning Thief',
                'author' => 'Rick Riordan',
                'pub_date' => '2004-06-08 00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Hunger Games',
                'author' => 'Suzanne Collins',
                'pub_date' => '2008-07-11 00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe',
                'author' => 'C.S. Lewis',
                'pub_date' => '1950-10-16 00:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
