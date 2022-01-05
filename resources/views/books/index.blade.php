@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('All Books') }}
                        <div style="text-align: right">
                            <a style="" href="{{route('book_create')}}" class="btn btn-outline-info">Create New</a>
                        </div>

                    </div>
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Author</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                            <tr>
                                <th scope="row">{{$book->id}}</th>
                                <td>{{$book->name}}</td>
                                <td>{{$book->description}}</td>
                                <td><img class="w-25 m-auto d-block" @isset($book->image) src="{{asset("/storage/$book->image")}} " @endisset></td>
                                <td>{{$book->price ? $book->price : ''}}</td>
                                <td>{{$book->author_id ? $book->author->first_name.' '.$book->author->last_name : ''}}</td>
                                <td>
                                    <a href="{{route('book_show',['book'=>$book->id])}}" class="btn btn-sm btn-info">View/Edit</a>
                                    <a href="{{route('book_delete',['book'=>$book->id])}}" onclick="return confirm('Are you sure you want to delete this Book?');" class="btn btn-sm btn-danger">Delete</a>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection