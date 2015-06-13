@extends('_layouts._layout')

@section('content')

    {!! Form::open(['class' => 'form-inline']) !!}
        <section class="row form-spacing">
            <div class="col-md-2">
                {!! Form::label('FirstName', 'First Name:') !!}
            </div>
            <div class="col-md-4 input-lg">
                {!! Form::text('FirstName', null, ['class' => 'form-control', 'placeholder' => 'Enter First Name'])  !!}
            </div>
            <div class="col-md-2">
                {!! Form::label('LastName', 'Last Name:') !!}
            </div>
            <div class="col-md-4">
                {!! Form::text('LastName', null, ['class' => 'form-control', 'placeholder' => 'Enter Last Name'])  !!}
            </div>
        </section>

        <section class="row form-spacing">
            <div class="col-md-2">
                {!! Form::label('Email', 'Email:') !!}
            </div>

            <div class="col-md-10">
                {!! Form::text('Email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email'])  !!}
            </div>
        </section>

        <section class="row form-spacing">
            <div class="col-md-2">
                {!! Form::label('Password', 'Password:') !!}
            </div>
            <div class="col-md-4">
                {!! Form::password('Password', ['class' => 'form-control'])  !!}
            </div>

            <div class="col-md-2">
                {!! Form::label('ConfirmPassword', 'Confirm Password:') !!}

            </div>
            <div class="col-md-4">
                {!! Form::password('ConfirmPassword', ['class' => 'form-control'])  !!}
            </div>
        </section>

    {!! Form::close() !!}
@endsection
