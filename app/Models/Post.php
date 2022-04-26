<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Post extends Model
{
    use Uuids; use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'image_url',
        'slug',
        'category_id',
        'user_id',
        'status'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string'
    ];



    /**
    * Get the user that owns the post..
    */
    public function posts()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * Get the category that belong to the post.
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
