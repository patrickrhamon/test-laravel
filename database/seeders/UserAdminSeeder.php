<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@hotel.com',
             'password' => bcrypt('123456'),
         ]);
    }
}
