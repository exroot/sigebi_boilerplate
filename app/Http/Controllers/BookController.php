<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Book;
use App\State;

class BookController extends Controller
{
    public function show() {
        $availableBooks = State::where('id', 3)->first();
        dd($availableBooks->books()->get());
    }
}
