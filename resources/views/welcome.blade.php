@extends('_layouts._layout')

@section('content')
    <main class="container"> <!-- List of Products-->
        @include('_includes._sidebar')
        <section class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1">
            <h3> {{ $pageTitle }} </h3>
            <!-- Loop through the sales: every 4 sales should create a new row -->
        <?php $i=0; ?>
            @if(isset($items))
                <article class="row">
                    @foreach($items as $item)
                        @if($i === 4)
                            <!-- Variable Row: Creates a new row after  4 grids  -->
                            {!! $row !!}
                        @endif
                        <?php if($i == 4) {$i=0;} ?>
                        <section class="col-md-3 col-xs-6">
                            <h4>
                                <!-- If statement: if sale or product object -->
                                <a href="{{ action('WelcomeController@show', [App\library\ChangeName::replaceLinkSpaces($item->product->title)]) }}">
                                    {{ App\library\ChangeName::shortenString($item->product->title, 20) }}...
                                </a>
                            </h4>
                            <div>
                                <img src="{{
                                    App\library\ChangeName::changeToThumbnail(
                                    App\library\ChangeName::changeToLocalEnvironment($item->product->image, 'Tech'))
                                    }}" >
                            </div>
                            <p>
                                {{ App\library\ChangeName::shortenString($item->product->description, 80)  }}
                                <a href="{{ action('WelcomeController@show', [App\library\ChangeName::replaceLinkSpaces($item->title)]) }}">
                                    read more
                                </a>
                            </p>
                            @if(App\Sale::current()->findProduct($item->product->id)->first())
                                <p class="priceCut"> ${{ $item->product->price }}</p>
                                <p class="price">
                                    ${{ App\library\caculations::caculateDiscountPrice($item->product->price, $item->discount) }}
                                </p>
                            @else
                                <p class="price"> ${{ $item->product->price }}</p>
                            @endif
                        </section>
                        <?php $i++ ?>
                        @if($i === 4)
                            {!! $rowClose !!}
                        @endif
                    @endforeach
            @endif
        </section>
        <div>
            <ul class="pagination">
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
            </ul>
        </div>
    </main>
@endsection

@section('footer')
    @include('_layouts._footer')
@stop