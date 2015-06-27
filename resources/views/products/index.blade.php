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
                <td> <a href="{{ action('ProductsController@show', $product->id) }}"> {{ $product->proTitle }} </a> </td>
                <td>
                    @if($product->category)
                        {{ $product->category->first()->catName }}
                    @else
                        {{ $product->getCategoryName($product->proCategoryId) }}
                    @endif
                </td>
                <td> {{ $product->proPublisher }} </td>
                <td> {{ $product->proAuthor }} </td>
                <td> ${{ $product->proPrice }} </td>
                <td>
                    @if(!$product->getSales($product->id))
                        Not On Sale
                    @else
                        {{ $product->getSales($product->id) }}
                    @endif
                </td>
                <td>
                    @if(!$product->getSales($product->id))
                        <a href="{{ action('SalesController@create', $product->proTitle) }}" class="btn btn-success"> Add Sale  </a>
                    @else
                        <a href="{{ action('SalesController@edit', $product->proTitle) }}" class="btn btn-primary"> Edit Sale  </a>
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