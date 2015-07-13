<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 13/07/2015
 * Time: 7:34 AM
 */ ?>

@extends('_layouts._layout')

@section('content')

    @include('addresses._partials._userInfo', ['user' => $user])

    <!-- Create a new address link -->
    <section class="row display-user-info top-buffer-20">
        <h4> Need to create a new address </h4>
        <div class="row">
            <a class="btn btn-primary btn-lg"
               href="{{ action('AddressesController@create', $user->name) }}"> Create a new Address </a>
        </div>
    </section>

    <!-- Select Address -->
    <section class="row display-user-info top-buffer-20">
        <h4> Please select an address or create a new one </h4>
        <div class="row">
            {!! Form::open([
            'action' => ['AddressesController@store', $user->id]
            ])
            !!}
            @foreach($user->addresses as $address)
                <div class="col-md-3 col-sm-3">
                    {!! Form::radio('address_id', $address->id) !!}
                    <p class="address-box">
                        {{ $address->address }} <br />
                        {{ $address->state }}, {{ $address->city }}  <br />
                        {{ $address->postal_code }}
                    </p>
                    <a class="btn btn-primary"
                       href="{{ action('AddressesController@edit', $address->id) }}"> Edit Address </a>
                </div>
            @endforeach
            <div class="row">
                <div class="col-md-12 top-buffer-20">
                    {!! Form::submit('Continue', ['class' => 'btn btn-primary', 'name' => 'Submit']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection