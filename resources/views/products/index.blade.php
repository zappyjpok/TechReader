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
    <section>

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
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td> {{ $product->proTitle }} </td>
                <td> {{ $product->catagories->catName }} </td>
                <td> {{ $product->proPublisher }} </td>
                <td> {{ $product->proAuthor }} </td>
                <td> ${{ $product->proPrice }} </td>
                <td>  {{ $product->proSale}}  </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection