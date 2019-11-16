@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    Book's
                </div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <form class="form-inline md-form mr-auto mb-4">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-primary btn-rounded btn-sm my-0" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="">
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Book ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">State</th>
                              </tr>
                            </thead>
                            <tbody>
                                    @forelse ($books as $book)
                                        <tr>
                                        <th scope="row">{{ $book['id'] }}</th>
                                        <td><a href={{ "/book/" . $book['id'] }}>{{ $book['title'] }}</a></td>
                                        <td><a href={{ "/author/" . $book['authorId'] }}>{{ $book['authorName'] }}</a></td>
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
