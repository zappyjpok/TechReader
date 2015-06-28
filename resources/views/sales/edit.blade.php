<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 28/06/2015
 * Time: 4:49 PM
 */?>

@extends('_layouts._adminLayout')

@section('content')

    @include('sales._partials._productData')

    {!! Form::model($sale, [
    'method' => 'PATCH',
    'class'  => 'form-group',
    'action' => ['SalesController@store', $product->id]
    ])
    !!}
        @include('sales._partials._form', ['submitButton' => 'Edit Sale'])
    {!! Form::close() !!}


@endsection