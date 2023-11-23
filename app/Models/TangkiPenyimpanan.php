<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kesehatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis_minyak',
        'lokasi',
        'volume'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
