<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('ranges')->insert([
            [
                'rangos' => 'gerente', 
                
            ],
            [
                'rangos' => 'cocinero', 
               
            ],
            [
                'rangos' => 'mesero', 
              
            ],

             [
                'rangos' => 'sin asignar', 
              
            ],
        ]);

    }
}
