@extends('_layouts._layout')

@section('content')
    <div class="container">
        <h2> Test Test</h2>

        {{ $char }}

        <h3> Output </h3>

        {!! $output !!}

        <div> {{ var_dump($check) }}</div>
    </div>
@endsection