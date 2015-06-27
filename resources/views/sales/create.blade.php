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
    'class' => 'form-group',
    'url' => 'sales'
    ])
    !!}
        <section class="row">
            <div class="col-md-2">
                {!! Form::label('salStart', 'Start Date') !!}
            </div>
            <div class="col-md-4 input-lg">
                {!! Form::input('date', 'salStart', date('Y-m-d'), ['class' => 'form-control'] ) !!}
            </div>
            <div class="col-md-2">
                {!! Form::label('salFinish', 'Finish Date') !!}
            </div>
            <div class="col-md-4 input-lg">
                {!! Form::input('date', 'salFinish', date('Y-m-d'), ['class' => 'form-control'] ) !!}
            </div>
            </div>
        </section>
        <section class="row">
            <div class="col-md-2">
                {!! Form::label('salDiscount', 'Discount') !!}
            </div>
            <div class="col-md-4 input-lg">
                {!! Form::select('proDiscount', $discounts) !!}
            </div>
            <div class="col-md-2">

            </div>
            <div class="col-md-4">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control', 'name' => 'Submit']) !!}
            </div>
        </section>
    {!! Form::close() !!}


@endsection