<?php

namespace Database\Factories;

use App\Models\CourseTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseTagFactory extends Factory
{
    protected $model = CourseTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->numberBetween(1, 20),
            'tag_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
