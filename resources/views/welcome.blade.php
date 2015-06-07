@extends('_layouts._layout')

@section('content')
    <div class="container">
        <header class="row">
            <section class="pull-left"> <!-- Logo -->
                <img src="#">
            </section>
            <section> <!-- Login Navbar -->
                <ul class="nav nav-pills pull-right">
                    <li><a href="#"> Login </a></li>
                    <li><a href="#"> Register </a></li>
                    <li><a href="#"> My Account </a></li>
                </ul>
            </section>
        </header>

        <nav class="row"> <!-- Navigation Tabs-->
            <section>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#"> Home </a></li>
                    <li><a href="#"> Programming </a></li>
                    <li><a href="#"> Web Development </a></li>
                    <li><a href="#"> Networking  </a></li>
                    <li><a href="#"> Windows  </a></li>
                    <li><a href="#"> Mac </a></li>
                </ul>
            </section>
        </nav>

        <section class="row top-buffer-20"> <!-- Search Box and Shopping Cart-->
            <div class="pull-left"> <!-- Shopping Cart-->
                <a href="#" class="btn btn-info btn-lg">
                    <span class="glyphicon glyphicon-shopping-cart"></span> {{ $cartMessage }}
                </a>
            </div>
            <div class="pull-right"> <!-- Search Box -->
                <form>
                    <input type="text" class="span7 search-query" name="Search" placeholder="Search">
                    <button type="submit" class="add-on"><i class="glyphicon glyphicon-search"></i></button>
                </form>
            </div>

        </section>

        <main class="container"> <!-- List of Products-->
            <section class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1">
                <h3> {{ $pageTitle }} </h3>
                <article class="row">
                    <section class="col-xs-4">
                        <img src="#">
                        <h4> Product Name </h4>
                        <p> Some random text that describes the product </p>
                    </section>
                    <section class="col-xs-4">
                        <img src="#">
                        <h4> Product Name </h4>
                        <p> Some random text that describes the product </p>
                    </section>
                    <section class="col-xs-4">
                        <img src="#">
                        <h4> Product Name </h4>
                        <p> Some random text that describes the product </p>
                    </section>
                </article>
                <article class="row">
                    <section class="col-xs-4">
                        <img src="#">
                        <h4> Product Name </h4>
                        <p> Some random text that describes the product </p>
                    </section>
                    <section class="col-xs-4">
                        <img src="#">
                        <h4> Product Name </h4>
                        <p> Some random text that describes the product </p>
                    </section>
                    <section class="col-xs-4">
                        <img src="#">
                        <h4> Product Name </h4>
                        <p> Some random text that describes the product </p>
                    </section>
                    {{ $output }}
                </article>
            </section>
            <aside class="col-lg-3 col-md-3 side-menu"> <!-- Sidebar with deals! -->
                <section>
                    <h3> Latest Deals </h3>
                    <ul>
                        <li> <h5> Product Name </h5> <img src="#"></li>
                        <li> <h5> Product Name </h5> <img src="#"></li>
                        <li> <h5> Product Name </h5> <img src="#"></li>
                        <li> <h5> Product Name </h5> <img src="#"></li>
                        <li> <h5> Product Name </h5> <img src="#"></li>
                    </ul>
                </section>
            </aside>
        </main>
    </div>
@endsection
