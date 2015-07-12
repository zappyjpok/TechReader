<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 12/07/2015
 * Time: 5:36 PM
 */ ?>

<section class="row form-spacing">
    <div class="col-md-2">
        {!! Form::label('address', 'Street Address:') !!}
    </div>
    <div class="col-xs-10 col-md-10">
        {!! Form::text('address', null, ['class' => 'form-control'])  !!}
    </div>
</section>
<section class="row top-buffer-20">
    <div class="col-md-2">
        {!! Form::label('state', 'State:') !!}

    </div>
    <div class="col-md-4">
        {!! Form::text('state', null, ['class' => 'form-control'])  !!}
    </div>
    <div class="col-md-2">
        {!! Form::label('city', 'City:') !!}

    </div>
    <div class="col-md-4">
        {!! Form::text('city', null, ['class' => 'form-control'])  !!}
    </div>
</section>
<section class="row top-buffer-20">
    <div class="col-md-2">
        {!! Form::label('postal_code', 'Postal Code:') !!}

    </div>
    <div class="col-md-4">
        {!! Form::text('postal_code', null, ['class' => 'form-control'])  !!}
    </div>
    <div class="col-md-2">

    </div>
    <div class="col-md-4">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control', 'name' => 'Submit']) !!}
    </div>
</section>

