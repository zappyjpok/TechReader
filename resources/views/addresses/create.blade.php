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
        <div class="row top-buffer-20">
            <div class="col-md-7">
                <div class="panel panel-default">
                    <article class="panel-heading">
                        <h4> Please enter your order information  </h4>
                    </article>
                    <div class="panel-body">
                        @include('_layouts._validation')
                        <!-- Form  -->
                        <div class="row">
                            {!! Form::open([
                            'class'  => 'form-horizontal validation-form',
                            'action' => ['AddressesController@store', $user->id]
                            ])
                            !!}
                            @include('addresses._partials._form', ['submitButton' => $submitButton])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                @include('addresses._partials._userInfo', ['user' => $user])
            </div>
        </div>
    </main>

    <script>



    </script>

@endsection

@section('footer')
    @include('_layouts._footer')
@stop