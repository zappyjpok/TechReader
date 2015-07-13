<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 20/06/2015
 * Time: 5:25 PM
 */
?>

@extends('_layouts._adminLayout')

@section('content')
    <a href="{{ action('CategoriesController@create') }}" class="btn btn-primary btn-sm"> Create New Category</a>
    @if(isset($categories))
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td> {{ $category->id }}</td>
                        <td> {{ $category->name }}</td>
                        <td>
                            <a href="{{ action('CategoriesController@edit', $category->id) }}" class="btn btn-info btn-sm"> Edit House</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id ]]) !!}
                                {!! Form::submit('Delete', ['class' => "btn btn-danger btn-sm"]) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </thead>
        </table>
    @endif


@endsection