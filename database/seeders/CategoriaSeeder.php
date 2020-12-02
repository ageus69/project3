<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert(['name' => 'edificios altos']);
        DB::table('categorias')->insert(['name' => 'edificios chiquitos']);
        DB::table('categorias')->insert(['name' => 'escuelas']);
        DB::table('categorias')->insert(['name' => 'parques']);
        DB::table('categorias')->insert(['name' => 'casas']);
    }
}
