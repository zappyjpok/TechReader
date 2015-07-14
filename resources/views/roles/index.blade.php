<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 14/07/2015
 * Time: 8:32 PM
 */ ?>

@extends('_layouts._adminLayout')

@section('content')

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
                <a class="btn btn-default btn-lg" href="{{ action('RolesController@create') }}"> {{ $createButton }} </a>
            @endif
        </p>

    </section>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td> {{ $role->name }}</td>
                    <td>
                        <a href="{{ action('RolesController@edit', $role->id) }}" class="btn btn-info"> Update  </a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id ]]) !!}
                            {!! Form::submit('Delete', ['class' => "btn btn-danger btn-sm"]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection