<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 28/06/2015
 * Time: 4:49 PM
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

    {!! Form::model($sale, [
    'method' => 'PATCH',
    'class'  => 'form-group',
    'action' => ['SalesController@update', $product->id]
    ])
    !!}
        @include('sales._partials._form', ['submitButton' => 'Edit Sale'])
    {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'route' => ['sales.destroy', $sale->id ]]) !!}
        {!! Form::submit('Cancel', ['class' => "btn btn-danger btn-sm"]) !!}
    {!! Form::close() !!}

@endsection