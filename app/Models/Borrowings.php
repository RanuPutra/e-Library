<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrowings extends Model
{
    protected $fillable = [
        'name_id',
        'judul_id',
        'tgl_peminjaman',
        'tgl_pengembalian',
        'status',
    ];

    public function books(): BelongsTo {
        return $this->belongsTo(Books::class , 'judul_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class , 'name_id');
    }
}
