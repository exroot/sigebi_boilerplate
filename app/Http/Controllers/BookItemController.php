<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookItem;
use App\Book;
use App\State;

class BookItemController extends Controller
{
    public function index() {
        $copies = BookItem::paginate(5);
        return view('books.items.index', [
            'copies' => $copies
        ]);
    }

    public function show($copyId) {
        $copy = BookItem::findOrFail($copyId);
        return view('books.items.copy', [
            'copy' => $copy 
        ]);
    }

    public function create() {
        $books = Book::all()->sortBy('name');
        $states = State::all()->sortBy('state');
        return view('books.items.create', [
            'books' => $books,
            'states' => $states
        ]);
    }
    public function store(Request $request) {
        $request->validate([
            'book' => 'required',
            'state' => 'required'
        ]);
        $newBookItem = new BookItem([
            'book_id' => (int) $request->input('book'),
            'state_id' => (int) $request->input('state'),
        ]);
        $newBookItem->save();
        return redirect('/copies');
    }
    public function edit($copyId) {
        $copy = BookItem::findOrFail($copyId);
        $books = Book::all()->sortBy('name');
        $states = State::all()->sortBy('name');

        return view('books.items.edit', [
            'copy' => $copy,
            'books' => $books,
            'states' => $states
        ]);
    }
    public function update(Request $request, $copyId) {
        $copyToUpdate = BookItem::findOrFail($copyId);
        $request->validate([
            'book' => 'required',
            'state' => 'required'
        ]);
        $updatedCopyInfo = array([
            'book_id' => (int) $request->input('book'),
            'state_id' => (int) $request->input('state'),
        ]);

        $copyToUpdate->update($updatedCopyInfo[0]);
        return redirect('/copies');
    }

    public function search(Request $request) {
        $request->validate([
            'query' => 'required|min:3',
        ]);
        $query = $request->input('query');
        $searchText = $query;
        $copiesFound = BookItem::with('Book')->with('State')->where(function($query) use ($searchText)
        {
            $query->orWhereHas('Book', function($q) use ($searchText) {
                $q->where(function($q) use ($searchText) {
                    $q->where('title', 'LIKE', '%'.$searchText.'%');
                });
            });
            $query->orWhereHas('State', function($q) use ($searchText) {
                $q->where(function($q) use ($searchText) {
                    $q->where('state', 'LIKE', '%'.$searchText.'%');
                });
            });
            return $query;
        });
        $copies = $copiesFound->paginate(10);
        $numResults = count($copiesFound->get());
        return view('books.items.search-results', ['query' => $query, 'copies' => $copies, 'results' => $numResults]);
    }
}
