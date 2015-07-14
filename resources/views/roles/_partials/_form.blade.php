<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 14/07/2015
 * Time: 8:33 PM
 */?>

@extends('_layouts._adminLayout')

@section('content')
    <section class="row form-spacing">
        <div class="col-md-2">
            {!! Form::label('name', 'Role Name:') !!}
        </div>
        <div class="col-md-4 input-lg">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Role Name'])  !!}
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-4">
            {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control', 'name' => 'Submit']) !!}
        </div>
    </section>
@endsection