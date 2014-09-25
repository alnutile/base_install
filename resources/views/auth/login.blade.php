@extends('layouts.default')

@section('content')
<hr>
<div id="wrapper">
    @include('auth.notice')

    <div class="row-fluid">
        <div class="col-lg-4">

        </div>
        <div class="col-lg-4 well">
            {{ Form::open() }}
            <h1>Login</h1>

            <!-- if there are login errors, show them here -->
            <p>
                {{ $errors->first('email') }}
                {{ $errors->first('password') }}
            </p>

            <p>
                {{ Form::label('email', 'Email Address') }}
                {{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'autofocus' => 'autofocus')) }}
            </p>

            <p>
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class' => 'form-control')) }}
            </p>

            <p>{{ Form::submit('Login',array('class' => 'btn btn-success', 'id' => 'login-submit')) }}</p>
            {{ Form::close() }}
        </div>

        <div class="col-lg-4">

        </div>
    </div>
</div>
@stop
