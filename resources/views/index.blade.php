@extends('layouts.app')

@section('style')
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-weight: 500;
            font-family: 'HelveticaNeue';
        }

        section {
            width: 100%;
            padding: 0 7%;
            display: table;
            margin: 0;
            max-width: none;
            background-color: #373B44;
            height: 100vh;


        }

        .intro {
            height: 90vh;
        }

        .content {
            display: table-cell;
            vertical-align: middle;
        }

        h1 {
            font-size: 3em;
            display: block;
            color: white;
            font-weight: 300;
        }

    </style>

@endsection
@section('content')
    <section class="intro">
        <div class="content">
            <h1>Coming Soon !</h1>

        </div>
    </section>


@endsection