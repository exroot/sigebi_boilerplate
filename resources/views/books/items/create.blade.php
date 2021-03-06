@extends('layouts.app')

@section('title', 'New copy')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card shadow">
                <div class="card-header">Add Copy</div>

                <div class="card-body">
                <form method="POST" action="{{ '/copies' }}">
                        @csrf
                        
                        {{ csrf_field() }}
                        
                        <div class="form-group row">
                            <label for="Book" class="col-md-4 col-form-label text-md-right">Book</label>

                            <div class="col-md-6">
                                <select name="book" class="form-control col-md-12 text-md-center">
                                    @forelse ($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->title }}</option> 
                                    @empty
                                        <option value="">No books found.</option>
                                    @endforelse
                                </select> 
                            </div>      
                        </div>

                        <div class="form-group row">
                            <label for="State" class="col-md-4 col-form-label text-md-right">State</label>

                            <div class="col-md-6">
                                <select name="state" class="form-control col-md-12 text-md-center">
                                    @forelse ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->state }}</option> 
                                    @empty
                                        <option value="">No states found.</option>
                                    @endforelse
                                </select> 
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row mb-0 d-flex justify-content-center">
                            <button class="btn btn-outline-secondary col-md-2 mr-1" style="max-width: 35%">
                                Cancel
                            </button>                          
                            <button type="submit" class="btn btn-primary col-md-2 ml-1" style="max-width: 35%">
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
