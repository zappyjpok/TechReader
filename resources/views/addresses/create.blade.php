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

    <main class="container">

        @include('addresses._partials._userInfo', ['user' => $user])

        @include('_layouts._validation')
        <!-- Form  -->
            <section class="row top-buffer-20">
                <h4> Please enter your order information  </h4>
                {!! Form::open([
                'class'  => 'form-group',
                'action' => ['AddressesController@store', $user->id]
                ])
                !!}
                @include('addresses._partials._form', ['submitButton' => $submitButton])
                {!! Form::close() !!}
            </section>
    </main>

@endsection