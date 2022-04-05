<?php

namespace Database\Factories;

use App\Models\TeacherCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherCourseFactory extends Factory
{
    protected $model = TeacherCourse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween($min = 1, $max = 100),
            'course_id' => $this->faker->numberBetween($min = 1, $max = 100),
        ];
    }
}
