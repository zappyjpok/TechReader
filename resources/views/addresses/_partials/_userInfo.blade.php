<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 13/07/2015
 * Time: 7:50 AM
 */ ?>

<!-- Users Information -->
<section class="row display-user-info top-buffer-20">
    <h4> Your information </h4>
    <div class="row">
        <div class="col-md-2">
            <h4> Username: </h4>
        </div>
        <div class="col-md-4 input-lg">
            {{ $user->name }}
        </div>
        <div class="col-md-2">
            <h4> Email: </h4>
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

<!-- Profile Information -->
<section class="row display-user-info top-buffer-20">
    <h4> Your Profile </h4>
    <div class="row">
        <div class="col-md-2">
            <h4> First Name </h4>
        </div>
        <div class="col-md-4 input-lg">
            @if(!empty($user->profile->first_name))
                {{ $user->profile->first_name }}
            @else
                <h4> Empty </h4>
            @endif
        </div>
        <div class="col-md-2">
            <h4>  Last Name </h4>
        </div>
        <div class="col-md-4 input-lg">
            @if(!empty($user->profile->last_name))
                {{ $user->profile->last_name }}
            @else
                <h4> Empty </h4>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <h4> Phone Number: </h4>
        </div>
        <div class="col-md-4 input-lg">
            @if(!empty($user->profile->phone))
                {{ $user->profile->phone }}
            @else
                <h4> Empty </h4>
            @endif
        </div>
        <div class="col-md-2">
            <h4> VIP Number: </h4>
        </div>
        <div class="col-md-4 input-lg">
            @if(!empty($user->profile->VIP_Number))
                {{ $user->profile->VIP_Number }}
            @else
                <h4> Empty </h4>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <a class="btn btn-success"
               href="{{ action('ProfilesController@edit', $user->name) }}"> Edit Information </a>
        </div>
        <div class="col-md-4 input-lg">

        </div>
    </div>

</section>