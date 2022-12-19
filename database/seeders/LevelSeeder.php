<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'code' => '1',
            'name' => 'S3',
        ]);

        Level::create([
            'code' => '2',
            'name' => 'S2',
        ]);

        Level::create([
            'code' => '3',
            'name' => 'S1',
        ]);

        Level::create([
            'code' => '4',
            'name' => 'D3',
        ]);

        Level::create([
            'code' => '5',
            'name' => 'D2',
        ]);

        Level::create([
            'code' => '6',
            'name' => 'D1',
        ]);
    }
}
