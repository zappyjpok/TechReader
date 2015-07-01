<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 20/06/2015
 * Time: 6:06 PM
 */
 ?>

@extends('_layouts._adminLayout')

@section('content')
    <section class="jumbotron">
        <h2>
            @if(isset($header))
                {{ $header }}
            @endif
        </h2>
        <p>
            @if(isset($instructions))
                {{ $instructions }}
            @endif
        </p>
        <p>
            @if(isset($createButton))
                <a class="btn btn-default btn-lg" href="{{ action('ProductsController@create') }}"> {{ $createButton }} </a>
            @endif
        </p>

    </section>

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Price</th>
            <th>Sale</th>
            <th>Edit Sale</th>
            <th>Update Product</th>
            <th>Delete Product</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td> <a href="{{ action('ProductsController@show', $product->id) }}"> {{ $product->title }} </a> </td>
                <td>
                    @if($product->category)
                        {{ $product->category->first()->name }}
                    @else
                        {{ $product->getCategoryName($product->category_id) }}
                    @endif
                </td>
                <td> {{ $product->publisher }} </td>
                <td> {{ $product->author }} </td>
                <td> ${{ $product->price }} </td>
                <td>
                    @if(!App\Sale::current()->findProduct($product->id)->first())
                        Not On Sale
                    @else
                        {{ App\Sale::current()->findProduct($product->id)->first()->discount }}
                    @endif
                </td>
                <td>
                    @if(!App\Sale::current()->findProduct($product->id)->first())
                        <a href="{{ action('SalesController@create', $product->title) }}" class="btn btn-success"> Add Sale  </a>
                    @else
                        <a href="{{ action('SalesController@edit', [$product->title,
                        'id' => App\Sale::current()->findProduct($product->id)->first()->id]) }}" class="btn btn-primary"> Edit Sale  </a>
                    @endif
                </td>
                <td>  <a href="{{ action('ProductsController@edit', $product->id) }}" class="btn btn-info"> Update  </a> </td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id ]]) !!}
                        {!! Form::submit('Delete', ['class' => "btn btn-danger btn-sm"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection