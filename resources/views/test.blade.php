
@extends('_layouts._basicLayout')

@section('content')

    <h1> Messages </h1>

    @if(isset($messages) && !empty($messages))
        @foreach($messages as $x)
            {{ $x }}
            <br>
        @endforeach
    @endif

    <h3> {{ $itemCount }}</h3>

    <h3> Test get session </h3>

    @if(!empty($test))
        @foreach($test as $x)
            <p>  {{ print_r($x) }}   </p>
        @endforeach
    @endif

    <h3> 2 foreach loops</h3>

    @if(!empty($cart))
        @foreach($cart as $product)
            Item: {{ $product['item'] }}
            <br>
            @foreach($product as $items)
                @if(isset($items['id']) && isset($items['quantity']))
                    <p> ID: {{ $items['id'] }} and Quantity: {{ $items['quantity'] }}</p>
                @endif
            @endforeach
        @endforeach
    @endif

    <h2> Var Values </h2>

    @if(!empty($var))
        @foreach($var as $array)
            <p> {{ print_r($array) }}</p>
        @endforeach
    @endif

    <h3> Var Dump</h3>
    {{ var_dump($var) }}



@endsection