<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'name',
        'enroll_year',
        'enroll_semester',
        'study_program_id',
        'class_id',
        'level_id',
    ];

    public function program()
    {
        return $this->belongsTo(StudyProgram::class, 'study_program_id');
    }

    public function class()
    {
        return $this->belongsTo(ClassType::class, 'class_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
