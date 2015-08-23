<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 30/07/2015
 * Time: 7:41 PM
 */ ?>

<div>
    {!! Form::open([
    'class' => 'form-group',
    'action' => 'OrdersController@updateQuantity'
    ])
    !!}
    <div>
        {!! Form::select('quantity', $quantity, $product['quantity']) !!}
    </div>
    <div class="top-buffer-10">
        {!! Form::hidden('id', $product['id']) !!}
        {!! Form::submit('Update', ['class' => 'btn btn-info', 'name' => 'Submit']) !!}
    </div>
    {!! Form::close() !!}
</div>