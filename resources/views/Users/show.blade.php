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
                    @if(!empty($user->profile->first_name))
                        {{ $user->profile->first_name }}
                    @else
                        No Data Available
                    @endif
                </td>
                <td>
                    @if(!empty($user->profile->last_name))
                        {{ $user->profile->last_name }}
                    @else
                        No Data Available
                    @endif
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    @if(!empty($user->profile->VIPNumber))
                        {{ $user->profile->VIPNumber }}
                    @else
                        No Data Available
                    @endif
                </td>
                <td>
                    @if(!empty($user->roles->name))
                        {{ $user->roles->name }}
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
                    @if(!empty($user->profile->Phone))
                        {{ $user->profile->Phone }}
                    @else
                        No Data Available
                    @endif
                </td>
                <td>
                    @if(!empty($user->addresses->address))
                        {{ $user->addresses->address}}
                    @else
                        No Data Available
                    @endif
                </td>
                <td>
                    @if(!empty($user->addresses->city))
                        {{ $user->addresses->city }}
                    @else
                        No Data Available
                    @endif
                </td>
                <td>
                    @if(!empty($user->addresses->state))
                        {{ $user->addresses->state }}
                    @else
                        No Data Available
                    @endif
                </td>
                <td>
                    @if(!empty($user->addresses->postal_code))
                        {{ $user->addresses->postal_code }}
                    @else
                        No Data Available
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

</main>
@endsection