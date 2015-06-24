<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 14/06/2015
 * Time: 7:12 PM
 */
?>

@extends('_layouts._adminLayout')

@section('content')

@include('products._partials._validation')

{!! Form::open([
    'class' => 'form-group',
    'url' => 'products',
    'file' => true,
    'enctype' => 'multipart/form-data'
    ])
!!}

    @include('products._partials._form', ['submitButton' => 'Add Product'])

{!! Form::close() !!}

@endsection
