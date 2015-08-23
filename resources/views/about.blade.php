<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 23/08/2015
 * Time: 5:53 PM
 */ ?>

@extends('_layouts._layout')

@section('content')
    <main class="container">
        @include('_includes._sidebar')
        <div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <section class="panel-heading">
                    <h2> About Us </h2>
                </section>
                <div class="panel-body">
                    <p> Tech Reader is a bookstore that focuses on Technical books.
                        What every technical book you want we have it at a great price.
                        We can ship to you anywhere in Australia at a reasonable price.  </p>

                    <h3> Contact Us</h3>
                    <p> Phone: xx-xxxx-xxxx </p>
                    <p> Email: fake@yourcompany.com</p>
                    <p> Address: 123 Fake Street </p>
                    <p> State: NSW </p>
                    <p> City: Sydney </p>
                    <p> Postal Code: 2000 </p>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('footer')
    @include('_layouts._footer')
@stop