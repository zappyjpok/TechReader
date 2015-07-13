<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 16/06/2015
 * Time: 8:07 PM
 */ ?>

@extends('_layouts._adminLayout')

@section('content')

<article class="row">
    <section class="col-md-5"> <img src="{{ App\Services\ChangeName::changeToLocalEnvironment($product->image, 'Tech') }}"> </section>
    <section class="col-md-4">
        <h2> {{ $product->title }} </h2>
        <p> by {{ $product->author }} </p>
        <p> Date Published: {{ $product->publish_date }} </p>
        <p> Publisher: {{ $product->publisher}} </p>
        <p> Price: ${{ $product->price }} </p>
        <p> {{ $product->description }} </p>
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