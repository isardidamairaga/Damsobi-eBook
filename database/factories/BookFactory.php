<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->word(3),
            "book_url" => $this->faker->url(),
            "cover_url" => $this->faker->imageUrl(category:"book"),
            "sipnosis" => $this->faker->realTextBetween(100, 500),
            "category_id" => Category::all()->pluck('id')->random(),
        ];
    }
}
