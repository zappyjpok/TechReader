<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 13/07/2015
 * Time: 11:30 AM
 */ ?>

@extends('_layouts._layout')

@section('content')

    <main class="container">
        <!-- Users Information -->
        @include('profiles._partials._userInfo', ['user' => $user])

        <h4> Do you want to delete this profile?</h4>
        {!! Form::open(['method' => 'DELETE', 'route' => ['profile.destroy', $profile->id ]]) !!}
            {!! Form::submit('Delete', ['class' => "btn btn-danger"]) !!}
        {!! Form::close() !!}

        @include('_layouts._validation')
        <!-- Form  -->
        <section class="row top-buffer-20">
            <h4> Please enter your order information  </h4>
            {!! Form::model($profile, [
            'method' => 'PATCH',
            'class'  => 'form-group',
            'action' => ['ProfilesController@update', $profile->id]
            ])
            !!}
            @include('profiles._partials._form', ['submitButton' => $submitButton])
            {!! Form::close() !!}
        </section>
    </main>

@endsection