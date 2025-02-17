<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function index() {
        $totalBooks = Book::count(); // Menghitung jumlah buku
        $totalStudents = User::where('role', 'student')->count();
        // Mengambil data buku per kategori
        $booksByCategory = Book::select('category_id', DB::raw('count(*) as count'))
                                ->groupBy('category_id')
                                ->get();
    
         return view('admin.dashboard', compact('totalBooks', 'totalStudents', 'booksByCategory'));  // admin.dashboard.blade.php
    }
}
