<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 14/07/2015
 * Time: 8:32 PM
 */ ?>

@extends('_layouts._adminLayout')

@section('content')
    <section>
        <a href="{{ action('RolesController@index') }}" class="btn btn-primary btn-sm"> Return to Roles</a>

        {!! Form::open([
        'class' => 'form-group',
        'url' => 'roles'
        ])
        !!}

        {!! Form::close() !!}
    </section>
@endsection