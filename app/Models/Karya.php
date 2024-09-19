<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'pemilik',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'pemilik'); // 'pemilik' adalah foreign key yang menunjuk ke kolom 'id' pada tabel users
    }
}