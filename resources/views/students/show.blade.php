@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-lg-9 col-md-9 col-sm-12">

                <div class="card">

                    <div class="card-body">
                        <h4 class="mb-3">Detail Mahasiswa</h4>

                        <table class="table table-responsive-sm mt-3" cellspacing="0" style="font-size:12px;width:100%;" id="students-table">
                            <tr>
                                <th>nim</th>
                                <td>{{ $student->nim }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $student->name }}</td>
                            </tr>
                            <tr>
                                <th>Tahun masuh</th>
                                <td>{{ $student->enroll_year }}</td>
                            </tr>
                            <tr>
                                <th>Semester Masuk</th>
                                <td>{{ $student->enroll_semester }}</td>
                            </tr>
                            <tr>
                                <th>Program Studi</th>
                                <td>{{ $student->program->name }}</td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td>{{ $student->class->name }}</td>
                            </tr>
                            <tr>
                                <th>Jenjang</th>
                                <td>{{ $student->level->name }}</td>
                            </tr>

                        </table>

                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-md btn-outline-info">Edit</a>
                            <a href="{{ route('student.index') }}" class="btn btn-md btn-link">back</a>

                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
