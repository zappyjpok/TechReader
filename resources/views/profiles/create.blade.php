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
            <div class="col-md-6 col-md-offset-1">
                <div class="panel panel-default">
                    <article class="panel-heading">
                        <h4> Please enter your order information  </h4>
                    </article>
                    <article class="panel-body">
                        <!-- Form  -->
                        <section class="row">
                            @include('_layouts._validation')
                            {!! Form::open([
                            'class'  => 'form-horizontal validation-form',
                            'action' => ['ProfilesController@store', $user->id]
                            ])
                            !!}
                            @include('profiles._partials._form', ['submitButton' => $submitButton])
                            {!! Form::close() !!}
                        </section>
                    </article>
                </div>
            </div>
            <div class="col-md-5">
                @include('profiles._partials._userInfo', ['user' => $user])
            </div>
        </div>
    </main>

@endsection

@section('footer')
    @include('_layouts._footer')
@stop