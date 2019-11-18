@extends('layouts.app')

@section('title', 'New book')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="card shadow">
                <div class="card-header">Add book</div>

                <div class="card-body">
                <form method="POST" action="{{ '/books' }}">
                        @csrf
                        
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="" required autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="password" type="text"  rows="8" name="description" class="form-control @error('description') is-invalid @enderror" required></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="pages" class="col-md-4 col-form-label text-md-right mr-3">Pages</label>
    
                                <input type="number" name="pages" min="1" class="form-control @error('pages') is-invalid @enderror col-md-5 text-md-center" required>
                                @error('pages')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right mr-3">Author</label>

                            <select name="author" class="form-control col-md-5 text-md-center">
                                @forelse ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option> 
                                @empty
                                    <option value="">No authors found.</option>
                                @endforelse
                            </select> 
                        </div>

                        <div class="form-group row">
                            <label for="Category" class="col-md-4 col-form-label text-md-right mr-3">Category</label>

                            <select name="category" class="form-control col-md-5 text-md-center">
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option> 
                                @empty
                                    <option value="">No categories found.</option>
                                @endforelse
                            </select> 
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create book
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
