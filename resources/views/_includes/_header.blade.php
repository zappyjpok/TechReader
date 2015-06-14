<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 11/06/2015
 * Time: 8:02 PM
 */
?>

<header class="row"> <!-- logo and log in navbar -->
    <section class="pull-left"> <!-- Logo -->
        <img src="#">
    </section>
    <section> <!-- Login Navbar -->
        <ul class="nav nav-pills pull-right">
            <li><a href="#"> Login </a></li>
            <li><a href="{{ URL::to('auth/register') }}"> Register </a></li>
            <li><a href="#"> My Account </a></li>
        </ul>
    </section>
</header>