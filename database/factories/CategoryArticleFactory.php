<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\CategoryArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model
     *
     * @var string
     */
    protected $model = CategoryArticle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categories = [1, 2];
        $articles = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

        return [
            'fk_category' => $this->faker->randomElement($categories),
            'fk_article' => $this->faker->randomElement($articles),
        ];
    }
}
