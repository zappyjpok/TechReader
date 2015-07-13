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
        @include('categories._partials._form')

    {!! Form::close() !!}

@endsection