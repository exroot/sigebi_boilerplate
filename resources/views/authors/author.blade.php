@extends('layouts.app')

@section('title', 'SIGEBI | Authors | ' . $author->name)
@section('content')
<div class="container">
    <div class="header d-flex" style="padding-top: 15px;">
        <h2>{{ $author->name }}</h2>
        <a href="/authors" class="ml-auto">
            <button class="btn btn-primary">Go back</button>
        </a>
    </div>

    <hr>
    <div class="row">
        <div class="col" style="padding: 15px;">
            <h4>Description</h4>
            <p>Author page.</p>
        </div>
        <div class="col" style="border-left: 1px solid #f0f0f0; padding: 15px;">
                <h4>Author book's:</h4>
                <ul>
                    @forelse ($author->books as $book)
                        <li>
                            <a href={{ '/books/' . $book->id }}>{{ $book->title }}</a>
                        </li>
                    @empty
                        <li>
                            This author doesn't have books.
                        </li>
                    @endforelse
                </ul>
        </div>
    </div>
</div>
@endsection