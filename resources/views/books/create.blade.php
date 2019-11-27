@extends('layouts.app')

@section('title', 'New book')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card shadow">
                <div class="card-header">Add a new book</div>

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
                                <label for="pages" class="col-md-4 col-form-label text-md-right">Pages</label>
    
                                <div class="col-md-6">
                                    <input type="number" name="pages" min="1" class="form-control col-md-12 @error('pages') is-invalid @enderror text-md-center" required>
                                    @error('pages')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">Author</label>

                            <div class="col-md-6">
                                <select name="author" class="form-control col-md-12 text-md-center">
                                    @forelse ($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option> 
                                    @empty
                                        <option value="">No authors found.</option>
                                    @endforelse
                                </select> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Category" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-6">
                                <select name="category" class="form-control col-md-12 text-md-center container-fluid">
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option> 
                                    @empty
                                        <option value="">No categories found.</option>
                                    @endforelse
                                </select> 
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4 d-flex">
                                <button type="submit" class="btn btn-danger col-md-6">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary col-md-5 ml-auto">
                                    Add
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
