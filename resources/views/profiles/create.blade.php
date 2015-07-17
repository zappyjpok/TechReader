<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 9/07/2015
 * Time: 7:24 PM
 */ ?>

@extends('_layouts._layout')

@section('content')

    <main class="container">

        @include('profiles._partials._userInfo', ['user' => $user])

        @include('_layouts._validation')
        <!-- Form  -->
        <section class="row top-buffer-20">
            <h4> Please enter your order information  </h4>
            {!! Form::open([
            'class'  => 'form-group',
            'action' => ['ProfilesController@store', $user->id]
            ])
            !!}
            @include('profiles._partials._form', ['submitButton' => $submitButton])
            {!! Form::close() !!}
        </section>
    </main>

@endsection