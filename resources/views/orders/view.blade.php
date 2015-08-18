<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 16/08/2015
 * Time: 5:14 PM
 */ ?>

@extends('_layouts._adminLayout')

@section('content')
    @include('_includes._jumbo')

    <div class="row top-buffer-20">
        <div class="col-md-4">
            <div class="panel panel-default">
                <article class="panel-heading">
                    <h4> User Information </h4>
                </article>
                <article class="panel-body">
                    <p> Username: {{ $order->user->name }} </p>
                    <p> First Name:{{ $order->user->profile->first_name }}  </p>
                    <p> Last Name: {{ $order->user->profile->last_name }} </p>
                    <p> Email Name: {{ $order->user->email }} </p>
                    <p> Phone Number: {{ $order->user->profile->phone }}</p>
                </article>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <article class="panel-heading">
                    <h4> Address </h4>
                </article>
                <article class="panel-body">
                    <p> The shipping Address</p>
                    <p> Address: {{ $order->address->address }} </p>
                    <p> State: {{ $order->address->state }} </p>
                    <p> City: {{ $order->address->city }}</p>
                    <p> Postal Code: {{ $order->address->postal_code }} </p>
                </article>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <article class="panel-heading">
                    <h4> Confirm Shipping Date </h4>
                </article>
                <article class="panel-body">
                    <div>
                        {!! Form::model($order, [
                        'method' => 'PATCH',
                        'class' => 'form-group',

                        'action' => ['OrdersController@updateShipping', $order->id]
                        ])
                        !!}
                            {!! Form::label('ship_date', 'Date Shipped:') !!}
                            {!! Form::input('date', 'ship_date', date('Y-m-d'), ['class' => 'form-control'] ) !!}
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control', 'name' => 'Submit']) !!}
                        {!! Form::close() !!}
                    </div>
                </article>
            </div>
        </div>

    <div class="row top-buffer-20">
        <div class="col-md-12">
            <div class="panel panel-default">
                <article class="panel-heading">
                    <h4> Products ordered</h4>
                </article>
                <article class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publish Date</th>
                            <th>Price</th>
                            <th>Quantity </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($order->products as $product)
                                <tr>
                                    <td> {{ $product->id}} </td>
                                    <td> {{ $product->title }} </td>
                                    <td> {{ $product->author}} </td>
                                    <td> {{ $product->publish_date}} </td>
                                    <td> {{ $product->price }} </td>
                                    <td> {{ $product->pivot->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </article>
            </div>
        </div>

    </div>


@endsection

@section('footer')
    @include('_layouts._footer')
@stop