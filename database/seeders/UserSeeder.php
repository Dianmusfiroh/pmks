<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.id',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
        ]);
        $kecamatan = User::create([
            'name' => 'kecamatan',
            'email' => 'kecamatan@kecamatan.id',
            'role' => 'kecamatan',
            'password' => bcrypt('12345678'),
        ]);
        $admin = User::create([
            'name' => 'Dinsos',
            'email' => 'dinsos@dinsos.id',
            'role' => 'dinsos',
            'password' => bcrypt('12345678'),
        ]);

    }
}
