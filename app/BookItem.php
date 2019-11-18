<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookItem extends Model
{
    protected $table = 'book_item';
    protected $fillable = ['book_id', 'state_id'];
    public function book() {
        return $this->belongsTo('App\Book');
    }
    public function state() {
        return $this->belongsTo('App\State');
    }
}
