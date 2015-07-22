<?php
/**
 * Created by PhpStorm.
 * User: Shawn
 * Date: 13/07/2015
 * Time: 5:40 PM
 */?>

@extends('_layouts._layout')

@section('content')

    <main class="container"> <!-- List of Products-->
        @include('_includes._sidebar')
        <section class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1">
            <h3> {{ $pageTitle }} </h3>
            <!-- Loop through the sales: every 4 sales should create a new row -->
            @foreach(array_chunk($items->all(), 3) as $row)
                <section class="row">
                    @foreach($row as $item)
                        <div class="col-md-4">
                            <h4>
                                <a href="{{ action('WelcomeController@show', [App\library\ChangeName::replaceLinkSpaces($item->title)]) }}">
                                    {{ App\library\ChangeName::shortenString($item->title, 40)  }}...
                                </a>
                            </h4>
                            <div>
                                <img src="{{
                                    App\library\ChangeName::changeToThumbnail(
                                    App\library\ChangeName::changeToLocalEnvironment($item->image, 'Tech'))
                                    }}" >
                            </div>
                            <p> {{ App\library\ChangeName::shortenString($item->description, 80)   }}...
                                <a href="{{ action('WelcomeController@show', [App\library\ChangeName::replaceLinkSpaces($item->title)]) }}">
                                    read more
                                </a>
                            </p>
                            @if(App\Sale::current()->findProduct($item->id)->first())
                                <p class="priceCut"> ${{ $item->price }}</p>
                                <p class="price">
                                    ${{ App\library\caculations::caculateDiscountPrice($item->price,
                                    \App\Sale::current()->where('product_id', $item->id)->first()->discount
                                    ) }}
                                </p>
                            @else
                                <p class="price"> ${{ $item->price }}</p>
                            @endif
                        </div>
                    @endforeach
                </section>
            @endforeach
        </section>
        <section>
            <ul class="pagination">
                <li> </li>
            </ul>
        </section> <!-- end pagination -->

    </main>
@endsection

@endsection

@section('footer')
    @include('_layouts._footer')
@stop