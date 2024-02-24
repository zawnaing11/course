<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'admin_id' => 1,
            'name' => 'admin',
            'email' => 'zawnaing@gmail.com',
            'password' => 'password',
        ]);
    }
}
