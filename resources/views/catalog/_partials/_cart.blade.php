<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 23/07/2015
 * Time: 6:28 PM
 */
?>

<div class="side-options">
    <h3 class="spacing-sm"> Order Now </h3>
    <div class="spacing-sm">
        @include('_layouts._validation')
        <div class="box">
            {!! Form::open([
            'class' => 'form-group',
            'action' => 'WelcomeController@store'
            ])
            !!}
                <div>
                    {!! Form::select('quantity', $quantity) !!}
                </div>
                <div class="top-buffer-10">
                    {!! Form::hidden('id', $product->id) !!}
                    {!! Form::submit('Add to Cart', ['class' => 'btn btn-info btn-lg', 'name' => 'Submit']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <p class="spacing-sm"> All products are shipped in 24 hours</p>
    <p class="spacing-sm"> Satisfaction guaranteed!  If you are not happy with your purchase please send it back for a full refund.  </p>
</div>