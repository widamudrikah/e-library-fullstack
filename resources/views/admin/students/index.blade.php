@extends('template.base')

@section('title', 'List Students')

@section('content')

<div class="page-header">
    <h3 class="page-title"> Data Siswa IDN Boarding School </h3>
</div>

@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <h4 class="card-title">Table Data Siswa</h4>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID Siswa</th>
                            <th>Nama</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Tidak Ada Data Siswa</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection