<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudyProgram;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $programs = StudyProgram::orderBy('code', 'ASC')->get();
        $students = null;
        $where = [];

        $limit = 10;
        $programID = null;

        if ($request->get('submit')) {
            if (! empty($request->get('program_id'))) {
                $programID = intval($request->get('program_id'));
                $where[] = ['study_program_id', '=', $programID];
            }

            $students = Student::with('program', 'class', 'level')
                ->where($where)
                ->orderBy('id', 'DESC')
                ->get();
        }

        return view('students.reports.index', compact('students', 'programs', 'programID'))
            ->with('no', (request()->get('page', 1) - 1) * $limit);
    }
}
