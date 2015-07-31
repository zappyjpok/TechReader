<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 29/07/2015
 * Time: 3:30 PM
 */ ?>

@extends('_layouts._layout')

@section('content')
    <article class="row top-buffer-10">
        <h4> Welcome {{ $user->name }} </h4>
    </article>
    <article class="order-box">
        <h3> Your order information </h3>
        @if(isset($products))
            @foreach(array_chunk($products, 2) as $row)
                <section class="row">
                    @foreach($row as $product)
                        <div class="col-md-6">
                            <h5> Title: {{ $product['title'] }} </h5>
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="{{
                                    App\library\ChangeName::changeToThumbnail(
                                    App\library\ChangeName::changeToLocalEnvironment($product['image'], 'Tech'))
                                    }}">
                                </div>
                                <div class="col-md-7">
                                    <p> Author: {{ $product['author'] }} </p>
                                    <p class="price"> ${{  $product['price']   }} </p>

                                    @include('orders._partials._quantity')

                                    <a href="{{ action('OrdersController@destroy', [$product['id']]) }}" class="btn btn-danger">
                                        Remove Item
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
            @endforeach
        @endif
        <section class="row">
            <div class="pull-right">
                <h4 class="text-info"> Total: ${{ $total }} </h4>
                <a href="{{ action('AddressesController@select', $user->name) }}" class="btn btn-success">
                    Continue Order
                </a>
            </div>
        </section>
    </article>

@endsection

@section('footer')
    @include('_layouts._footer')
@stop