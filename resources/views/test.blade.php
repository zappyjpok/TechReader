@extends('_layouts._layout')

@section('content')
    <div class="container">
        <h2> Test Test</h2>


        <h3> Output </h3>

        {{ $output  }}

        <h3> Secret Output </h3>

        {!! $output !!}

        <h3> Extra Data </h3>

        {{ var_dump($a) }}

        <h3> Test String </h3>

        {{ $string }}

    </div>
@endsection