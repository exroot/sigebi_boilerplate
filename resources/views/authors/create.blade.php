@extends('layouts.app')

@section('title', 'New author')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card shadow">
                <div class="card-header">Add author</div>

                <div class="card-body">
                <form method="POST" action="{{ '/authors' }}">
                        {{-- @csrf
                        
                        <input type="hidden" name="token" value="{{ $token }}"> --}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control col-md-12 @error('name') is-invalid @enderror" name="name" value="" required autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row mb-0 col-md-12 d-flex justify-content-center">
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
