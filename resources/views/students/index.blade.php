@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-10 col-md-10 col-sm-12">

                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h4 class="mb-5 font-weight-bold">Data Mahasiswa</h4>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('student.create') }}" class="btn btn-primary float-end">Tambah Data</a>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6">
                                <form action="{{ route('student.index') }}" class="row mb-3" method="get">
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="search-invoice" name="keyword"
                                               placeholder="Cari mahasiswa..." value="{{ $keyword }}">
                                        <button type="submit" class="btn btn-primary mb-3 d-none"
                                                id="search-btn">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-responsive-sm mt-3" cellspacing="0" style="font-size:12px;width:100%;" id="students-table">
                                <thead>
                                <tr class="text-center">
                                    <th width="5%">No</th>
                                    <th width="25%">NIM</th>
                                    <th width="25%">Nama</th>
                                    <th width="10%">Tahun Masuk</th>
                                    <th width="15%">Program Studi</th>
                                    <th width="10%" >Kelas</th>
                                    <th width="10%">Jenjang</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($students as $student)
                                    <tr class="text-center">
                                        <td>{{ ++$no }}</td>
                                        <td>{{ $student->nim }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->enroll_year }}</td>
                                        <td>{{ $student->program->name }}</td>
                                        <td>{{ $student->class->name }}</td>
                                        <td>{{ $student->level->name }}</td>
                                        <td>

                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                  action="{{ route('student.destroy', $student->id) }}" method="POST">
                                                <a href="{{ route('student.show', $student->id) }}"
                                                   class="btn btn-sm btn-outline-primary mb-1">view</a>
                                                <a href="{{ route('student.edit', $student->id) }}"
                                                   class="btn btn-sm btn-outline-primary mb-1">edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="8">Tidak ada data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="float-end mt-3">
                            {!! $students->links() !!}
                        </div>


                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
