<?php

namespace Database\Factories;

use App\Models\UserLesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserLessonFactory extends Factory
{
    protected $model = UserLesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 20),
            'lesson_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
