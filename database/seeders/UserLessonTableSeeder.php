<?php

namespace Database\Seeders;

use App\Models\UserLesson;
use Illuminate\Database\Seeder;

class UserLessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserLesson::factory()->count(50)->create();
    }
}
