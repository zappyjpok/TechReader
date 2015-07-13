<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 9/07/2015
 * Time: 8:09 PM
 */ ?>

<section class="row">
    <div class="col-md-2">
        {!! Form::label('first_name', 'First Name: ') !!}
    </div>
    <div class="col-md-4 input-lg">
        {!! Form::input('text', 'first_name', null, ['class' => 'form-control'] ) !!}
    </div>
    <div class="col-md-2">
        {!! Form::label('last_name', 'Last Name: ') !!}
    </div>
    <div class="col-md-4 input-lg">
        {!! Form::input('text', 'last_name', null, ['class' => 'form-control'] ) !!}
    </div>
</section>
<section class="row">
    <div class="col-md-2">
        {!! Form::label('phone', 'Phone Number:') !!}
    </div>
    <div class="col-md-4 input-lg">
        {!! Form::input('text', 'phone', null, ['class' => 'form-control'] ) !!}
    </div>
    <div class="col-md-2">

    </div>
    <div class="col-md-4">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control', 'name' => 'Submit']) !!}
    </div>
</section>