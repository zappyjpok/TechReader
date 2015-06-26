@extends('_layouts._layout')

@section('content')
    <div class="container">

        <h2> Die or Dump </h2>
        @if(isset($query))
            <pre>

            </pre>
        @endif

        <h2> Test Test</h2>
            @foreach($query as $x)
                <p> {{ $x->id }}</p>
             @endforeach
        <h3> Secret Output </h3>


        <h3> Vardump </h3>

        @if(isset($x))
            <pre>
                   {{ print_r(var_dump($x)) }}
            </pre>
         @endif



    </div>
@endsection