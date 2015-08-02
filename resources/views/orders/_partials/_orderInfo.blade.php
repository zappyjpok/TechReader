<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 1/08/2015
 * Time: 6:23 PM
 */?>

<article class="order-box">
    <h3> Your order information </h3>
    @if(isset($products) && !empty($products))
        @foreach(array_chunk($products, 2) as $row)
            <section class="row">
                @foreach($row as $product)
                    <div class="col-md-6">
                        <h5> Title: {{ $product['title'] }} </h5>
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{
                                    App\library\ChangeName::changeToThumbnail(
                                    App\library\ChangeName::changeToLocalEnvironment($product['image'], 'Tech'))
                                    }}">
                            </div>
                            <div class="col-md-7">
                                <p> Author: {{ $product['author'] }} </p>
                                <p class="price"> ${{  $product['price']   }} </p>
                                @include('orders._partials._quantity')
                                <a href="{{ action('OrdersController@destroy', [$product['id']]) }}" class="btn btn-danger">
                                    Remove Item
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
        @endforeach
    @endif
</article>