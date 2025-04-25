<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = [
        'name'
    ];

    // Relasi: Satu kategori memiliki banyak buku
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
