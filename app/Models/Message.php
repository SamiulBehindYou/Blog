<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id',
        'subject',
        'message',
    ];

    // Relations
    public function rel_to_author(){
        return $this->belongsTo(Author::class, 'author_id');
    }
}
