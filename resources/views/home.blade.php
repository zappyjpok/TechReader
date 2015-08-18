@extends('_layouts._adminLayout')

@section('content')
<main class="container">
    <div class="row top-buffer-20">
        <div class="col-md-4">
            <div class="panel panel-default">
                <article class="panel-heading">
                    <h4> <a href="{{ action('ProductsController@index')  }}">Products</a>  </h4>
                </article>
                <article class="panel-body">
                    <p> The products section is where you can view product information.  It is also where you
                        can create new products, update their information, or delete them </p>
                </article>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <article class="panel-heading">
                    <h4> <a href="{{ action('CategoriesController@index')   }}">Categories</a>  </h4>
                </article>
                <article class="panel-body">
                    <p> The categories section is where you can create new categories for the products.  Each category that
                    you create will be on the navigation bar in the customers homepage </p>
                </article>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <article class="panel-heading">
                    <h4> <a href="{{ action('UsersController@index')   }}">Users</a> </h4>
                </article>
                <article class="panel-body">
                    <p> The users section is where you can view users information.  You can also assign roles and privileges.  </p>
                </article>
            </div>
        </div>
    </div>

    <div class="row top-buffer-20">
        <div class="col-md-4">
        <div class="panel panel-default">
            <article class="panel-heading">
                <h4> <a href="{{ action('RolesController@index')   }}">Roles</a></h4>
            </article>
            <article class="panel-body">
                <p> The roles section is where you can create new roles.  </p>
            </article>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <article class="panel-heading">
                <h4> <a href="{{ action('OrdersController@index')   }}">Orders</a>  </h4>
            </article>
            <article class="panel-body">
                <p> The order section is where you can view order information and enter the shipping date information. </p>
            </article>
        </div>
    </div>
    </div>

</main>
@endsection

@section('footer')
    @include('_layouts._footer')
@stop
