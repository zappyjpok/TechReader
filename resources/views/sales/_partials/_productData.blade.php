<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 28/06/2015
 * Time: 4:55 PM
 */?>

<section class="row">
    <div class="col-md-4 col-lg-4">
        <h4> Title: {{ $product->proTitle }}</h4>
        <h4> Price: {{ $product->proPrice }}</h4>
        <h4> Publisher: {{ $product->proPublisher }}</h4>
    </div>
    <div class="col-md-4 col-lg-4">
        <h4> Name: {{ $product->proTitle }}</h4>
        <h4> Author: {{ $product->proAuthor }}</h4>
        <h4> Publish Date: {{ $product->proPublishDate }} </h4>
    </div>
    <div class="col-md-4 col-lg-4">
        <img src="{{ $product->proImagePath }}" class="img"/>
    </div>
</section>