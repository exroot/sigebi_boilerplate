<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Author;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::paginate(5);
        return view('authors/index', [
            'authors' => $authors
        ]);
    }

    public function show($authorId) {
        Log::info('Showing landing page for author: '.$authorId);
        $author = Author::findOrFail($authorId);
        return view('authors/author', [
            'author' => $author
        ]);
    }
}
