<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Library extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar', 'name_en', 'address', 'description_ar', 'description_en', 'librarian_id'
    ];

    public function getNameAttribute() {
        return $this->attributes['name_en'];
    }

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function librarian(): BelongsTo
    {
        return $this->belongsTo(Librarian::class);
    }
}
