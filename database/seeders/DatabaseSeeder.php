<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create an Administrator
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => Role::Administrator,
        ]);

        // Create an Author
        User::factory()->create([
            'name' => 'Author User',
            'email' => 'author@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => Role::Author,
        ]);

        // Create a Reader
        User::factory()->create([
            'name' => 'Reader User',
            'email' => 'reader@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => Role::Reader,
        ]);

        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
        ]);
    }
}
