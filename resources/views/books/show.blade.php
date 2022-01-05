@extends('layouts.app')



@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('View/Edit Book') }}
                        <div style="text-align: right">
                            <a style="" href="{{route('books')}}" class="btn btn-outline-info">View All</a>
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
                        <form method="post" action="{{route('book_update',['book'=>$book->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="name">Name<span class="requiredSpan">*</span></label>
                                        <input type="text" required class="form-control" name="name" id="name" value="{{ $book->name }}" placeholder="Ex.Star">
                                        @if($errors->first('name'))
                                            <div class="alert-danger">{{$errors->first('name')}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text"  class="form-control" name="price" id="price" value="{{ $book->price }}" placeholder="Ex.500">

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="4" cols="50"  placeholder="Describe book here...">{{$book->description}}</textarea>

                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label class="form-label" for="customFile">Image</label>
                                        <input type="file" name="image" class="form-control" id="customFile"/>
                                        <small class="requiredSpan">*Dont select a new one if u dont want to change!*</small>
                                        @if($errors->first('image'))
                                            <div class="alert-danger">{{$errors->first('image')}}</div>
                                        @endif
                                        <img class="w-50 m-auto d-block" @isset($book->image) src="{{asset("/storage/$book->image")}} " @endisset>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="author_id">Select Author:<span class="requiredSpan">*</span></label>
                                        <select required name="author_id" class="form-select" aria-label="Default select example">
                                            <option selected>Select Author</option>
                                            @foreach($authors as $author)
                                                <option {{$author->id == $book->author_id ? ' selected' : ''}} value="{{$author->id}}">{{$author->first_name.' '.$author->last_name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('author_id'))
                                            <div class="alert-danger">{{$errors->first('author_id')}}</div>
                                        @endif
                                    </div>
                                </div>


                            </div>
                            <br>
                            <button type="submit" class="btn btn-outline-primary form-control">Update</button>
                        </form>

                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection