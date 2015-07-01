<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 28/06/2015
 * Time: 4:51 PM
 */?>

<section class="row">
    <div class="col-md-2">
        {!! Form::label('start', 'Start Date') !!}
    </div>
    <div class="col-md-4 input-lg">
        {!! Form::input('date', 'start', date('Y-m-d'), ['class' => 'form-control'] ) !!}
    </div>
    <div class="col-md-2">
        {!! Form::label('finish', 'Finish Date') !!}
    </div>
    <div class="col-md-4 input-lg">
        {!! Form::input('date', 'finish', date('Y-m-d'), ['class' => 'form-control'] ) !!}
    </div>
    </div>
</section>
<section class="row">
    <div class="col-md-2">
        {!! Form::label('discount', 'Discount') !!}
    </div>
    <div class="col-md-4 input-lg">
        {!! Form::select('discount', $discounts) !!}
    </div>
    <div class="col-md-2">
        {!! Form::input('hidden', 'product_id', $product->id )!!}
    </div>
    <div class="col-md-4">
        {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control', 'name' => 'Submit']) !!}
    </div>
</section>