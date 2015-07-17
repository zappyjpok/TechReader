<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 14/07/2015
 * Time: 8:32 PM
 */ ?>

@extends('_layouts._adminLayout')

@section('content')

    @include('_layouts._validation')
    <section>
        <a href="{{ action('RolesController@index') }}" class="btn btn-primary btn-sm"> Return to Roles</a>

        {!! Form::model($role ,[
        'method' => 'PATCH',
        'class' => 'form-group',
        'url' => ['roles', $role->id]
        ])
        !!}
        @include('roles._partials._form')
        {!! Form::close() !!}
    </section>

@endsection