<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 7/07/2015
 * Time: 8:09 PM
 */ ?>

@extends('_layouts._adminLayout')

@section('content')

<main class="container">

    @include('_includes._jumbo')

    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>VIP Number </th>
                <th>Role </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ App\library\Functions::checkEmpty($user->profile->first()->first_name)}}
                </td>
                <td>
                    {{ App\library\Functions::checkEmpty($user->profile->first()->last_name) }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{ App\library\Functions::checkEmpty($user->profile->first()->VIPNumber) }}
                </td>
                <td>
                    @if(!empty($user->roles->first()->name))
                        {{ $user->roles->first()->name }}
                    @else
                        No Role
                    @endif
                </td>
            </tr>
        </tbody>
    </table>


    <table class="table">
        <thead>
        <tr>
            <th>Phone </th>
            <th>Address </th>
            <th>City </th>
            <th>State </th>
            <th>Postal Code </th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ App\library\Functions::checkEmpty($user->profile->first()->Phone) }}
                </td>
                <td>
                    {{ App\library\Functions::checkEmpty($user->addresses->first()->address) }}
                </td>
                <td>
                    {{ App\library\Functions::checkEmpty($user->addresses->first()->address) }}
                </td>
                <td>
                    {{ App\library\Functions::checkEmpty($user->addresses->first()->city) }}
                </td>
                <td>
                    {{ App\library\Functions::checkEmpty($user->addresses->first()->state) }}
                </td>
                <td>
                    {{ App\library\Functions::checkEmpty($user->addresses->first()->postal_code) }}
                </td>
            </tr>
        </tbody>
    </table>

</main>
@endsection