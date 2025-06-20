<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = ['title', 'author', 'series', 'number', 'genre', 'status', 'cover_path'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
