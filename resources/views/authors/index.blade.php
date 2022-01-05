@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('All Authors') }}
                        <div style="text-align: right">
                            <a style="" href="{{route('author_create')}}" class="btn btn-outline-info">Create New</a>
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
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($authors as $author)
                            <tr>
                                <th scope="row">{{$author->id}}</th>
                                <td>{{$author->first_name}}</td>
                                <td>{{$author->last_name}}</td>
                                <td>{{$author->email ? $author->email : ''}}</td>
                                <td>{{$author->phone ? $author->phone : ''}}</td>
                                <td>
                                    <a href="{{route('author_show',['author'=>$author->id])}}" class="btn btn-info">View/Edit</a>
                                    <a href="{{route('author_delete',['author'=>$author->id])}}" class="btn btn-danger">Delete</a>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $authors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection