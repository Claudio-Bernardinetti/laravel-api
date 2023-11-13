<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'github_link', 
        'internet_link', 
        'description', 
        'slug',
        'cover_image',
        'type_id'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

}
