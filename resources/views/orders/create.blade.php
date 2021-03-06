<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 31/07/2015
 * Time: 6:32 PM
 */ ?>

@extends('_layouts._layout')

@section('content')

    <div class="row">
        <section class="col-md-6 payment-box">
            <h4> User Information </h4>
            <div class="row">
                <div class="col-md-4">
                    <span class="topic"> User Name: </span> <span class="answer">{{ $user->name }} </span>
                </div>
                <div class="col-md-4">
                    <span class="topic"> First Name: </span> <span class="answer">{{ $user->profile->first_name }}  </span>
                </div>
                <div class="col-md-4">
                    <span class="topic">Last Name: </span> <span class="answer">{{ $user->profile->last_name }}  </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <span class="topic"> Email: </span> <span class="answer">{{ $user->email }} </span>
                </div>
                <div class="col-md-4">
                    <span class="topic">Phone:</span> <span class="answer"> {{ $user->profile->phone}} </span>
                </div>
            </div>
        </section>

        <div class="col-md-5 col-md-offset-1 payment-box">
            <section class="row">
                <div class="col-md-6">
                    <h4> Shipping Information </h4>
                </div>
                <div class="col-md-6">
                    <h5> Address:</h5>
                    {{ $address->address }} <br>
                    {{ $address->city }},
                    {{ $address->state }},
                    {{ $address->postal_code }}
                </div>
            </section>
        </div>
    </div>

    <div class="row top-buffer-20">
        @include('orders._partials._orderInfo')
        <div class="row">
            <section class="pull-right">
                <h4 class="text-info"> Total: ${{ $total }} </h4>
                <a href="{{ action('OrdersController@store') }}" class="btn btn-success">
                    Confirm Order
                </a>
            </section>
        </div>
    </div>

@endsection

@section('footer')
    @include('_layouts._footer')
@stop