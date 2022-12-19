<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UsersSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(StudyProgramSeeder::class);
        $this->call(ClassTypeSeeder::class);
        $this->call(StudentSeeder::class);
    }
}
