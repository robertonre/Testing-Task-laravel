@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-6">
                            <h3>Authors</h3>
                            <a style="" href="{{route('authors')}}" class="btn btn-outline-info">View All</a>
                        </div>
                        <div class="col-6">
                            <h3>Books</h3>
                            <a href="{{route('books')}}" class="btn btn-outline-info">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
