@extends('layouts.app')

@section('title', 'Edit copy')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="card shadow">
                <div class="card-header">Update copy info</div>

                <div class="card-body">
                <form method="POST" action="{{ '/copies/' . $copy->id }}">
                        {{-- @csrf
                        
                        <input type="hidden" name="token" value="{{ $token }}"> --}}

                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="Book" class="col-md-4 col-form-label text-md-right mr-3">Book</label>

                            <select name="book" class="form-control col-md-5 text-md-center">
                                @forelse ($books as $book)
                                    <option value="{{ $book->id }}" @if ($book->id == $copy->book->id) selected="selected" @endif >{{ $book->title }}</option> 
                                @empty
                                    <option value="">No books found.</option>
                                @endforelse
                            </select> 
                        </div>

                        <div class="form-group row">
                            <label for="State" class="col-md-4 col-form-label text-md-right mr-3">State</label>

                            <select name="state" class="form-control col-md-5 text-md-center">
                                @forelse ($states as $state)
                                    <option value="{{ $state->id }}" @if ($state->id == $copy->state->id) selected="selected" @endif >{{ $state->state }}</option> 
                                @empty
                                    <option value="">No states found.</option>
                                @endforelse
                            </select> 
                        </div>
                    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update book
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
