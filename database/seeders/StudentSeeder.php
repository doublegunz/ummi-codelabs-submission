<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'nim' => '1841111073',
            'name' => 'ADAM NUGRAHA',
            'enroll_year' => '2018',
            'level_id' => 4,
            'study_program_id' => 11,
            'class_id' => 1,
            'enroll_semester' => 1,
        ]);

        Student::create([
            'nim' => '1830425001',
            'name' => 'FAIZAL JARKASIH',
            'enroll_year' => '2018',
            'level_id' => 3,
            'study_program_id' => 4,
            'class_id' => 2,
            'enroll_semester' => 5,
        ]);

        Student::create([
            'nim' => '1841111072',
            'name' => 'SITI MASITOH',
            'enroll_year' => '2018',
            'level_id' => 4,
            'study_program_id' => 11,
            'class_id' => 1,
            'enroll_semester' => 1,
        ]);

        Student::create([
            'nim' => '1830721006',
            'name' => 'ZAKIA ADITIA',
            'enroll_year' => '2018',
            'level_id' => 3,
            'study_program_id' => 7,
            'class_id' => 2,
            'enroll_semester' => 1,
        ]);

        Student::create([
            'nim' => '1830811121',
            'name' => 'SRI INDAH',
            'enroll_year' => '2018',
            'level_id' => 3,
            'study_program_id' => 8,
            'class_id' => 1,
            'enroll_semester' => 1,
        ]);

        Student::create([
            'nim' => '1832011031',
            'name' => 'MUHAMMAD RIDHO',
            'enroll_year' => '2018',
            'level_id' => 3,
            'study_program_id' => 2,
            'class_id' => 1,
            'enroll_semester' => 1,
        ]);

        Student::create([
            'nim' => '1831811036',
            'name' => 'NANDA PRIHANDANA',
            'enroll_year' => '2018',
            'level_id' => 3,
            'study_program_id' => 18,
            'class_id' => 1,
            'enroll_semester' => 1,
        ]);

        Student::create([
            'nim' => '1831027002',
            'name' => 'SELAMET MAULANA',
            'enroll_year' => '2018',
            'level_id' => 3,
            'study_program_id' => 10,
            'class_id' => 2,
            'enroll_semester' => 7,
        ]);

        Student::create([
            'nim' => '1830111069',
            'name' => 'NUR AISYAH',
            'enroll_year' => '2018',
            'level_id' => 3,
            'study_program_id' => 1,
            'class_id' => 1,
            'enroll_semester' => 1,
        ]);
    }
}
