<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            'name' => 'Shirt',
            'price' => 400,
            'quantity' => 18,
            'image_path'=>null,
        ]);
        DB::table('products')->insert([
            'name' => 'Pant',
            'price' => 800,
            'quantity' => 12,
            'image_path'=>null,
        ]);
        DB::table('products')->insert([
            'name' => 'Panjabi',
            'price' => 1200,
            'quantity' => 28,
            'image_path'=>null,
        ]);
        DB::table('products')->insert([
            'name' => 'Paijama',
            'price' => 300,
            'quantity' => 24,
            'image_path'=>null,
        ]);
        
    }
}
