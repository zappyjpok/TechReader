<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 12/07/2015
 * Time: 5:36 PM
 */ ?>

<div class="row top-buffer-20">
    <div class="form-group">
        <div class="col-md-3 col-md-offset-2">
            {!! Form::label('address', 'Street Address:', ['class' => 'label-control'] ) !!}
        </div>
        <div class="col-md-5 input">
            {!! Form::text('address', null,
                ['class' => 'form-control',
                'id' => 'address',
                'placeholder' => 'Please enter your address',
                'required'] ) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 col-md-offset-2">
            {!! Form::label('state', 'State:', ['class' => 'label-control'] ) !!}

        </div>
        <div class="col-md-5 input">
            {!! Form::text('state', null,
                ['class' => 'form-control',
                'id' => 'state',
                'placeholder' => 'Please enter your state',
                'required'] ) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 col-md-offset-2">
            {!! Form::label('city', 'City:', ['class' => 'label-control'] ) !!}

        </div>
        <div class="col-md-5 input">
            {!! Form::text('city', null,
                ['class' => 'form-control',
                'id' => 'city',
                'placeholder' => 'Please enter your city',
                'required'] ) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 col-md-offset-2">
            {!! Form::label('postal_code', 'Postal Code:', ['class' => 'label-control'] ) !!}
        </div>
        <div class="col-md-5 input">
            {!! Form::text('postal_code', null, [
                'class' => 'form-control',
                'id' => 'postalCode',
                'placeholder' => 'Please enter your postal code',
                'required'] ) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 col-md-offset-5">
            {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control', 'name' => 'Submit']) !!}
        </div>
    </div>
</div>

