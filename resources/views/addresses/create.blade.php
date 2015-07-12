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
        <!-- Users Information -->
        <section class="row display-user-info top-buffer-20">
            <h4> Your information </h4>
            <div class="row">
                <div class="col-md-2">
                    <h4> Username: </h4>
                </div>
                <div class="col-md-4 input-lg">
                    {{ $user->name }}
                </div>
                <div class="col-md-2">
                    <h4> Email: </h4>
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

        <!-- Profile Information -->
        <section class="row display-user-info top-buffer-20">
            <h4> Your Profile </h4>
            <div class="row">
                <div class="col-md-2">
                    <h4> First Name </h4>
                </div>
                <div class="col-md-4 input-lg">
                    @if(!empty($user->profile->first_name))
                        {{ $user->profile->first_name }}
                    @else
                        <h4> Empty </h4>
                    @endif
                </div>
                <div class="col-md-2">
                    <h4>  Last Name </h4>
                </div>
                <div class="col-md-4 input-lg">
                    @if(!empty($user->profile->last_name))
                        {{ $user->profile->last_name }}
                    @else
                        <h4> Empty </h4>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <h4> Phone Number: </h4>
                </div>
                <div class="col-md-4 input-lg">
                    @if(!empty($user->profile->phone))
                        {{ $user->profile->phone }}
                    @else
                        <h4> Empty </h4>
                    @endif
                </div>
                <div class="col-md-2">
                    <h4> VIP Number: </h4>
                </div>
                <div class="col-md-4 input-lg">
                    @if(!empty($user->profile->VIP_Number))
                        {{ $user->profile->VIP_Number }}
                    @else
                        <h4> Empty </h4>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <a class="btn btn-success"
                       href="{{ action('ProfilesController@edit', $user->id) }}"> Edit Information </a>
                </div>
                <div class="col-md-4 input-lg">

                </div>
            </div>

        </section>

        <!-- Select Address -->
        <section class="row display-user-info top-buffer-20">
            <h4> Previous Addresses </h4>
            <div class="row">
                {!! Form::open([
                'action' => ['AddressesController@store', $user->id]
                ])
                !!}
                @foreach($user->addresses as $address)
                    <div class="col-md-3">
                        {!! Form::radio('address_id', $address->id) !!}
                        <p class="address-box">
                            {{ $address->address }} <br />
                            {{ $address->state }}, {{ $address->city }}  <br />
                            {{ $address->postal_code }}
                        </p>
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
        @include('_layouts._validation')
        <!-- Form  -->
        @if(!empty($user->profile->first_name))
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
        @else
            Redirect to Profile
        @endif

    </main>

@endsection