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
                        <a href="/copies" class="">
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
                                <th scope="col">Book</th>
                                <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                                    @forelse ($copies as $copy)
                                        <tr>
                                        <th scope="row">{{ $copy->id }}</th>
                                        <td>
                                            <a href={{ "/copies/" . $copy->id }}>{{ $copy->book->title }}</a>
                                        </td>
                                        <td>{{ $copy->state->state }}</td>
                                        </tr>
                                    @empty
                                    <tr>
                                    <th scope="row">Not copies found</th>
                                    </tr>
                                    @endforelse
                                    
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center pt-4">
                                    {{ $copies->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
