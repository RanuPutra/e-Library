<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reviews extends Model
{
    protected $fillable = [
        'name_id',
        'judul_id',
        'rating',
        'ulasan',
        'tgl_ulasan',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'name_id');
    }

    public function books(): BelongsTo {
        return $this->belongsTo(Books::class, 'judul_id');
    }

}
