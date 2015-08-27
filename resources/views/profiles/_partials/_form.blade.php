<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 9/07/2015
 * Time: 8:09 PM
 */ ?>

<section class="row top-buffer-20">
    <div class="form-group">
        <div class="col-md-3 col-md-offset-2 ">
            {!! Form::label('first_name', 'First Name: ', ['class' => 'label-control'] ) !!}
        </div>
        <div class="col-md-5 input">
            {!! Form::input('text', 'first_name', null,
                ['class' => 'form-control',
                'id' => 'first-name',
                'placeholder' => 'Please enter your last name',
                'pattern' => '[a-zA-Z]+',
                'required'] ) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 col-md-offset-2">
            {!! Form::label('last_name', 'Last Name: ', ['class' => 'label-control']) !!}
        </div>
        <div class="col-md-5 input">
            {!! Form::input('text', 'last_name', null,
                ['class' => 'form-control',
                'id' => 'last-name',
                'placeholder' => 'Please enter your last name',
                'pattern' => '[a-zA-Z]+',
                'required'] ) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 col-md-offset-2">
            {!! Form::label('phone', 'Phone Number:',
                ['class' => 'label-control']) !!}
        </div>
        <div class="col-md-5 input">
            {!! Form::input('text', 'phone', null,
                ['class' => 'form-control',
                'id' => 'phone',
                'placeholder' => 'Please enter your phone number',
                'pattern' => '[0-9]+',
                'required'] ) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 col-md-offset-2">

        </div>
        <div class="col-md-5">
            {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control', 'name' => 'Submit']) !!}
        </div>
    </div>
</section>

