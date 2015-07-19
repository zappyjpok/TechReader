<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 4/07/2015
 * Time: 3:16 PM
 */?>

@extends('_layouts._layout')

@section('content')
    <article class="row">
        <section class="col-md-4">
            <img src="{{ App\library\ChangeName::changeToLocalEnvironment($product->image, 'Tech')   }}">
        </section>
        <section class="col-md-5">
            <h2> {{ $product->title }} </h2>
            <p> by {{ $product->author }} </p>
            <p class="price"> Price: ${{ $product->price }} </p>
            <h4> About {{ $product->title }}</h4>
            <p> {{ $product->description }} </p>

            <h4> Book Details </h4>
            <p> Publisher: {{ $product->publisher }} </p>
            <p> Date Published: {{ $product->publish_date }} </p>
        </section>
        <section class="col-md-3">
            <div class="side-options">
                <h3 class="spacing-sm"> Order Now </h3>
                <p class="spacing-sm">
                <a href="#" class="btn btn-info btn-lg">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                    Add to Cart
                </a>
                </p>
                <p class="spacing-sm"> All products are shipped in 24 hours</p>
                <p class="spacing-sm"> Satisfaction guaranteed!  If you are not happy with your purchase please send it back for a full refund.  </p>
            </div>
        </section>
    </article>
    <article class="row">
        <h3> Customers who have bought this product have also bought </h3>
    </article>
@endsection