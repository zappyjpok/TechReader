<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 11/06/2015
 * Time: 7:55 PM
 */
?>

<nav class="row"> <!-- Navigation Tabs-->
    <section>
        <ul class="nav nav-tabs">
            <li class="active"> <a href="{{ action('WelcomeController@index') }}"> Home </a></li>
        @foreach($categories as $category)
            <li> <a href="{{ action('WelcomeController@display', [$category->name]) }}"> {{ $category->name }}</a>  </li>
        @endforeach
        </ul>
    </section>
</nav>