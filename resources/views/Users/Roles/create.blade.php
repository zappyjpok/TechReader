<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 16/07/2015
 * Time: 5:35 PM
 */ ?>

@extends('_layouts._adminLayout')

@section('content')
    <section>
        <a class="btn btn-success"
           href="{{ action('UsersController@show', $user->name) }}"> Return to user's profile </a>

        <h5> User Name: {{ $user->name  }}</h5>
        <h5> First Name: {{  $user->profile->first_name }} </h5>
        <h5> Last Name:{{  $user->profile->last_name  }}</h5>

        {!! Form::open([
        'action' => ['AddRolesController@store', $user->id]
        ])
        !!}
            {!! Form::select('id', $roleList) !!}
            {!! Form::submit('Add Role', ['class' => 'btn btn-primary', 'name' => 'Submit']) !!}
        {!! Form::close() !!}
    </section>

@endsection