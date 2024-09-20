<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id',
        'blog_id',
        'comment',
    ];

    // Relations
    public function rel_to_author(){
        return $this->belongsTo(Author::class, 'author_id');
    }
}
