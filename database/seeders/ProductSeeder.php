<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create categories first
        $categories = Category::factory(3)->create();

        // Create 5 products
        Product::factory(5)
            ->create()
            ->each(function ($product) use ($categories) {
                // Assign random category
                $product->category_id = $categories->random()->id;
                $product->save();

                // Create 2-4 images for each product
                ProductImage::factory(fake()->numberBetween(2, 4))
                    ->create([
                        'product_id' => $product->id,
                    ])
                    ->each(function ($image, $index) {
                        $image->order = $index;
                        $image->save();
                    });
            });
    }
}

