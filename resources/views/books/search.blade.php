@extends('layouts.app')

@section('title', 'Search results')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <p>Search results: {{ $results }}</p>
                    </div>
                    <div>
                        <a href="/books" class="">
                            <button class="btn btn-primary">
                                Go back
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
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
                                    {{ $books->appends(request()->query())->links() }}
                                {{-- {{ $books->appends(Request::except('page'))->links() }} --}}
                                {{-- {{ $books->appends(['query' => $query])->links() }} --}}
                                {{-- {{ $books->appends(Request::except('page'))->appends(['query' => $query])->links() }} --}}
                                {{-- {!! $books->appends(Request::except('page'))->render() !!} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
