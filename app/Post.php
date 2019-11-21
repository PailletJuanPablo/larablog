<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'image', 'featured', 'published'];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function createdBy() {
        return $this->belongsTo('App\User', 'created_by');
    }
}
