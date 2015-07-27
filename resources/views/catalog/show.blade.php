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
            @include('catalog._partials._cart')
        </section>
    </article>
    <article class="row">
        <h3> Customers who have bought this product have also bought </h3>
    </article>
@endsection