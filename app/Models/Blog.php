<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'image',
        'image_details',
        'tags',
        'short_description',
        'description',
    ];

    public function Category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }
}
