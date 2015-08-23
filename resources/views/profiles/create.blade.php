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

        <div class="row top-buffer-20">
            <div class="col-md-7">
                <div class="panel panel-default">
                    <article class="panel-heading">
                        <h4> Please enter your order information  </h4>
                    </article>
                    <div class="panel-body">
                        <!-- Form  -->
                        <div class="row">
                            @include('_layouts._validation')
                            {!! Form::open([
                            'class'  => 'form-horizontal validation-form',
                            'action' => ['ProfilesController@store', $user->id]
                            ])
                            !!}
                            @include('profiles._partials._form', ['submitButton' => $submitButton])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <!-- Users Information -->
                <div class="panel panel-info">
                    <section class="panel-heading">
                        <h4> Your information </h4>
                    </section>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 input-lg">
                                Username:
                            </div>
                            <div class="col-md-8 input-lg">
                                {{ $user->name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 input-lg">
                                Email:
                            </div>
                            <div class="col-md-8 input-lg">
                                {{ $user->email }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <a class="btn btn-success"
                                   href="#"> Edit Information </a>
                            </div>
                            <div class="col-md-4 input-lg">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('footer')
    @include('_layouts._footer')
@stop