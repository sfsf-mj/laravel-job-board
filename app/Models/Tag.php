<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasUuids;
    use HasFactory;

    protected $primaryKey = 'id';
    protected $keyType='string';
    public $incrementing = false;

    protected $table = 'tags';
    protected $fillable = ['title'];
    protected $garded = ['id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
