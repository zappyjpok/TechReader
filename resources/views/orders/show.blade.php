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
    @include('orders._partials._orderInfo', ['button' => 'Continue Order', 'redirect' => '#'])

@endsection

@section('footer')
    @include('_layouts._footer')
@stop