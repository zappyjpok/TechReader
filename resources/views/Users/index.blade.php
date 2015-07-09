<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 5/07/2015
 * Time: 5:07 PM
 */ ?>


@extends('_layouts._adminLayout')

@section('content')
    <main class="container"> <!-- List of Products-->

        @include('_includes._jumbo')

        <table class="table">
            <thead>
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th> Phone </th>
                <th>Orders </th>
                <th>Role </th>
                <th>Change Role </th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <a href="{{ action('UsersController@show', $user->name) }}"> {{ $user->name }} </a>
                    </td>
                    <td>
                        @if(!empty($user->profile->first()->first_name ))
                            {{ $user->profile->first()->first_name }}
                        @else
                            Empty
                        @endif
                    </td>
                    <td>
                        @if(!empty($user->profile->first()->last_name ))
                            {{ $user->profile->first()->last_name}}
                        @else
                            Empty
                        @endif
                    </td>
                    <td>
                        @if(!empty($user->profile->first()->phone ))
                            {{ $user->profile->first()->phone}}
                        @else
                            Empty
                        @endif
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        <a href="#" class="btn btn-success"> View Orders  </a>
                    </td>
                    <td>
                        @if(!empty($user->roles->first()->name))
                            {{ $user->roles->first()->name }}
                        @else
                            No Role
                        @endif
                    </td>
                    <td>
                        <a href="#" class="btn btn-info"> Add Roles </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
@endsection

@section('footer')

@stop