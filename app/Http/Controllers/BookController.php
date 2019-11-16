<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Book;
use App\State;
use App\BookItem;

class BookController extends Controller
{
    public function index() {
        $booksPaginated = Book::paginate(5);
        $arrBooksCollections = $booksPaginated
            ->getCollection()
            ->map(function($book) {
                /* 
                Get pivot table information
                    -For each book get states of each copy of that book
                */
                $bookItems = $book->states()->get();
                $booksAvailable = collect($bookItems)->filter(function($bookCopy) {
                    // Make a collection of those book items which are available
                    return $bookCopy->state == "Ulises Dicki";
                });
                // Return an collection with book data, and status
                return collect([
                    'id' => $book->id,
                    'title' => $book->title,
                    'authorName' => $book->author->name,
                    'authorId' => $book->author->id,
                    'status' => count($booksAvailable) >= 1 ? 'Available' : 'Borrowed',
                ]);
        });

        $booksTransformedAndPaginated = new LengthAwarePaginator(
            $arrBooksCollections,
            $booksPaginated->total(),
            $booksPaginated->perPage(),
            $booksPaginated->currentPage(), [
                'path' => \Request::url(),
                'query' => [
                    'page' => $booksPaginated->currentPage()
                ]
            ]
        );
        return view('books.index', [
            'books' => $booksTransformedAndPaginated
        ]);
    }

    public function show($bookId) {
        $book = Book::findOrFail($bookId);
        $bookCopies = $book->states()->get();
        $availables = collect($bookCopies)->filter(function($bookCopy) {
            return $bookCopy->state == "Ulises Dicki";
        });
        $availability = count($availables) >= 1 ? "Available" : "Borrowed";
        return view('books.book', [
            'book' => $book,
            'copies' => $bookCopies,
            'availability' => $availability
        ]);
    }

    public function search() {

    }
}
