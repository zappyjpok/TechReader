<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 13/06/2015
 * Time: 11:13 PM
 */
 ?>
@extends('_layouts._layout')

@section('content')

{!! Form::open(['class' => 'form-inline']) !!}

    <section class="row form-spacing">
        <div class="col-md-2">
            {!! Form::label('Address', 'Street Address:') !!}
        </div>
        <div class="col-xs-5 col-md-5">
            {!! Form::text('Address', null, ['class' => 'form-control'])  !!}
        </div>

        <div class="col-md-2">
            {!! Form::label('City', 'City:') !!}

        </div>
        <div class="col-md-3">
            {!! Form::text('City', null, ['class' => 'form-control'])  !!}
        </div>
    </section>

{!! Form::close() !!}
@endsection