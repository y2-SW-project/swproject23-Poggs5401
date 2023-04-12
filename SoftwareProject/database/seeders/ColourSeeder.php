<?php

namespace Database\Seeders;

use App\Models\COlour;
use App\Models\Clothing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Colour::factory()
        ->times(5)
        ->create();

        foreach(Clothing::all() as $clothing)
        {
            $colour = Colour::inRandomOrder()->take(rand(1,3))->pluck('id');
            $clothing->authors()->attach($colour);
        }
    }
}