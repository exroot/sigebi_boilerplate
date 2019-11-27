@extends('layouts.app')

@section('title', 'SIGEBI | Copies')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-4">
            <div class="card shadow-sm">
                <div class="card-header d-flex">
                    <h5>Copies</h5>
                    <a href="/copies/create" class="ml-auto">
                        <button class="btn btn-primary">
                            Add Copy
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <form class="form-inline md-form mr-auto mb-4" action="/copies/search" method="GET">
                            <input class="form-control mr-sm-2" type="text" name="query" id="query" placeholder="Search by book title, author name..." aria-label="Search" style="width: 80%" value={{ request()->input('query') }}>
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
                                <th scope="col">Book</th>
                                <th scope="col">Status</th>
                                {{-- <th scope="col">User</th> --}}
                              </tr>
                            </thead>
                            <tbody>
                                @forelse ($copies as $copy)
                                    <tr>
                                    <th scope="row">{{ $copy->id }}</th>
                                    <td><a href={{ "/copies/" . $copy->id }}>{{ $copy->book->title }}</a></td>
                                    <td>{{ $copy->state->state }}</td>
                                    </tr>
                                    </a>
                                @empty
                                <tr>
                                <th scope="row">Not copies found.</th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center pt-4">
                                {{ $copies->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
