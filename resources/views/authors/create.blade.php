@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Author') }}
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
                        <form method="post" action="{{route('author_store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="first_name">First Name<span class="requiredSpan">*</span></label>
                                        <input type="text" required class="form-control" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="Ex.Roberto">
                                        @if($errors->first('first_name'))
                                            <div class="alert-danger">{{$errors->first('first_name')}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="last_name">Last Name <span class="requiredSpan">*</span></label>
                                        <input type="text" required class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Ex.Cemeri">
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
                                               value="{{ old('last_name') }}" placeholder="name@example.com">

                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                               value="{{ old('phone') }}" placeholder="Ex.0690000000">

                                    </div>
                                </div>


                            </div>
                            <br>
                            <button type="submit" class="btn btn-outline-primary form-control">Create</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection