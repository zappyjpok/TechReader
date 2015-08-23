<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 13/07/2015
 * Time: 7:34 AM
 */ ?>

@extends('_layouts._layout')

@section('content')

    <div class="row top-buffer-20">
        <div class="col-md-7">
            <div class="panel panel-default">
                <article class="panel-heading">
                    <h4> Please Select your address  </h4>
                </article>
                <article class="panel-body">
                    <div class="row">
                        <div class="col-md-offset-1">
                            <h5> Need to create a new address </h5>
                            <div>
                                <a class="btn btn-primary btn-lg"
                                   href="{{ action('AddressesController@create', $user->name) }}"> Create a new Address </a>
                            </div>
                        </div>
                    </div>
                    <div class="row top-buffer-10">
                        <div class="col-md-offset-1">
                            <div class="row">
                                {!! Form::open([
                                'action' => ['OrdersController@addAddress', $user->id]
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
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-md-5">
            @include('addresses._partials._userInfo', ['user' => $user])
        </div>
    </div>
@endsection