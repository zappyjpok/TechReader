<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 13/07/2015
 * Time: 8:11 AM
 */ ?>

@extends('_layouts._layout')

@section('content')

    <main class="container">

        @include('addresses._partials._userInfo', ['user' => $user])

        @include('_layouts._validation')
        <!-- Form  -->
            <section class="row top-buffer-20">
                <h4> Do you want to delete this address?</h4>
                {!! Form::open(['method' => 'DELETE', 'route' => ['address.destroy', $address->id ]]) !!}
                    {!! Form::submit('Delete', ['class' => "btn btn-danger"]) !!}
                {!! Form::close() !!}

                <h4> Please edit your address below!  </h4>
                {!! Form::model($address, [
                'method' => 'PATCH',
                'class'  => 'form-group',
                'action' => ['AddressesController@update', $address->id]
                ])
                !!}
                @include('addresses._partials._form', ['submitButton' => $submitButton])
                {!! Form::close() !!}
            </section>
    </main>

@endsection