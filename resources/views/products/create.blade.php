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

{!! Form::open(['class' => 'form-group', 'url' => 'products']) !!}

    <section class="row form-spacing">
        <div class="col-md-2">
            {!! Form::label('proName', 'Product Name:') !!}
        </div>
        <div class="col-md-4 input-lg">
            {!! Form::text('proName', null, ['class' => 'form-control', 'placeholder' => 'Enter Product Name'])  !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('proAuthor', 'Author:') !!}
        </div>
        <div class="col-md-4">
            {!! Form::text('proAuthor', null, ['class' => 'form-control', 'placeholder' => 'Enter Author'])  !!}
        </div>
    </section>

    <section class="row form-spacing">
        <div class="col-md-2">
            {!! Form::label('proTitle', 'Title') !!}
        </div>
        <div class="col-md-4 input-lg">
            {!! Form::text('proTitle', null, ['class' => 'form-control', 'placeholder' => 'Enter Title'])  !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('proPublishDate', 'Publish Date:') !!}
        </div>
        <div class="col-md-4">
            <input type="date" name ="proPublishDate" class="form-control">
        </div>
    </section>

    <section class="row form-spacing">
        <div class="col-md-2">
            {!! Form::label('proPublisher', 'Publisher') !!}
        </div>
        <div class="col-md-4 input-lg">
            {!! Form::text('proPublisher', null, ['class' => 'form-control', 'placeholder' => 'Enter Publisher'])  !!}
        </div>
        <div class="col-md-2">
            {!! Form::label('proPrice', 'Price:') !!}
        </div>
        <div class="col-md-4">
            {!! Form::text('proPrice', null, ['class' => 'form-control', 'placeholder' => 'Enter Price'])  !!}
        </div>
    </section>

    <section class="row form-spacing">
        {!! Form::textarea('proDescription', null, array('required',
        'class' => 'form-control',
        'placeholder' => 'Please describe the house type here!')) !!}
    </section>

    <section class="row form-spacing">
        <div class="col-md-2">
            {!! Form::label('proImagePath', 'Upload Image:') !!}
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
