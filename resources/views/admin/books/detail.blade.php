@extends('template.base')

@section('title', 'Detail Buku')

@section('content')

<div class="page-header">
    <h1 class="page-title">{{ $book->title }} </h1>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <img src="{{ asset($book->cover) }}" class="card-img-top" alt="{{ $book->title }}">
        </div>
    </div>
    <div class="col-md-8">
        <div class="card p-4">
            <h4 class="mb-3">{{ $book->title }}</h4>
            <p><strong>Penulis:</strong> {{ $book->author }}</p>
            <p><strong>Penerbit:</strong> {{ $book->publisher }}</p>
            <p><strong>Tahun Terbit:</strong> {{ $book->year }}</p>
            <p><strong>Kategori:</strong> {{ $book->category->name }}</p>
            <p><strong>Stok:</strong>
                @if($book->stock > 0)
                <span class="badge bg-success">Tersedia ({{ $book->stock }})</span>
                @else
                <span class="badge bg-danger">Tidak Tersedia</span>
                @endif
            </p>

            <div class="mt-3">
                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                <button class="btn btn-danger" onclick="confirmDelete({{ $book->id }})">Hapus</button>
                <a href="{{ route('book') }}" class="btn btn-secondary">Kembali</a>

                <form id="delete-form-{{ $book->id }}" action="{{ route('book.destroy', $book->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function confirmDelete(bookId) {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data buku akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + bookId).submit();
            }
        });
    }
</script>


@endsection