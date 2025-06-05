<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    use HasUuids;
    protected $primaryKey = 'id';
    protected $keyType='string';
    public $incrementing = false;

    protected $table = 'post';
    protected $fillable = ['title',  'body', 'author', 'published'];
    protected $garded = ['id'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
