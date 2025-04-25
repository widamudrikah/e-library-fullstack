<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function borrowingAll()
    {
        $borrowings = Borrowing::paginate(10);

        return view('admin.borrowing.borrowing-all', compact('borrowings'));
    }

    public function returnBook($id)
    {
        $borrowing = Borrowing::findOrFail($id);

        // Cek kalau status masih "dipinjam"
        if ($borrowing->status === 'dipinjam') {
            $borrowing->status = 'dikembalikan';
            $borrowing->save();

            // Tambahkan stok buku
            $borrowing->book->increment('stock');

            return redirect()->back()->with('message', 'Buku berhasil dikembalikan.');
        }

        return redirect()->back()->with('message', 'Buku sudah dikembalikan sebelumnya.');
    }

    public function borrowingUnreturned()
    {
        // Ambil hanya data yang statusnya "dipinjam"
        $borrowings = Borrowing::where('status', 'dipinjam')->latest()->paginate(10);

        return view('admin.borrowing.unreturned', compact('borrowings'));
    }

    public function borrowingReturned()
    {
        // Ambil hanya data yang statusnya "dipinjam"
        $borrowings = Borrowing::where('status', 'dikembalikan')->latest()->paginate(10);

        return view('admin.borrowing.returned', compact('borrowings'));
    }
}
