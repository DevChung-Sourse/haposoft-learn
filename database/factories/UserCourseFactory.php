<?php

namespace Database\Factories;

use App\Models\UserCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserCourseFactory extends Factory
{
    protected $model = UserCourse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 20),
            'course_id' => $this->faker->numberBetween(1, 20),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
