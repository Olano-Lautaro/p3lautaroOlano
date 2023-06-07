<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subjects')->insert([
            "name"=> "Programación III"
        ]);

        DB::table('subjects')->insert([
            "name"=> "Estadística"
        ]);

        DB::table('subjects')->insert([
            "name"=> "Práctica Profesionalizante III"
        ]);

        DB::table('subjects')->insert([
            "name"=> "Seminario de Fé y Cultura"
        ]);

        DB::table('subjects')->insert([
            "name"=> "Derechos Humanos"
        ]);

        DB::table('subjects')->insert([
            "name"=> "Ingeniería de Software"
        ]);

        DB::table('subjects')->insert([
            "name"=> "Auditoría en Sistemas"
        ]);

        DB::table('subjects')->insert([
            "name"=> "Análisis y Diseño II"
        ]);

        DB::table('subjects')->insert([
            "name"=> "Programacion en Dispositivos Móviles"
        ]);
    }
}
