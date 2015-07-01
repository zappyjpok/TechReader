@extends('_layouts._layout')

@section('content')
    <div class="container">

        <h2> Die or Dump </h2>
        @if(isset($sale))
            {{ dd($sale) }}
        @endif




    </div>
@endsection