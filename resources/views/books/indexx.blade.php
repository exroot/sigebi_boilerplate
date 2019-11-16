@extends('layouts.app')

@section('title', 'books list')

@section('content')
    <div class="container">
      <div class="header d-flex">
          <h2>Book's</h2>
          <div class="ml-auto">
              <form class="form-inline md-form mr-auto mb-4">
                  <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-primary btn-rounded btn-sm my-0" type="submit">Search</button>
                </form>
          </div>
      </div>
      <div class="table-container">
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
          <nav aria-label="...">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">&laquo</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">&raquo</a>
                </li>
              </ul>
            </nav>
      </div>
  </div>
@endsection

