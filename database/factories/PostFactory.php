<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\post;
use App\Models\tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = category::pluck('id')->toArray();
        return [
            'user_id' => 1,
            'title' => fake()->sentence(),
            'content' => fake()->text(),
            'thumbnail' => 'uploads/' . fake()->randomElement(['shirt1.jpg', 'shirt2.jpg', 'shirt3.jpg', 'shirt4.jpg', 'shoe1.jpg', 'shoe2.jpg', 'shoe3.jpg', 'shoe4.jpg', 'sock1.jpg', 'sock2.jpg']),
            'category_id' => fake()->randomElement($category),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (post $post) {
            $tags = tag::pluck('id')->toArray();
            $post->Tags()->sync(fake()->randomElement($tags, 2));
        });
    }
}
