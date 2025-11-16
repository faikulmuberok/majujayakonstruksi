<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create categories if not exists
        $categories = Category::factory(5)->create();

        // Create tags
        $tags = Tag::factory(10)->create();

        // Create 10 articles
        Article::factory(10)
            ->create()
            ->each(function ($article) use ($categories, $tags) {
                // Assign random category
                $article->category_id = $categories->random()->id;
                $article->save();

                // Attach 2-4 random tags
                $article->tags()->attach(
                    $tags->random(fake()->numberBetween(2, 4))->pluck('id')
                );
            });
    }
}

