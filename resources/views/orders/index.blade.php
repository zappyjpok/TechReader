<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 16/08/2015
 * Time: 4:01 PM
 */ ?>

@extends('_layouts._adminLayout')

@section('content')
    @include('_includes._jumbo')

    <table class="table">
        <thead>
        <tr>
            <th>User</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date</th>
            <th>City</th>
            <th>State</th>
            <th>Postal Code</th>
            <th>View Order</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td> {{ $order->user->name }} </td>
                <td> {{ $order->user->profile->first_name }} </td>
                <td> {{ $order->user->profile->last_name }} </td>
                <td> {{ $order->order_date}} </td>
                <td> {{ $order->address->city }} </td>
                <td> {{ $order->address->state }} </td>
                <td> {{ $order->address->postal_code }} </td>

                <td>  <a href="{{ action('OrdersController@view', $order->id) }}" class="btn btn-info"> View  </a> </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection

@section('footer')
    @include('_layouts._footer')
@stop