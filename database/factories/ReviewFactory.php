<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vote' => $this->faker->numberBetween(1, 5),
            'comments' => $this->faker->text(),
            'user_id' => $this->faker->numberBetween(1, 20),
            'course_id' => $this->faker->numberBetween(1, 20),
        ];
    }
}
