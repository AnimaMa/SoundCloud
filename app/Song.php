<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['id','title', 'song', 'author_id', 'album_id'];

    public function album() {

        return $this->belongsToMany('App\Album');
    }


    public function author() {

        return $this->belongsTo('App\Author');
    }
}

