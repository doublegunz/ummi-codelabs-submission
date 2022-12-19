<?php

namespace Database\Seeders;

use App\Models\StudyProgram;
use Illuminate\Database\Seeder;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudyProgram::create([
            'code' => '01',
            'name' => 'TEKNIK SIPIL',
        ]);

        StudyProgram::create([
            'code' => '02',
            'name' => 'KIMIA',
        ]);

        StudyProgram::create([
            'code' => '03',
            'name' => 'AGRIBISNIS',
        ]);

        StudyProgram::create([
            'code' => '04',
            'name' => 'AKUAKULTUR',
        ]);

        StudyProgram::create([
            'code' => '05',
            'name' => 'TEKNIK INFORMATIKA',
        ]);

        StudyProgram::create([
            'code' => '06',
            'name' => 'AKUNTANSI',
        ]);

        StudyProgram::create([
            'code' => '07',
            'name' => 'ADMINISTRASI PUBLIK',
        ]);

        StudyProgram::create([
            'code' => '08',
            'name' => 'ADMINISTRASI BISNIS',
        ]);

        StudyProgram::create([
            'code' => '09',
            'name' => 'SASTRA INGGRIS',
        ]);

        StudyProgram::create([
            'code' => '10',
            'name' => 'PENDIDIKAN BIOLOGI',
        ]);

        StudyProgram::create([
            'code' => '11',
            'name' => 'KEPERAWATAN',
        ]);

        StudyProgram::create([
            'code' => '12',
            'name' => 'PERPAJAKAN',
        ]);

        StudyProgram::create([
            'code' => '13',
            'name' => 'PENDIDIKAN BAHASA DAN SASTRA INDONESIA',
        ]);

        StudyProgram::create([
            'code' => '14',
            'name' => 'PENDIDIKAN MATEMATIKA',
        ]);

        StudyProgram::create([
            'code' => '15',
            'name' => 'PENDIDIKAN GURU PENDIDIKAN ANAK USIA DINI',
        ]);

        StudyProgram::create([
            'code' => '16',
            'name' => 'PENDIDIKAN GURU SEKOLAH DASAR',
        ]);

        StudyProgram::create([
            'code' => '17',
            'name' => 'PENDIDIKAN TEKNOLOGI INFORMASI',
        ]);

        StudyProgram::create([
            'code' => '18',
            'name' => 'PENDIDIKAN JASMANI KESEHATAN DAN REKREASI',
        ]);
    }
}
