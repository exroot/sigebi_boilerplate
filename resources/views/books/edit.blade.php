@extends('layouts.app')

@section('title', 'Edit book')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card shadow">
                <div class="card-header">Update book info</div>

                <div class="card-body">
                <form method="POST" action="{{ '/books/' . $book->id }}">
                        {{-- @csrf
                        
                        <input type="hidden" name="token" value="{{ $token }}"> --}}

                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $book->title }}" required autofocus>

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
                                <textarea id="password" name="description" type="text"  rows="8" class="form-control @error('description') is-invalid @enderror" required>{{ $book->description }}</textarea>

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
                                <input type="number" min="1" name="pages" value={{ $book->pages }} class="form-control @error('pages') is-invalid @enderror col-md-12 text-md-center" required>
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
                                        <option value="{{ $author->id }}" @if ($author->id == $book->author->id) selected="selected" @endif >{{ $author->name }}</option> 
                                    @empty
                                        <option value="">No authors found.</option>
                                    @endforelse
                                </select> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Category" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-6">
                                <select name="category" class="form-control col-md-12 text-md-center">
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}" @if ($category->id == $book->category->id) selected="selected" @endif >{{ $category->name }}</option> 
                                    @empty
                                        <option value="">No categories found.</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="user" class="col-md-4 col-form-label text-md-right">Uploaded by</label>

                            <div class="col-md-6">
                                <input type="text" name="user" value={{ $book->user->email }} class="form-control col-md-12 @error('user') is-invalid @enderror text-md-center" disabled>
                                @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 d-flex">
                                <button type="submit" class="btn btn-danger col-md-5">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary col-md-5 ml-auto">
                                    Update
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
