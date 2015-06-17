<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 16/06/2015
 * Time: 8:07 PM
 */ ?>

@extends('_layouts._layout')

@section('content')

<article class="row">
    <section class="col-md-3"> <img src="{{ $product->proImagePath }}"> </section>
    <section class="col-md-6">
        <h2> {{ $product->proTitle }} </h2>
        <p> by {{ $product->proAuthor }} </p>
        <p> Date Published: {{ $product->proPublishDate }} </p>
        <p> Publisher {{ $product->proPublish}} </p>
        <p> Price: ${{ $product->proPrice }} </p>
        <p> {{ $product->proDescription }} </p>
    </section>
    <section class="col-md-3">
        <div >
            <h3> Order Now </h3>
            <p> Add to Cart</p>
            <p> All products are shipped in 24 hours</p>
        </div>
    </section>
</article>

@endsection