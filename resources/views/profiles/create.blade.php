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
        <!-- Users Information -->
        <section class="row display-user-info top-buffer-20">
            <h4> Your information </h4>
            <div class="row">
                <div class="col-md-2">
                    Username:
                </div>
                <div class="col-md-4 input-lg">
                    {{ $user->name }}
                </div>
                <div class="col-md-2">
                    Email:
                </div>
                <div class="col-md-4 input-lg">
                    {{ $user->email }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <a class="btn btn-success"
                       href="{{ action('ProductsController@create') }}"> Edit Information </a>
                </div>
                <div class="col-md-4 input-lg">

                </div>
            </div>
        </section>
        <!-- Form  -->

        @if(!empty($user->profile->first_name))
            <section class="row top-buffer-20">
                <h4> Please enter your order information  </h4>
                {!! Form::open([
                'class'  => 'form-group',
                'action' => 'ProfilesController@store'
                ])
                !!}
                @include('profiles._partials._form', ['submitButton' => 'Add Sale'])
                {!! Form::close() !!}
            </section>
        @else
            Display User not the form
        @endif

    </main>

@endsection