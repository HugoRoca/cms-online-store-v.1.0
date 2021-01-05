@extends('connect.master')

@section('title', 'login')

@section('content')
<div class="box box_login shadow">
    <div class="header">
        <a href="{{ url('/') }}">
            <img src="{{ url('/static/images/logo.png') }}" alt="">
        </a>
    </div>
    <div class="inside">
        {!! Form::open(['url' => '/login', 'autocomplete' => 'off']) !!}
        <label for="email">Email:</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="far fa-envelope-open"></i>
            </span>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
        <label for="password" class="mtop16">Password:</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-lock"></i>
            </span>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Sign in', ['class' => 'btn btn-success mtop16']) !!}
        {!! Form::close() !!}

        <div class="footer mtop16">
            <a href="{{ url('/register') }}">Not Registered? Sign Up</a>
            <a href="{{ url('/recover') }}">Forgot Your Password?</a>
        </div>
    </div>
</div>
@stop
