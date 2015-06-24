<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 24/06/2015
 * Time: 7:59 PM
 */?>

<section>
    @if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li> {{ $error }}</li>
        @endforeach
    </ul>
    @endif
</section>