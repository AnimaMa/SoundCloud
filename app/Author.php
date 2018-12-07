<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'description', 'photo', 'id'];

    public function album() {
        return $this->hasMany('App\Album');
    }
}
