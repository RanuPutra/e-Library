<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Books extends Model
{
    protected $fillable = [
        'judul',
        'kategori_id',
        'penulis',
        'penerbit',
        'terbit',
        'isbn',
        'halaman',
        'stok',
    ];

    public function categories(): BelongsTo {
        return $this->belongsTo(Categories::class , 'kategori_id' );
    }

    public function borrowings(): HasMany {
        return $this->hasMany(Borrowings::class);
    }

    public function reviews(): HasManyThrough {
        return $this->hasManyThrough(Reviews::class, Borrowings::class);
    } 

}
