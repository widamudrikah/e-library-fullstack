<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function detail($id)
    {
        $book = Book::find($id);
        return view('admin.books.detail', compact('book'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validation
        $this->validateBook($request);

        // Upload cover image
        $coverImage = $request->file('cover');
        $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
        $coverImage->move(public_path('cover_images'), $coverImageName);

        // Store book data
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'category_id' => $request->category_id,
            'publisher' => $request->publisher,
            'cover' => 'cover_images/' . $coverImageName,
            'stock' => $request->stock,
        ]);


        return redirect()->route('book')->with('message', 'Buku berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::get();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validateBook($request);

        // Ambil data buku
        $book = Book::findOrFail($id);

        // Jika ada cover baru, upload dan hapus yang lama
        if ($request->hasFile('cover')) {
            // Hapus cover lama jika ada
            if ($book->cover && file_exists(public_path($book->cover))) {
                unlink(public_path($book->cover));
            }

            // Upload cover baru
            $coverImage = $request->file('cover');
            $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->move(public_path('cover_images'), $coverImageName);

            // Set path cover baru
            $book->cover = 'cover_images/' . $coverImageName;
        }

        // Update data buku
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'category_id' => $request->category_id,
            'publisher' => $request->publisher,
            'stock' => $request->stock,
        ]);

        return redirect()->route('book')->with('message', 'Buku berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Hapus file cover jika ada
        if ($book->cover && file_exists(public_path($book->cover))) {
            unlink(public_path($book->cover));
        }

        // Hapus buku dari database
        $book->delete();

        return redirect()->route('book')->with('message', 'Buku berhasil dihapus.');
    }

    private function validateBook(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|numeric',
            'category_id' => 'required|numeric',
            'publisher' => 'required|string',
            'stock' => 'required|numeric',
        ];

        if ($request->isMethod('post')) {
            // Saat create: cover wajib
            $rules['cover'] = 'required|image|mimes:jpeg,png,jpg|max:2048';
        } else {
            // Saat update: cover boleh kosong
            $rules['cover'] = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
        }

        $request->validate($rules);
    }
}
