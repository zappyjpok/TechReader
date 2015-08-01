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
        <img class="logo" src="{{ url('images/logo.png') }}">
    </section>
    <section> <!-- Login Navbar -->
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
                <li><a href="{{ url('/auth/login') }}">Login</a></li>
                <li><a href="{{ url('/auth/register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"> My Account </a>
                </li>
            @endif
        </ul>
    </section>
</header>