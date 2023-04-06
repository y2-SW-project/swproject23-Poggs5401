<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Hoodies';
        $category->description = 'Sweatshirt with a hood attached that may also have a kangaroo pocket or full zipper.';
        $category->save();

        $category = new Category();
        $category->name = 'T-Shirts';
        $category->description = 'Shirts with short sleeves, featuring a round or V-shaped neckline.';
        $category->save();

        $category = new Category();
        $category->name = 'Jackets';
        $category->description = 'Outerwear designed for layering and/or keeping warm, often featuring multiple pockets and a full length zip.';
        $category->save();

        $category = new Category();
        $category->name = 'Trousers';
        $category->description = 'Clothing worn from the waist to anywhere between the knees and the ankles, covering both legs separately.';
        $category->save();

        $category = new Category();
        $category->name = 'Shoes';
        $category->description = 'Footwear that covers the foot and protects it with a sole.';
        $category->save();
    }
}
