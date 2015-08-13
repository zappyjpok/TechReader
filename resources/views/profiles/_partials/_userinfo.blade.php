<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 13/07/2015
 * Time: 11:39 AM
 */ ?>

<!-- Users Information -->
<article class="panel panel-info">
    <section class="panel-heading">
        <h4> Your information </h4>
    </section>
    <section class="panel-body">
        <div class="row">
            <div class="col-md-4 input-lg">
                Username:
            </div>
            <div class="col-md-8 input-lg">
                {{ $user->name }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 input-lg">
               Email:
            </div>
            <div class="col-md-8 input-lg">
                {{ $user->email }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-success"
                   href="#"> Edit Information </a>
            </div>
            <div class="col-md-4 input-lg">

            </div>
        </div>
    </section>
</article>

