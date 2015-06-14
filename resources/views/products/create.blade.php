<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 14/06/2015
 * Time: 7:12 PM
 */
?>

@extends('_layouts._layout')

@section('content')

{!! Form::open(['class' => 'form-group']) !!}

    <section class="row form-spacing">
        <div class="col-md-2">
            {!! Form::label('ProductName', 'Product Name:') !!}
        </div>
        <div class="col-md-4 input-lg">
            {!! Form::text('ProductName', null, ['class' => 'form-control', 'placeholder' => 'Enter Product Name'])  !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('Author', 'Author:') !!}
        </div>
        <div class="col-md-4">
            {!! Form::text('Author', null, ['class' => 'form-control', 'placeholder' => 'Enter Author'])  !!}
        </div>
    </section>

    <section class="row form-spacing">
        <div class="col-md-2">
            {!! Form::label('Title', 'Title') !!}
        </div>
        <div class="col-md-4 input-lg">
            {!! Form::text('Title', null, ['class' => 'form-control', 'placeholder' => 'Enter Title'])  !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('Author', 'Author:') !!}
        </div>
        <div class="col-md-4">
            <input type="date" class="form-control">
        </div>
    </section>

    <section class="row form-spacing">
        <div class="col-md-2">
            {!! Form::label('Publisher', 'Publisher') !!}
        </div>
        <div class="col-md-4 input-lg">
            {!! Form::text('Publisher', null, ['class' => 'form-control', 'placeholder' => 'Enter Publisher'])  !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('Price', 'Price:') !!}
        </div>
        <div class="col-md-4">
            {!! Form::text('Price', null, ['class' => 'form-control', 'placeholder' => 'Enter Price'])  !!}
        </div>
    </section>

    <section class="row form-spacing">
        {!! Form::textarea('description', null, array('required',
        'class' => 'form-control',
        'placeholder' => 'Please describe the house type here!')) !!}
    </section>

    <section class="row form-spacing">
        <div class="col-md-2">
            {!! Form::label('Image', 'Upload Image:') !!}
        </div>
        <div class="col-md-4">
            {!! Form::file('image') !!}
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-4 input-lg">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control', 'name' => 'Submit']) !!}
        </div>
    </section>

{!! Form::close() !!}

@endsection
