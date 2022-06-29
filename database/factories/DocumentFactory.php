<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'file_path' => $this->faker->imageUrl(),
            'title' => $this->faker->catchPhrase(),
            'lesson_id' => $this->faker->numberBetween(1, 50),
            'type' => $this->faker->lastName(),
        ];
    }
}
