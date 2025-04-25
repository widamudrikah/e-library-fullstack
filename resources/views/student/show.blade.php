@extends('student.base')

@section('title', $book->title)

@section('content')
<section class="py-5 min-vh-100 bg-light">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-5">
                <img src="{{ asset($book->cover) }}" alt="{{ $book->title }}" class="img-fluid rounded shadow-sm" style="max-height: 450px; object-fit: cover;">
            </div>
            <div class="col-md-7">
                <h2 class="text-purple">{{ $book->title }}</h2>
                <p class="text-muted mb-2">Penulis: <strong>{{ $book->author }}</strong></p>
                <p class="text-muted mb-2">Tahun: {{ $book->year }}</p>
                <p class="text-muted mb-2">Penerbit: {{ $book->publisher }}</p>
                <p class="text-muted mb-2">Kategori: <span class="badge bg-purple">{{ $book->category->name }}</span></p>
                <p class="text-muted mb-2">Stok Tersedia: {{ $book->stock }}</p>

                <hr>
                <p class="mb-4">{{ $book->description ?? 'Tidak ada deskripsi untuk buku ini.' }}</p>

                @if($book->stock > 0)
                @if($isAlreadyBorrowed)
                <button class="btn btn-secondary btn-lg" disabled>
                    <i class="bi bi-check-circle"></i> Buku Telah Dipinjam
                </button>
                @else
                <form action="{{ route('student.borrow', $book->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <button type="submit" class="btn btn-purple btn-lg">
                        <i class="bi bi-journal-arrow-down"></i> Pinjam Buku
                    </button>
                </form>
                @endif
                @else
                <div class="alert alert-warning">Buku tidak tersedia untuk dipinjam saat ini.</div>
                @endif

            </div>
        </div>
    </div>
</section>
@endsection