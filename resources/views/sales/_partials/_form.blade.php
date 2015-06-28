<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 28/06/2015
 * Time: 4:51 PM
 */?>

<section class="row">
    <div class="col-md-2">
        {!! Form::label('salStart', 'Start Date') !!}
    </div>
    <div class="col-md-4 input-lg">
        {!! Form::input('date', 'salStart', date('Y-m-d'), ['class' => 'form-control'] ) !!}
    </div>
    <div class="col-md-2">
        {!! Form::label('salFinish', 'Finish Date') !!}
    </div>
    <div class="col-md-4 input-lg">
        {!! Form::input('date', 'salFinish', date('Y-m-d'), ['class' => 'form-control'] ) !!}
    </div>
    </div>
</section>
<section class="row">
    <div class="col-md-2">
        {!! Form::label('salDiscount', 'Discount') !!}
    </div>
    <div class="col-md-4 input-lg">
        {!! Form::select('salDiscount', $discounts) !!}
    </div>
    <div class="col-md-2">
        {!! Form::input('hidden', 'salProductId', $product->id )!!}
    </div>
    <div class="col-md-4">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control', 'name' => 'Submit']) !!}
    </div>
</section>