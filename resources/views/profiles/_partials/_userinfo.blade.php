<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 13/07/2015
 * Time: 11:39 AM
 */ ?>

<!-- Users Information -->
<section class="row display-user-info top-buffer-20">
    <h4> Your information </h4>
    <div class="row">
        <div class="col-md-2">
            Username:
        </div>
        <div class="col-md-4 input-lg">
            {{ $user->name }}
        </div>
        <div class="col-md-2">
            Email:
        </div>
        <div class="col-md-4 input-lg">
            {{ $user->email }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <a class="btn btn-success"
               href="{{ action('ProductsController@create') }}"> Edit Information </a>
        </div>
        <div class="col-md-4 input-lg">

        </div>
    </div>
</section>