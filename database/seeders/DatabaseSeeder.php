<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@damsobi.my.id',
            'isAdmin' => true,
            'password' => Hash::make('rahasia')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Admin2',
            'email' => 'admin2@damsobi.my.id',
            'isAdmin' => true,
            'password' => Hash::make('password')
        ]);




        $this->call(CategorySeeder::class);
    }
}
