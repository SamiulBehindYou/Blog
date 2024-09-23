<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['status'];

    // Relationship
    function rel_to_author(){
        return $this->belongsTo(Author::class, 'author_id');
    }
    function rel_to_subcategory(){
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
}
