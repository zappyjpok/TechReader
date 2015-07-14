<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 11/06/2015
 * Time: 8:21 PM
 */
?>

<aside class="col-lg-3 col-md-3 pull-right side-menu"> <!-- Sidebar with deals! -->
    <section>
        <h3> Latest Deals </h3>
        <ul>
            @foreach($randomSales as $randomSale)
                <li>
                    <h4>
                        <a href="{{ action('WelcomeController@show', $randomSale->product->title) }}"> {{ $randomSale->product->title }} </a>
                    </h4>
                    <img src="
                        {{ App\Services\ChangeName::changeToThumbnail(
                        App\Services\ChangeName::changeToLocalEnvironment($randomSale->product->image, 'Tech')) }}
                    ">
                    <p class="priceCut"> ${{ $randomSale->product->price }} </p>
                    <p class="price">
                        ${{ App\Services\caculations::caculateDiscountPrice($randomSale->product->price, $randomSale->discount) }}
                    </p>
                </li>
            @endforeach
        </ul>
    </section>
</aside>