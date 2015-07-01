<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 27/06/2015
 * Time: 4:47 PM
 */?>

@extends('_layouts._adminLayout')

@section('content')
    <section class="row">
        <div class="col-md-4 col-lg-4">
            <h4> Title: {{ $product->title }}</h4>
            <h4> Price: {{ $product->price }}</h4>
            <h4> Publisher: {{ $product->publisher }}</h4>
        </div>
        <div class="col-md-4 col-lg-4">
            <h4> Name: {{ $product->title }}</h4>
            <h4> Author: {{ $product->author }}</h4>
            <h4> Publish Date: {{ $product->publish_date }} </h4>
        </div>
        <div class="col-md-4 col-lg-4">
            <img src="{{ $product->image }}" class="img"/>
        </div>
    </section>
    {!! Form::open([
    'class'  => 'form-group',
    'action' => 'SalesController@store'
    ])
    !!}
        @include('sales._partials._form', ['submitButton' => 'Add Sale'])
    {!! Form::close() !!}


@endsection