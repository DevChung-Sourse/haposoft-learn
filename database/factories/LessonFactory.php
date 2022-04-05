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
            'title' => $this->faker->text($maxNbchar = 200),
            'description' => $this->faker->text(),
            'requirements' => $this->faker->text(),
            'course_id' => $this->faker->numberBetween($min = 1, $max = 200),
        ];
    }
}
