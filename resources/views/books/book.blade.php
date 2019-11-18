@extends('layouts.app')

@section('title', 'SIGEBI | Books | ' . $book->title)
@section('content')
    <div class="container">
        <div class="head d-flex" style="padding-top: 15px;">
            <h2>{{ $book->title }}</h2>
            <div class="actions ml-auto">
                <a href="{{ '/books/' . $book->id . '/edit' }}">
                    <button class="btn btn-primary">Edit</button>
                </a>
                <a href="/books">
                    <button class="btn btn-primary">Go back</button>
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col" style="padding: 15px;">
                <h4>Description</h4>
                <p>{{ $book->description }}</p>
            </div>
            <div class="col" style="border-left: 1px solid #f0f0f0; padding: 15px;">
                    <h4>Data:</h4>
                    <p>Author: <a href={{ '/authors/' . $book->author->id }}> {{ $book->author->name }} </a></p>
                    <p>Pages: {{ $book->pages }}</p>
                    <p>Category: {{ $book->category->name }}</p>
                    <p>Status: <span class={{ $availability == 'Available' ? 'status-icon-sucess' : 'status-icon-danger' }}> {{ $availability }}</span></p>
                    <p>Uploaded by {{ $book->user->email }}</p>
            </div>
        </div>
        <hr>
            <h4>Similar book's:</h4>
            <ul>
                @forelse ($book->category->books as $similarBook)
                    {{-- Check books of the same category --}}
                    @if ( count($book->category->books) > 1)
                        {{-- book itself count has one, thats why count > 1 --}}
                        @if ($similarBook->id != $book->id)
                            {{-- filter the book itself --}}
                            <li>
                                <a href={{ '/books/' . $similarBook->id }}>{{ $similarBook->title }}</a>
                            </li>
                        @endif
                    @else
                        <p>Not books are similar to this.</p>
                    @endif
                    @empty
                    @endforelse
            </ul>
        <hr>
        <h4>( {{ count($copies) }} )  {{ count($copies) <= 1 ? 'Copy:' : 'Copies: ' }} </h4>
        <ul>
            @forelse ($copies as $copy)
                <li>
                    {{ $copy->id == 1 ? 'Available' : 'Borrowed' }}
                </li>
            @empty
                <li>
                    Not copies available.
                </li>
            @endforelse
        </ul>

    </div>
@endsection