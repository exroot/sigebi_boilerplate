<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function author() {
        return $this->belongsTo('App\Author');
    }
    public function category() {
        return $this->belongsTo('App\Category');
    }
    public function states() {
        return $this->belongsToMany('App\State', 'book_item');
    }
}
