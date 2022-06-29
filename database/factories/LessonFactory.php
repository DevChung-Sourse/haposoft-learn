<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(),
            'description' => $this->faker->text(),
            'requirements' => $this->faker->text(),
            'time' => $this->faker->numberBetween(10, 20),
            'course_id' => $this->faker->numberBetween(1, 20),
        ];
    }
}
