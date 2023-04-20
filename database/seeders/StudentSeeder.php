<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'name'=> 'Lautaro',
            'lastname'=> 'Olano',
            'dni'=> '43828075',
            'birthdate'=> '2002/03/05',
            'status'=>1
        ]);
    }
}
