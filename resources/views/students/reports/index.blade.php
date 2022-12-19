@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-10 col-md-10 col-sm-12">
                <div class="card p-3 mb-3">

                    <div class="card-body">
                        <h4 class="font-weight-bold mb-3">Report</h4>
                        <div class="row">
                            <div class="col-md-9 form-inline">
                                <form action="{{ route('report.index') }}">
                                    @csrf
                                    <div class="form-row align-items-center">

                                        <div class="col-auto my-1">
                                            <label>Program Studi <select
                                                    class="custom-select custom-select-sm mr-sm-3 form-control-sm ml-1 round-corner"
                                                    id="program_id" name="program_id">
                                                    <option value="" {{ $programID == null ? 'selected':'' }}>Semua</option>
                                                    @forelse($programs as $program)
                                                        <option
                                                            value="{{ $program->id }}" {{ $programID == $program->id ? 'selected':'' }}>
                                                            {{ $program->name }}
                                                        </option>
                                                    @empty

                                                    @endforelse

                                                </select></label>
                                        </div>



                                        <div class="col-auto my-1">
                                            <button class="btn btn-success btn-sm round-corner" type="submit" name="submit" value="submit">
                                                Apply filter
                                            </button>



                                        </div>
                                        <!-- End: Filter Show -->

                                    </div>
                                    <!-- End: Form Row -->
                                </form>
                            </div>
                            <!-- End: col-md-12 form-inline-->
                        </div>

                    </div>
                </div>
            </div>

            @if(request()->get('submit'))
                <div class="col-lg-10 col-md-10 col-sm-12">

                    <div class="card">

                        <div class="card-body">
                            @if(null != $students)
                                <div class="table-responsive">
                                    <table class="table table-responsive-sm mt-3" cellspacing="0" style="font-size:12px;width:100%;">
                                        <thead>
                                        <tr class="text-center">
                                            <th width="5%">No</th>
                                            <th width="25%">NIM</th>
                                            <th width="25%">Nama</th>
                                            <th width="10%">Tahun Masuk</th>
                                            <th width="15%">Program Studi</th>
                                            <th width="10%" >Kelas</th>
                                            <th width="10%">Jenjang</th>
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

                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="7">Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            @endif

                        </div>
                    </div>



                </div>

            @endif

        </div>
    </div>
@endsection
