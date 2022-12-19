@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-lg-9 col-md-9 col-sm-12">

                <div class="card">

                    <div class="card-body">
                        <h4 class="mb-3">Tambah Data</h4>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                            <form action="{{ route('student.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="name">Nama Mahasiswa</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" required autofocus>

                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="enroll_year">Tahun Masuk</label>
                                    <select name="enroll_year" id="enroll_year"
                                            class="form-control @error('enroll_year') is-invalid @enderror" required>
                                        <option value="" selected>--- Pilih Tahun Masuk ---</option>

                                        @for($year = 2018; $year <= 2030; $year++)
                                            <option value="{{ $year }}" {{ old('enroll_year') == $year ? 'selected':'' }}>{{ $year }}</option>
                                        @endfor

                                    </select>
                                    @error('enroll_year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="enroll_semester">Semester Masuk</label>
                                    <select name="enroll_semester" id="enroll_semester"
                                            class="form-control @error('enroll_semester') is-invalid @enderror" required>
                                        <option value="" selected>--- Pilih Semester Masuk ---</option>

                                        @for($semester = 1; $semester <= 14; $semester++)
                                            <option value="{{ $semester }}" {{ old('enroll_semester') == $semester ? 'selected':'' }}>{{ $semester }}</option>
                                        @endfor

                                    </select>
                                    @error('enroll_semester')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="study_program_id">Program Studi</label>
                                    <select name="study_program_id" id="study_program_id"
                                            class="form-control @error('study_program_id') is-invalid @enderror" required>
                                        <option value="" selected>--- Pilih Program Studi ---</option>
                                        @forelse($programs as $program)
                                            <option value="{{ $program->id }}" {{ old('study_program_id') == $program->id ? 'selected':'' }}>{{ $program->name }}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                    @error('study_program_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="class_id">Kelas</label>
                                    <select name="class_id" id="class_id"
                                            class="form-control @error('class_id') is-invalid @enderror" required>
                                        <option value="" selected>--- Pilih Kelas ---</option>
                                        @forelse($classes as $class)
                                            <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected':'' }}>{{ $class->name }}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                    @error('class_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="level_id">Jenjang</label>
                                    <select name="level_id" id="level_id"
                                            class="form-control @error('level_id') is-invalid @enderror" required>
                                        <option value="" selected>--- Pilih Jenjang ---</option>
                                        @forelse($levels as $level)
                                            <option value="{{ $level->id }}" {{ old('level_id') == $level->id ? 'selected':'' }}>{{ $level->name }}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                    @error('level_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md btn-primary">Save</button>
                                <a href="{{ route('student.index') }}" class="btn btn-md btn-secondary">back</a>

                            </form>


                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
