<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 11/06/2015
 * Time: 7:55 PM
 */
?>

<nav class="row"> <!-- Navigation Tabs-->
    <div>
        <ul class="nav nav-tabs">
            <li class="active"> <a href="{{ action('WelcomeController@index') }}"> Home </a></li>
        @foreach($categories as $category)
            <li> <a href="{{ action('WelcomeController@display', [$category->name]) }}"> {{ $category->name }}</a>  </li>
        @endforeach
            <li> <a href="#"> About Us </a></li>
            <li> <a href="#">  Contact Us </a></li>
        </ul>
    </div>
</nav>