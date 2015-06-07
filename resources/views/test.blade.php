@extends('_layouts._layout')

@section('content')
    <div class="container">
        <h2> Test Test</h2>

        {!! $output !!}

        <div> {{ var_dump($check) }}</div>
    </div>
@endsection