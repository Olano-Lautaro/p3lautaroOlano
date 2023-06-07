<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('days')->insert([
            'day'=>"Domingo"
        ]); 

        DB::table('days')->insert([
            'day'=>"Lunes"
        ]); 

        DB::table('days')->insert([
            'day'=>"Martes"
        ]); 

        DB::table('days')->insert([
            'day'=>"Miércoles"
        ]); 

        DB::table('days')->insert([
            'day'=>"Jueves"
        ]); 

        DB::table('days')->insert([
            'day'=>"Viernes"
        ]); 

        DB::table('days')->insert([
            'day'=>"Sábado"
        ]); 
    }
}
