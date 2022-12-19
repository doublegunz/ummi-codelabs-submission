<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use App\Models\Level;
use App\Models\Student;
use App\Models\StudyProgram;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $limit = 10;
        $keyword = null;
        $students = Student::with('program', 'class', 'level')
            ->orderBy('id', 'DESC')
            ->paginate($limit);

        [$keyword, $students] = $this->getStudents($keyword, $limit, $students);

        return view('students.index', compact('students', 'keyword'))
            ->with('no', (request()->get('page', 1) - 1) * $limit);
    }

    public function create()
    {
        $programs = StudyProgram::orderBy('code', 'ASC')->get();
        $classes = ClassType::orderBy('id', 'ASC')->get();
        $levels = Level::orderBy('id', 'DESC')->get();

        return view('students.create', compact('programs', 'classes', 'levels'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:150',
            'enroll_year' => 'required|integer|max_digits:4',
            'enroll_semester' => 'required|integer|min:0|max:14|max_digits:2',
            'study_program_id' => 'required|integer|exists:study_programs,id',
            'class_id' => 'required|integer|exists:class_types,id',
            'level_id' => 'required|integer|exists:levels,id',
        ]);

        try {
            \DB::beginTransaction();

            $name = $request->get('name');
            $enrollYear = $request->get('enroll_year');
            $enrollSemester = $request->get('enroll_semester');
            $programID = $request->get('study_program_id');
            $classID = $request->get('class_id');
            $levelID = $request->get('level_id');
            $nomer = 1;
            $nim = null;

            $studyProgram = StudyProgram::findOrFail($programID);

            $checkData = Student::where([
                ['enroll_year', '=', $enrollYear],
                ['enroll_semester', '=', $enrollSemester],
                ['study_program_id', '=', $programID],
            ])->orderBy('id', 'DESC')
                ->first();

            if ($checkData == null) {
                $nomer = sprintf('%03d', $nomer);
                $nim = date('y', strtotime($enrollYear)).$levelID.$studyProgram->code.$classID.$enrollSemester.$nomer;
            } else {
                $lastNomer = substr($checkData->nim, -3);
                $nim = $this->generateNim($lastNomer, $enrollYear, $levelID, $studyProgram->code, $classID, $enrollSemester);
            }

            Student::create([
                'nim' => $nim,
                'name' => $name,
                'enroll_year' => $enrollYear,
                'enroll_semester' => $enrollSemester,
                'study_program_id' => $studyProgram->id,
                'class_id' => $classID,
                'level_id' => $levelID,
            ]);

            \DB::commit();

            return redirect()->route('student.index')
                ->with('success', 'Data mahasiswa berhasil disimpan.');
        } catch (\Throwable $throwable) {
            \DB::rollBack();

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan dalam server. Silakan coba lagi.');
        }
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $programs = StudyProgram::orderBy('code', 'ASC')->get();
        $classes = ClassType::orderBy('id', 'ASC')->get();
        $levels = Level::orderBy('id', 'DESC')->get();

        return view('students.edit', compact('programs', 'classes', 'levels', 'student'));
    }

    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'name' => 'required|min:1|max:150',
            'enroll_year' => 'required|integer|max_digits:4',
            'enroll_semester' => 'required|integer|min:0|max:14|max_digits:2',
            'study_program_id' => 'required|integer|exists:study_programs,id',
            'class_id' => 'required|integer|exists:class_types,id',
            'level_id' => 'required|integer|exists:levels,id',
        ]);

        try {
            \DB::beginTransaction();

            $name = $request->get('name');
            $enrollYear = $request->get('enroll_year');
            $enrollSemester = $request->get('enroll_semester');
            $programID = $request->get('study_program_id');
            $classID = $request->get('class_id');
            $levelID = $request->get('level_id');
            $nomer = 1;
            $nim = null;

            // generate nim baru apabila
            // mahasiswa pindah program studi
            if ($programID != $student->study_program_id) {
                $studyProgram = StudyProgram::findOrFail($programID);

                $checkData = Student::where([
                    ['enroll_year', '=', $enrollYear],
                    ['enroll_semester', '=', $enrollSemester],
                    ['study_program_id', '=', $programID],
                ])->orderBy('id', 'DESC')
                    ->first();

                if ($checkData == null) {
                    $nomer = sprintf('%03d', $nomer);
                    $nim = date('y', strtotime($enrollYear)).$levelID.$studyProgram->code.$classID.$enrollSemester.$nomer;
                } else {
                    $lastNomer = substr($checkData->nim, -3);
                    $nim = $this->generateNim($lastNomer, $enrollYear, $levelID, $studyProgram->code, $classID, $enrollSemester);
                }
            }

            $student->name = $name;
            $student->enroll_year = $enrollYear;
            $student->enroll_semester = $enrollSemester;
            $student->study_program_id = $programID;
            $student->class_id = $classID;
            $student->level_id = $levelID;

            if ($nim != null) {
                $student->nim = $nim;
            }

            $student->save();

            \DB::commit();

            return redirect()->route('student.index')
                ->with('success', 'Data mahasiswa berhasil diperbaharui.');
        } catch (\Throwable $throwable) {
            \DB::rollBack();

            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan dalam server. Silakan coba lagi.');
        }
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('student.index')
            ->with('success', 'Data berhasil dihapus.');
    }

    public function getStudents(mixed $keyword, int $limit, $students): array
    {
        if (! empty(\request()->get('keyword'))) {
            $keyword = \request()->get('keyword');
            $students = Student::with('program', 'class', 'level')
                ->where('name', 'LIKE', '%'.$keyword.'%')
                ->orWhere('nim', 'LIKE', '%'.$keyword.'%')
                ->orderBy('id', 'DESC')
                ->paginate($limit);
        }

        return [$keyword, $students];
    }

    private function generateNim($initialNumber, $enrollYear, $levelID, $programCode, $classID, $enrollSemester)
    {
        $nomer = intval($initialNumber) + 1;
        $nomer = sprintf('%03d', $nomer);
        $nim = date('y', strtotime($enrollYear)).$levelID.$programCode.$classID.$enrollSemester.$nomer;

        if ($this->nimExist($nim)) {
            $nim = $this->generateNim($nomer);
        }

        return $nim;
    }

    private function nimExist($nim)
    {
        return Student::where('nim', $nim)->exists();
    }
}
