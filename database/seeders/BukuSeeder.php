<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;
use Faker\Factory as Faker;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Buku::create([
                'judul' => fake()->sentence(3),
                'penulis' => fake()->name(),
                'harga' => fake()-> numberBetween(10000,50000),
                'tgl_terbit' => fake()->date(),      
            ]);
        } 
    }
}
