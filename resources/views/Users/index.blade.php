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
        <section class="jumbotron">
            <h2>
                @if(isset($header))
                    {{ $header }}
                @endif
            </h2>
            <p>
                @if(isset($instructions))
                    {{ $instructions }}
                @endif
            </p>
            <p>
                @if(isset($createButton))
                    <a class="btn btn-default btn-lg" href="{{ action('ProductsController@create') }}"> {{ $createButton }} </a>
                @endif
            </p>

        </section>

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
                        <a href="{{ action('UsersController@show', $user->id) }}"> {{ $user->name }} </a>
                    </td>
                    <td>
                        @if(!empty($user->profile->first()->firstName ))
                            {{ $user->profile->first()->firstName }}
                        @else
                            Empty
                        @endif
                    </td>
                    <td>
                        @if(!empty($user->profile->first()->LastName ))
                            {{ $user->profile->first()->LastName}}
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
                       No Role
                    </td>
                    <td>
                        <a href="#" class="btn btn-info"> View Orders  </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
@endsection

@section('footer')

@stop