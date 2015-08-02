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
    @include('orders._partials._orderInfo')
    <section class="row">
        <div class="pull-right">
            <h4 class="text-info"> Total: ${{ $total }} </h4>
            <a href="{{ action('AddressesController@select', $user->name) }}" class="btn btn-success">
                Continue Order
            </a>
        </div>
    </section>

@endsection

@section('footer')
    @include('_layouts._footer')
@stop