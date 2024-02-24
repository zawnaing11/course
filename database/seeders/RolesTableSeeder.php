<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'teacher', 'staff', 'student'];

        array_map(function ($role) {
            Role::create([
                'name' => $role,
                'slug' => Str::slug($role, '-')
            ]);
        }, $roles);
    }
}
