<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('careers')->insert([
            "name"=> "Sistemas"
        ]);

        DB::table('careers')->insert([
            "name"=> "Economias"
        ]);

        DB::table('careers')->insert([
            "name"=> "Lengua"
        ]);

        DB::table('careers')->insert([
            "name"=> "Ingles"
        ]);

        DB::table('careers')->insert([
            "name"=> "Historia"
        ]);

       
    }
}
