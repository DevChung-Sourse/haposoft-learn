<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(CourseTagTableSeeder::class);
        $this->call(DocumentTableSeeder::class);
        $this->call(LessonTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(TeacherCourseTableSeeder::class);
        $this->call(UserCourseTableSeeder::class);
        $this->call(UserLessonTableSeeder::class);
    }
}
