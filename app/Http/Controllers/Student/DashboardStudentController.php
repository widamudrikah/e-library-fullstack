<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardStudentController extends Controller
{
    public function index()
    {
        $books = Book::latest()->take(6)->get();
        $categories = Category::all();
        return view('student.dashboard', compact('books', 'categories'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        $isAlreadyBorrowed = Borrowing::where('book_id', $book->id)
            ->where('user_id', Auth::id())
            ->where('status', 'dipinjam')
            ->exists();
        return view('student.show', compact('book', 'isAlreadyBorrowed'));
    }

    public function borrow(Request $request)
    {
        $request->validate([
            'book_id'   => 'required|exists:books,id',
        ]);

        $book = Book::findOrFail($request->book_id);
        // cek stok
        if ($book->stock <= 0) {
            return redirect()->back()->with('error', 'stok buku habis');
        }
        // Cek apakah user sudah meminjam buku ini dan belum mengembalikan
        $isAlreadyBorrowed = Borrowing::where('book_id', $book->id)
            ->where('user_id', Auth::id())
            ->where('status', 'dipinjam')
            ->exists();

        if ($isAlreadyBorrowed) {
            return redirect()->back()->with('error', 'Kamu sudah meminjam buku ini.');
        }
        // Kurangi stok buku
        $book->decrement('stock');
        Borrowing::create([
            'book_id'       => $request->book_id,
            'user_id'       => Auth::id(),
            'borrowed_at'   => now(),
            'return_at'     => now()->addDays(3),
            'status'        => 'dipinjam'
        ]);

        return redirect()->route('student.borrow.all')->with('message', 'yeayyy nambah bacaan baru berhasil');
    }

    public function borrowedBooks() {
        $borrowings = Borrowing::with('book')
            ->where('user_id', Auth::id())
            ->where('status', 'dipinjam')
            ->get();

            return view('student.borrowed-book', compact('borrowings'));
    }

public function AllBook() {
    $categories = Category::with('books')->get();

    return view('student.all-book', compact('categories'));
}
}
