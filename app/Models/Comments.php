<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'name', 'email', 'website', 'comment',
    ];

    /**
     * Get the post that owns the Comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Posts::class, 'post_id');
    }
}
