<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use App\Author;
use App\Category;
use App\State;
use App\BookItem;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        $booksPaginated = Book::paginate(5);
        $bookies = $this->transformAndRepaginate($booksPaginated);
        return view('books.index', [
            'books' => $bookies
        ]);
    }

    public function show($bookId) 
    {
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

    public function edit($bookId) 
    {
        $book = Book::findOrFail($bookId);
        $authors = Author::all()->sortBy('name');
        $categories = Category::all()->sortBy('name');
        return view('books.edit', [
            'book' => $book,
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $bookId) 
    {
        $bookToUpdate = Book::findOrFail($bookId);
        $userId = $bookToUpdate->user->id;
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'pages' => 'required|integer',
            'author' => 'required|integer',
            'category' => 'required|integer'
        ]);
        $updatedInfo = array([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'pages' => (int) $request->input('pages'),
            'category_id' => (int) $request->input('category'),
            'author_id' => (int) $request->input('author'),
            'user_id' => $userId
        ]);
        
        $bookToUpdate->update($updatedInfo[0]);
        return redirect('/books/'. $bookId);
    }

    public function create() {
        $authors = Author::all()->sortBy('name');
        $categories = Category::all()->sortBy('name');
        return view('books.create', [
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    public function store(Request $request) 
    {
        $userId = Auth::user()->id;
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'pages' => 'required|integer',
            'author' => 'required|integer',
            'category' => 'required|integer'
        ]);
        $newBook = new Book([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'pages' => (int) $request->input('pages'),
            'category_id' => (int) $request->input('category'),
            'author_id' => (int) $request->input('author'),
            'user_id' => $userId
        ]);
        $newBook->save();
        return redirect()->route('books');
    }

    public function search(Request $request) 
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);
        $query = $request->input('query');
        $searchText = $query;
        $booksFound = Book::with('Author')->with('Category')->where(function($query) use ($searchText)
        {
            $query->where('title', 'LIKE', '%'.$searchText.'%');
            $columns = ['description'];

            foreach ($columns as $column ) {
                $query->orWhere($column, 'LIKE', '%'.$searchText.'%');
            }

            $query->orWhereHas('Author', function($q) use ($searchText) {
                $q->where(function($q) use ($searchText) {
                    $q->where('name', 'LIKE', '%'.$searchText.'%');
                });
            });

            $query->orWhereHas('Category', function($q) use ($searchText) {
                $q->where(function($q) use ($searchText) {
                    $q->where('name', 'LIKE', '%'.$searchText.'%');
                });
            });
            return $query;
        });
        $booksPaginated = $booksFound->paginate(10);
        $numResults = count($booksFound->get());
        $books = $this->transformAndRepaginate($booksPaginated);
        return view('books.search', ['query' => $query, 'books' => $books, 'results' => $numResults]);
    }

    private function transformAndRepaginate($booksPaginated) 
    {
        $arrBooksCollections = $booksPaginated
            ->getCollection()
            ->map(function($book) {
            /* 
            Get pivot table information
                -Find all copies of that book, and get their state
            */
            $bookItems = $book->states()->get();
            $booksAvailable = collect($bookItems)->filter(function($bookCopy) {
                /*
                    Make a collection of those copies which are available

                */
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
        return $booksTransformedAndPaginated;
    }
}
