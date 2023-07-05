<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Seed Estudiantes
use Database\Seeders\StudentSeeder;
use Database\Factories\StudentFactory;

// Seed Usuarios
use Database\Seeders\UserSeeder;
use Database\Factories\UserFactory;

// Seed Materias
use Database\Seeders\SubjectSeeder;

// Seed Dias
use Database\Seeders\DaySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //$this->call([StudentSeeder::class]);

        \App\Models\Student::factory(100)->create();

        \App\Models\User::factory(10)->create();

        $this->call([CareerSeeder::class]);

        $this->call([DaySeeder::class]);
    }
}
