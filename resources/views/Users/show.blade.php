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
                    @if(!empty($user->profile->first()->first_name))
                        {{ $user->profile->first()->first_name }}
                    @else
                        No Data Available
                    @endif
                </td>
                <td>
                    @if(!empty($user->profile->first()->last_name))
                        {{ $user->profile->first()->last_name }}
                    @else
                        No Data Available
                    @endif
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    @if(!empty($user->profile->first()->VIPNumber))
                        {{ $user->profile->first()->VIPNumber }}
                    @else
                        No Data Available
                    @endif
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
                    @if(!empty($user->profile->first()->Phone))
                        {{ $user->profile->first()->Phone }}
                    @else
                        No Data Available
                    @endif
                </td>
                <td>
                    @if(!empty($user->addresses->first()->address))
                        {{ $user->addresses->first()->address}}
                    @else
                        No Data Available
                    @endif
                </td>
                <td>
                    @if(!empty($user->addresses->first()->city))
                        {{ $user->addresses->first()->city }}
                    @else
                        No Data Available
                    @endif
                </td>
                <td>
                    @if(!empty($user->addresses->first()->state))
                        {{ $user->addresses->first()->state }}
                    @else
                        No Data Available
                    @endif
                </td>
                <td>
                    @if(!empty($user->addresses->first()->postal_code))
                        {{ $user->addresses->first()->postal_code }}
                    @else
                        No Data Available
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

</main>
@endsection