<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function books() {
        return $this->belongsToMany('App\Book', 'book_item');
    }
}
