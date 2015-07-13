<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 13/07/2015
 * Time: 2:05 PM
 */?>

<section class="row form-spacing">
    <div class="col-md-2">
        {!! Form::label('name', 'Category Name:') !!}
    </div>
    <div class="col-md-4 input-lg">
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Category Name'])  !!}
    </div>
    <div class="col-md-2">

    </div>
    <div class="col-md-4">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control', 'name' => 'Submit']) !!}
    </div>
</section>

