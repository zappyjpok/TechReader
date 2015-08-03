<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 3/08/2015
 * Time: 7:10 PM
 */ ?>

@extends('_layouts._layout')

@section('content')

    <article class="payment-box">
        <h3> Your order has been processed </h3>
        <p> Your shipment will be processed in the next 48 hours.  An email will be sent to your account with your order information </p>
    </article>
@endsection

@section('footer')
    @include('_layouts._footer')
@stop