@extends('layouts.app')

@section('title', 'SIGEBI | Books')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
            <div class="card shadow-sm">
                <div class="card-header d-flex">
                    <h5>Book's</h5>
                    <button class="btn btn-sm btn-primary ml-auto">
                        Add book</button>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <form class="form-inline md-form mr-auto mb-4" action="/books/search" method="GET">
                            <input class="form-control mr-sm-2" type="text" name="query" id="query" placeholder="Search" aria-label="Search" style="width: 80%" value={{ request()->input('query') }}>
                            @error('query')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button class="btn btn-outline-primary btn-rounded btn-sm my-0" style="margin-left: auto;
                            width: 18%;
                            height: 6.8vh;" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">State</th>
                              </tr>
                            </thead>
                            <tbody>
                                    @forelse ($books as $book)
                                        <tr>
                                        <th scope="row">{{ $book['id'] }}</th>
                                        <td><a href={{ "/books/" . $book['id'] }}>{{ $book['title'] }}</a></td>
                                        <td><a href={{ "/authors/" . $book['authorId'] }}>{{ $book['authorName'] }}</a></td>
                                        <td><span class={{ $book['status'] == 'Available' ? 'status-icon-sucess' : 'status-icon-danger' }}> {{ $book['status'] }}</span> </td>
                                        </tr>
                                    @empty
                                    <tr>
                                    <th scope="row">Not books found</th>
                                    </tr>
                                    @endforelse
                                    
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center pt-4">
                                {{ $books->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
