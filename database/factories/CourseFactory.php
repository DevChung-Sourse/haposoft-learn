<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->firstName(),
            'thumbnail' => $this->faker->imageUrl(300, 400),
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(20, 200),
        ];
    }
}
