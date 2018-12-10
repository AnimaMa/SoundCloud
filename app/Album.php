<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name','id', 'author_id', 'producer', 'genres',  'type', 'cover', 'amount_songs', 'released', 'song'];

    public function author() {
        return $this->belongsTo('App\Author');
    }

    public function song() {
        return $this->hasMany('App\Song');
    }

}
