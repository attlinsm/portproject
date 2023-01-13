<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_description',
        'pros_list',
        'image',
        'icon',
    ];

    public function getProsListAttribute($value)
    {
        return explode(', ', $value);
    }

}

