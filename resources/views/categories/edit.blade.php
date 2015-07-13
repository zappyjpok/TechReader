<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 13/07/2015
 * Time: 2:08 PM
 */?>

@extends('_layouts._adminLayout')

@section('content')
    <a href="{{ action('CategoriesController@index') }}" class="btn btn-primary btn-sm"> Return to Categories </a>

    {!! Form::model($category, [
    'method' => 'PATCH',
    'class' => 'form-group',
    'url' => ['categories', $category->id]
    ])
    !!}
    @include('categories._partials._form')

    {!! Form::close() !!}

@endsection