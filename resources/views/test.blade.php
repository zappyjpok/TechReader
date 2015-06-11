@extends('_layouts._layout')

@section('content')
    <div class="container">
        <h2> Test Test</h2>

        <h3> Secret Output </h3>

        {!! $output !!}

        <h3> Vardump </h3>

        @foreach($sale as $x)
            {{ var_dump($x) }}
            <br>
            <br>
            @endforeach



    </div>
@endsection