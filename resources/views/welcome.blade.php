@extends('_layouts._layout')

@section('content')
    <main class="container"> <!-- List of Products-->
        @include('_includes._sidebar')
        <section class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1">
            <h3> {{ $pageTitle }} </h3>
            <article class="row">
                {!! $output !!}
            </article>
            <div>
                <ul class="pagination">
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                </ul>
            </div>
        </section>
    </main>
@endsection

@section('footer')
    @include('_layouts._footer')
@stop