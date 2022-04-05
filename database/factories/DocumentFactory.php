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
            'file_path' => $this->faker->url(),
            'title' => $this->faker->text(),
            'lesson_id' => $this->faker->numberBetween(1, 200),
            'type' => $this->faker->mimeType(),
        ];
    }
}