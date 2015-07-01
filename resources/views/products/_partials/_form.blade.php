<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 19/06/2015
 * Time: 7:18 PM
 */
?>

<section class="row form-spacing">
    <div class="col-md-2">
        {!! Form::label('name', 'Product Name:') !!}
    </div>
    <div class="col-md-4 input-lg">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Product Name'])  !!}
    </div>
    <div class="col-md-2">
        {!! Form::label('author', 'Author:') !!}
    </div>
    <div class="col-md-4">
        {!! Form::text('author', null, ['class' => 'form-control', 'placeholder' => 'Enter Author'])  !!}
    </div>
</section>

<section class="row form-spacing">
    <div class="col-md-2">
        {!! Form::label('title', 'Title') !!}
    </div>
    <div class="col-md-4 input-lg">
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Title'])  !!}
    </div>
    <div class="col-md-2">
        {!! Form::label('publish_date', 'Publish Date:') !!}
    </div>
    <div class="col-md-4">
        {!! Form::input('date', 'publish_date', date('Y-m-d'), ['class' => 'form-control'] ) !!}
    </div>
</section>

<section class="row form-spacing">
    <div class="col-md-2">
        {!! Form::label('publisher', 'Publisher') !!}
    </div>
    <div class="col-md-4 input-lg">
        {!! Form::text('publisher', null, ['class' => 'form-control', 'placeholder' => 'Enter Publisher'])  !!}
    </div>
    <div class="col-md-2">
        {!! Form::label('price', 'Price:') !!}
    </div>
    <div class="col-md-4">
        {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Enter Price'])  !!}
    </div>
</section>

<section class="row form-spacing">
    <div class="col-md-2">
        {!! Form::label('category_id', 'Category') !!}
    </div>
    <div class="col-md-4 input-lg">
        {!! Form::select('category_id', $categories) !!}
    </div>
    <div class="col-md-2">

    </div>
    <div class="col-md-4">

    </div>
</section>

<section class="row form-spacing">
    {!! Form::textarea('description', null, array(
    'class' => 'form-control',
    'placeholder' => 'Please describe the house type here!')) !!}
</section>

<section class="row form-spacing">
    <div class="col-md-2">
        {!! Form::label('image', 'Upload Image:') !!}
    </div>
    <div class="col-md-4">
        {!! Form::file('image') !!}
    </div>
    <div class="col-md-2">

    </div>
    <div class="col-md-4 input-lg">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control', 'name' => 'Submit']) !!}
    </div>
</section>