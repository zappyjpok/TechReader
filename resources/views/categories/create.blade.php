<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 20/06/2015
 * Time: 5:25 PM
 */
?>

@extends('_layouts._adminLayout')

@section('content')
    <a href="{{ action('CategoriesController@index') }}" class="btn btn-primary btn-sm"> Return to Categories </a>

    {!! Form::open([
    'class' => 'form-group',
    'url' => 'categories'
    ])
    !!}

    <section class="row form-spacing">
        <div class="col-md-2">
            {!! Form::label('catName', 'Product Name:') !!}
        </div>
        <div class="col-md-4 input-lg">
            {!! Form::text('catName', null, ['class' => 'form-control', 'placeholder' => 'Enter Category Name'])  !!}
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-4">
            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control', 'name' => 'Submit']) !!}
        </div>
    </section>


    {!! Form::close() !!}

@endsection