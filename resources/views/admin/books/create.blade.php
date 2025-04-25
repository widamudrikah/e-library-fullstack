@extends('template.base')

@section('title', 'Tambah Buku')

@section('content')

@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

<div class="page-header">
    <h3 class="page-title"> Tambah data buku </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form elements</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-description"> Isi data di bawah ini untuk menambahkan buku baru pada perpustakaan </p>
                <form class="forms-sample" method="post" action="{{ route('book.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Judul Buku</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title" placeholder="Masukan Judul Buku">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Pilih Kategori Buku</label>
                        <select class="form-select" id="category" name="category_id">
                            <option selected disabled>Pilih Kategori Buku...</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="author">Penulis</label>
                        <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" id="author" placeholder="Masukan Nama Penulis">
                        @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        <input type="text" name="publisher" class="form-control @error('publisher') is-invalid @enderror" value="{{ old('publisher') }}" id="publisher" placeholder="Masukan Publisher">
                        @error('publisher')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="year">Tahun Cetak</label>
                        <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}" id="year" placeholder="Masukan Tahun Cetak">
                        @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="year">Stock</label>
                        <input type="number" name="stock" class="form-control @error('year') is-invalid @enderror" id="stock" value="{{ old('stock') }}" placeholder="Masukan Stok Buku">
                        @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="cover">Upload Cover</label>
                        <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror" value="{{ old('cover') }}">

                        @error('cover')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection