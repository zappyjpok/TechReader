@extends('_layouts._adminLayout')

@section('content')
<div class="container">
  <ul>
      <li> <a href="{{ action('ProductsController@index') }}" > Products </a></li>
      <li> <a href="{{ action('UsersController@index') }}" > Users</a></li>
  </ul>
</div>
@endsection
