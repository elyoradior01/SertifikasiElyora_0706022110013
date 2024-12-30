<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MembersModel;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MembersModel::insert([
            [
                'nama' => 'Joshua',
                'notelp' => '081234567890',
                'email' => 'joshuasvt@yahoo.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Jessica',
                'notelp' => '082345678901',
                'email' => 'jessica22@yahoo.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
