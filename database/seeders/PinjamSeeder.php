<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PinjamModel;

class PinjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PinjamModel::insert([
            [
                'member_id' => 1, // Ensure this matches a valid member ID
                'book_id' => 1,   // Ensure this matches a valid book ID
                'borrow_date' => '2024-12-01',
                'due_date' => '2024-12-08', // Borrow date + 7 days
                'returned_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_id' => 2, // Ensure this matches a valid member ID
                'book_id' => 2,   // Ensure this matches a valid book ID
                'borrow_date' => '2024-11-20',
                'due_date' => '2024-11-27', // Borrow date + 7 days
                'returned_at' => '2024-11-26', // Returned within the due date
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'member_id' => 1, // Ensure this matches a valid member ID
                'book_id' => 3,   // Ensure this matches a valid book ID
                'borrow_date' => '2024-11-25',
                'due_date' => '2024-12-02', // Borrow date + 7 days
                'returned_at' => null, // Not yet returned
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
    }
}
