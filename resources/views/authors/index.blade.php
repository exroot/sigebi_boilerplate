@extends('layouts.app')

@section('title', 'SIGEBI | Authors')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">Authors</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Author ID</th>
                            <th scope="col">Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($authors as $author)
                                <tr>
                                <th scope="row">{{ $author->id }}</th>
                                <td><a href={{ "/authors/" . $author->id }}>{{ $author->name }}</a></td>
                                </tr>
                            @empty
                            <tr>
                            <th scope="row">Not authors found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center pt-4">
                            {{ $authors->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
