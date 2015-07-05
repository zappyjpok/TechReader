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
    <section class="col-md-3"> <img src="{{ $product->image }}"> </section>
    <section class="col-md-6">
        <h2> {{ $product->title }} </h2>
        <p> by {{ $product->author }} </p>
        <p> Date Published: {{ $product->publish_date }} </p>
        <p> Publisher {{ $product->publish}} </p>
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