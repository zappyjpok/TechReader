<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 13/07/2015
 * Time: 7:50 AM
 */ ?>

<!-- Users Information -->
<!-- Users Information -->
<div class="panel panel-info">
    <section class="panel-heading">
        <h4> Your information </h4>
    </section>
    <section class="panel-body">
        <div>
            <div class="row">
                <div class="col-md-5 input-lg">
                    Username:
                </div>
                <div class="col-md-7 input-lg">
                    {{ $user->name }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 input-lg">
                    Email:
                </div>
                <div class="col-md-7 input-lg">
                    {{ $user->email }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 input-lg">

                </div>
                <div class="col-md-7 input-lg">
                    <a class="btn btn-success"
                       href="#"> Edit Information </a>
                </div>
            </div>
        </div>
        <!-- Profile Information -->
        <div>
            <div class="row">
                <div class="col-md-5 input-lg">
                    First Name:
                </div>
                <div class="col-md-7 input-lg">
                    @if(!empty($user->profile->first_name))
                        {{ $user->profile->first_name }}
                    @else
                        <h4> Empty </h4>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 input-lg">
                    Last Name
                </div>
                <div class="col-md-7 input-lg">
                    @if(!empty($user->profile->last_name))
                        {{ $user->profile->last_name }}
                    @else
                        <h4> Empty </h4>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 input-lg">
                    Phone Number:
                </div>
                <div class="col-md-7 input-lg">
                    @if(!empty($user->profile->phone))
                        {{ $user->profile->phone }}
                    @else
                        <h4> Empty </h4>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 input-lg">
                    VIP Number:
                </div>
                <div class="col-md-7 input-lg">
                    @if(!empty($user->profile->VIP_Number))
                        {{ $user->profile->VIP_Number }}
                    @else
                        <h4> Empty </h4>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 input-lg">

                </div>
                <div class="col-md-7 input-lg">
                    <a class="btn btn-success"
                       href="{{ action('ProfilesController@edit', $user->name) }}"> Edit Information </a>
                </div>
            </div>
        </div>

    </section>
</div>
