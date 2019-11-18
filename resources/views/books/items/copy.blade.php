@extends('layouts.app')

@section('title', 'SIGEBI | Copies | ' . $copy->id)
@section('content')
    <div class="container">
        <div class="head d-flex" style="padding-top: 15px;">
            <h2>Copy N°{{ $copy->id }}</h2>
            <div class="actions ml-auto">
                <a href="{{ '/copies/' . $copy->id . '/edit' }}">
                    <button class="btn btn-primary">Edit</button>
                </a>
                <a href="/copies">
                    <button class="btn btn-primary">Go back</button>
                </a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col" style="padding: 15px;">
                <h4>Data:</h4>
                <p>Guardian: test</p>
                <p>Copy of: <a href={{ '/books/' . $copy->book->id }}> {{ $copy->book->title }}</a></p>
                <p>Status: {{ $copy->state->state }}</p>
            </div>
        </div>
        <hr>
    </div>
@endsection