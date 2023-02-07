<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'deleted_at',
    ];

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

    public function comments()
    {
        return $this->hasMany(Comments::class)->whereNull('parent_id');
    }
}
