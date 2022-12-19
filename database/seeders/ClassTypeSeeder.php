<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassType::create([
            'code' => '1',
            'name' => 'Reguler',
        ]);

        ClassType::create([
            'code' => '2',
            'name' => 'Non Reguler',
        ]);
    }
}
