@extends('template.base')

@section('title', 'List Buku')

@section('content')

<div class="page-header">
    <h3 class="page-title"> Data Buku Perpustakaan IDN Boarding School </h3>
</div>

@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="page-header">
    <h3 class="page-title"> Basic Tables </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
        </ol>
    </nav>
</div>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Bordered table</h4>
            <p class="card-description"> Add class <code>.table-bordered</code>
            </p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th> ID Buku </th>
                        <th> Judul </th>
                        <th> Status </th>
                        <th> Action </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($books as $book)
                    <tr>
                        <td>{{$book->id}}</td>
                        <td>{{ $book->title }}</td>
                        <td>
                            @if($book->stock > 0)
                            <span class="badge bg-success">Tersedia</span>
                            @else
                            <span class="badge bg-danger">Tidak Tersedia</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('book.detail', $book->id) }}" class="btn btn-gradient-success btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-gradient-danger btn-sm">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <a href="#" class="btn btn-gradient-warning btn-sm">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">Tidak Ada Data Buku</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Tambahkan Pagination di sini -->
            <div class="d-flex justify-content-center mt-3">
                {{ $books->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection