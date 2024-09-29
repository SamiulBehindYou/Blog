<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'title',
        'icon',
        'facebook',
        'instagram',
        'twiter',
        'youtube',
        'facebook_status',
        'instagram_status',
        'twiter_status',
        'youtube_status',
    ];
}
