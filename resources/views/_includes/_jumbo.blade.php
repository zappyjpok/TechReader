<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 7/07/2015
 * Time: 8:11 PM
 */ ?>

<section class="jumbotron">
    <h2>
        @if(isset($header))
            {{ $header }}
        @endif
    </h2>
    <p>
        @if(isset($instructions))
            {{ $instructions }}
        @endif
    </p>
    <p>
        @if(isset($createButton))
            <a class="btn btn-default btn-lg"
               href="{{ action('ProductsController@create') }}"> {{ $createButton }} </a>
        @endif
    </p>

</section>