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
            <h4> Title: {{ $product->proTitle }}</h4>
            <h4> Price: {{ $product->proPrice }}</h4>
            <h4> Publisher: {{ $product->proPublisher }}</h4>
        </div>
        <div class="col-md-4 col-lg-4">
            <h4> Name: {{ $product->proTitle }}</h4>
            <h4> Author: {{ $product->proAuthor }}</h4>
            <h4> Publish Date: {{ $product->proPublishDate }} </h4>
        </div>
        <div class="col-md-4 col-lg-4">
            <img src="{{ $product->proImagePath }}" class="img"/>
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