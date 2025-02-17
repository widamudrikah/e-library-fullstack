<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        // Fetch all categories
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.string' => 'Nama kategori harus berupa teks.',
            'name.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
        ]);
    
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category')->with('message', 'Data Categori berhasil ditambahkan!');
    }

    public function Update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama kategori wajib diisi.',
            'name.string' => 'Nama kategori harus berupa teks.',
            'name.max' => 'Nama kategori tidak boleh lebih dari 255 karakter.',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);
        return redirect()->route('category')->with('message', 'Data Categori berhasil diupdate!');
        
    }
}
