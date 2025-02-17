<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'year',
        'category_id',
        'publisher',
        'cover',
        'stock',
    ];


    public function category() {
        return $this->belongsTo(Category::class); // relasi one-to-one (1 buku bisa memiliki 1 kategori)
    }
}
