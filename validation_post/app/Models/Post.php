<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title', 'description', 'media_path', 'user_id', 'status', 'page_name','colon_hashtags','publish_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
