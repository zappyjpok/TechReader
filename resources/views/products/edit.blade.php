<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 23/06/2015
 * Time: 8:27 PM
 */ ?>

@extends('_layouts._adminLayout')

@section('content')

@include('_layouts._validation')
    <img src="{{ App\library\ChangeName::changeToLocalEnvironment($product->image, 'Tech') }}">

    {!! Form::model($product, [
        'method' => 'PATCH',
        'class' => 'form-group',
        'file' => true,
        'enctype' => 'multipart/form-data',

        'action' => ['ProductsController@update', $product->id]
        ])
    !!}

    @include('products._partials._form', ['submitButton' => 'Update Product'])

    {!! Form::close() !!}

@endsection