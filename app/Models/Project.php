<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;

class Project extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'category_id',
        'deskripsi',
        'gambar',
        'teknologi',
        'github_url',
        'demo_url',
        'urutan',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}