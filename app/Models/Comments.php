<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Soft delete field
     * @var string[]
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * Attributes for assign
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'parent_id',
        'comment'
    ];

    /**
     * One to One relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * One to Many relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Comments::class, 'parent_id');
    }
}
