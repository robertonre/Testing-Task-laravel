@extends('layouts.app')



@section('content')


    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('View/Edit Author') }}
                        <div style="text-align: right">
                            <a style="" href="{{route('authors')}}" class="btn btn-outline-info">View All</a>
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

                            <div id="app">
                                <div class="container">
                                    <author-edit-component
                                            author_id={{$author->id}} api_token={{Auth()->user()->api_token}}></author-edit-component>
                                </div>
                            </div>
                            <hr>
                           {{-- <h3>Laravel </h3>
                        <form method="post" action="{{route('author_update',['author'=>$author->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="first_name">First Name<span class="requiredSpan">*</span></label>
                                        <input type="text" required class="form-control" name="first_name" id="first_name" value="{{$author->first_name}}" >
                                        @if($errors->first('first_name'))
                                            <div class="alert-danger">{{$errors->first('first_name')}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="last_name">Last Name <span class="requiredSpan">*</span></label>
                                        <input type="text" required class="form-control" name="last_name" id="last_name" value="{{$author->last_name}}" >
                                        @if($errors->first('last_name'))
                                            <div class="alert-danger">{{$errors->first('last_name')}}</div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                               value="{{$author->email ? $author->email : ''}}" placeholder="name@example.com">

                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                               value="{{$author->phone ? $author->phone : ''}}" placeholder="Ex.0690000000">

                                    </div>
                                </div>


                            </div>
                            <br>
                            <button type="submit" class="btn btn-outline-primary form-control">Update</button>
                        </form>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection