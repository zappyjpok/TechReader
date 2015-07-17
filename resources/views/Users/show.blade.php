<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 7/07/2015
 * Time: 8:09 PM
 */ ?>

@extends('_layouts._adminLayout')

@section('content')

<main class="container">

    @include('_includes._jumbo')

    <section class="row">
        <!-- User Information -->
        <div class="col-md-4 sections">
            <h3> User Information </h3>
            <p>
                <span class="label-information"> User name: </span>
                <span class="info"> {{ $user->name }} </span>
            </p>
            <p>
                <span class="label-information"> First Name: </span>
                <span class="info">
                    @if(!empty($user->profile->first_name))
                        {{ $user->profile->first_name }}
                    @else
                        No First Name Available
                    @endif
                </span>
            </p>
            <p>
                <span class="label-information"> Last Name: </span>
                <span class="info">
                    @if(!empty($user->profile->last_name))
                        {{ $user->profile->last_name }}
                    @else
                        No Last Name Available
                    @endif
                </span>
            </p>
            <p>
                <span class="label-information"> Email: </span>
                <span class="info"> {{ $user->email }} </span>
            </p>
            <p>
                <span class="label-information"> VIP Number: </span>
                <span class="info">
                    @if(!empty($user->profile->VIPNumber))
                        {{ $user->profile->VIPNumber }}
                    @else
                        No VIP number
                    @endif
                </span>
            </p>
        </div>

        <!-- Administration -->
        @if(!empty($user->profile->first_name))
            <div class="col-md-4 sections">
                <h3> Administration </h3>
                <p>
                    <span class="info">
                        @if(!empty($user->roles->first()->name))
                            @foreach($user->roles as $role)
                                <span class="label-information"> Role: </span>
                                {{ $role->name }}
                                {!! Form::open(['method' => 'DELETE', 'route' => ['AddRoles.destroy', $user->id, $role->id ]]) !!}
                                    {!! Form::submit('Remove Role', ['class' => "btn btn-danger btn-sm"]) !!}
                                {!! Form::close() !!}
                            @endforeach
                        @else
                            Role: Customer
                        @endif
                    </span>
                </p>
                <p>
                    <span class="label-information"> Add Role: </span>
                    <a class="btn btn-success"
                       href="{{ action('AddRolesController@create', $user->name) }}"> Add Role </a>
                </p>
            </div>
        @endif

        <!-- Contact Information -->
        <div class="col-md-4 sections">
            <h3> Contact Information </h3>
            <p>
                <span class="label-information"> Phone: </span>
                <span class="info">
                     @if(!empty($user->profile->phone))
                        {{ $user->profile->phone }}
                    @else
                        No Data Available
                    @endif
                </span>
            </p>
            <p>
                <span class="label-information">Address: </span>
                <span class="info">
                     @if(!empty($user->addresses->first()->address))
                        {{ $user->addresses->first()->address}}
                    @else
                        No Data Available
                    @endif
                </span>
            </p>
            <p>
                <span class="label-information">City: </span>
                <span class="info">
                     @if(!empty($user->addresses->first()->city))
                        {{ $user->addresses->first()->city }}
                    @else
                        No Data Available
                    @endif
                </span>
            </p>
            <p>
                <span class="label-information">State: </span>
                <span class="info">
                     @if(!empty($user->addresses->first()->state))
                        {{ $user->addresses->first()->state }}
                    @else
                        No Data Available
                    @endif
                </span>
            </p>
            <p>
                <span class="label-information">Postal Code: </span>
                <span class="info">
                     @if(!empty($user->addresses->first()->postal_code))
                        {{ $user->addresses->first()->postal_code }}
                    @else
                        No Data Available
                    @endif
                </span>
            </p>
        </div>

    </section>

</main>
@endsection