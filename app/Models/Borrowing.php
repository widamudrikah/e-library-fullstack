<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = [
        'book_id',
        'user_id',
        'borrowed_at',
        'return_at',
        'status'
    ];

     // ✅ Tambahkan ini agar tanggal otomatis jadi objek Carbon
     protected $casts = [
        'borrowed_at' => 'datetime',
        'return_at' => 'datetime',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
