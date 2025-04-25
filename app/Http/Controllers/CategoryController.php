<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Fetch all categories
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    private function validateCategory(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255'
            ],
            [
                'name.required' => 'Nama kategori wajib diisi.',
                'name.string' => 'Nama kategori harus berupa teks.',
                'name.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
            ]
        );
    }

    public function store(Request $request)
    {
        $this->validateCategory($request);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category')->with('message', 'Data Categori berhasil ditambahkan!');
    }

    public function Update(Request $request, $id)
    {
        $this->validateCategory($request);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);
        return redirect()->route('category')->with('message', 'Data Categori berhasil diupdate!');
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        
        return redirect()->route('category')->with('message', 'Data Categori berhasil dihapus!');
    }
}
